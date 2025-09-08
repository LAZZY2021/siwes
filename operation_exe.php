<?php
include("connect.php");
session_start();

// ========================= LOGIN =========================
if(isset($_POST['login'])) {
    $matric_no = mysqli_real_escape_string($con, $_POST['matric_no']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $pes = mysqli_query($con, "SELECT * FROM student WHERE matric_no='$matric_no' AND password='$password'");
    if(mysqli_num_rows($pes) > 0){
        $row = mysqli_fetch_array($pes);
        $_SESSION['stu_id'] = $row['id'];
        $_SESSION['stu_matric'] = $row['matric_no'];

        echo '<script>location.href="dashboard.php"</script>';
    } else {
        echo '<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p><i class="fa fa-warning"></i> Oops! Incorrect Login details.</p>
              </div>';
    }
}

// ========================= SEND RESET CODE =========================
if (isset($_POST['action']) && $_POST['action'] == 'send_reset_code') {
    $email = mysqli_real_escape_string($con, $_POST['email']);

    if (!preg_match('/@mau\.edu\.ng$/', $email)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid MAU email']);
        exit;
    }

    $check = mysqli_query($con, "SELECT * FROM student WHERE email='$email'");
    if (mysqli_num_rows($check) == 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email not found']);
        exit;
    }

    $code = rand(100000, 999999);
    $_SESSION['reset_code'] = $code;
    $_SESSION['reset_email'] = $email;

    $subject = "SIWES Password Reset Code";
    $message = "Your password reset verification code is: $code";
    $headers = "From: no-reply@mau.edu.ng";

    if (mail($email, $subject, $message, $headers)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send email']);
    }
    exit;
}

// ========================= VERIFY RESET CODE =========================
if (isset($_POST['action']) && $_POST['action'] == 'verify_reset_code') {
    if (!isset($_SESSION['reset_code'])) {
        echo json_encode(['status' => 'error', 'message' => 'No code found']);
        exit;
    }

    if ($_POST['code'] == $_SESSION['reset_code']) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid code']);
    }
    exit;
}

// ========================= RESET PASSWORD =========================
if (isset($_POST['action']) && $_POST['action'] == 'reset_password') {
    $email = $_SESSION['reset_email'];
    $newPass = mysqli_real_escape_string($con, $_POST['password']);

    if (!$email) {
        echo json_encode(['status' => 'error', 'message' => 'Session expired']);
        exit;
    }

    $update = mysqli_query($con, "UPDATE student SET password='$newPass' WHERE email='$email'");
    if ($update) {
        unset($_SESSION['reset_code']);
        unset($_SESSION['reset_email']);
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Could not reset password']);
    }
    exit;
}

// ========================= INTRODUCTION LETTER =========================
if(isset($_POST['introduction_letter'])) {
    $pes = mysqli_query($con,"select * from student where id='".$_SESSION['stu_id']."'");
    $row = mysqli_fetch_array($pes);

    $target_file = "pics".basename($_FILES["attachment"]["name"]);
    $attachment_type = pathinfo($target_file,PATHINFO_EXTENSION);

    if(!in_array($attachment_type, ['jpg','jpeg','png','gif'])){
        echo '<div class="alert alert-danger">Invalid file type. Must be an image.</div>';
    } else {
        $cont_name = $row['matric_no'].'_'.time();
        move_uploaded_file($_FILES["attachment"]["tmp_name"],"pics/".$cont_name.'.'.$attachment_type);
        $location = "pics/".$cont_name.'.'.$attachment_type;
        $date = date('Y-m-d');

        mysqli_query($con, "INSERT INTO organisation(student_id,image,to_who,company_name,company_address,company_email,company_phone,reg_date) 
        VALUES('".$_SESSION['stu_id']."','$location','".$_POST['to_who']."','".$_POST['company_name']."','".$_POST['company_address']."','".$_POST['company_email']."','".$_POST['company_phone']."','$date')");

        echo '<script>window.location="letter.php"</script>';
    }
}

// ========================= CHANGE PASSWORD FROM PROFILE =========================
if(isset($_POST['ori'])) {
    $old = $_POST['old'];
    $ori = $_POST['ori'];
    $new = $_POST['new'];
    $cnew = $_POST['cnew'];

    if($old != $ori){
        echo '<div class="alert alert-danger">Incorrect current password.</div>';
    } elseif($new != $cnew){
        echo '<div class="alert alert-danger">Passwords do not match.</div>';
    } elseif(strlen($new) < 6){
        echo '<div class="alert alert-danger">Password must be at least 6 characters.</div>';
    } elseif($old == $new){
        echo '<div class="alert alert-danger">New password must be different from current.</div>';
    } else {
        $qry = mysqli_query($con,"UPDATE student SET password='$new' WHERE id='".$_SESSION['stu_id']."'");
        if($qry){
            echo '<div class="alert alert-success">Password changed successfully.</div>';
        } else {
            echo '<div class="alert alert-danger">Unable to update password.</div>';
        }
    }
}
?>
