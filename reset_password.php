<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];

    if (!isset($_SESSION['reset_email'])) {
        echo json_encode(['status' => 'error', 'message' => 'Session expired.']);
        exit;
    }

    $email = $_SESSION['reset_email'];
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $update = mysqli_query($con, "UPDATE student SET password='$hashed' WHERE email='$email'");

    if ($update) {
        session_unset();
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update password']);
    }
}
?>
