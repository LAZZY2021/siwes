<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email address']);
        exit;
    }

    // Optional: Check if email is a registered student
    // Include DB connection and validate if email exists in the student table

    // Generate 6-digit code
    $code = rand(100000, 999999);

    // Save the code in session or DB for later verification
    session_start();
    $_SESSION['reset_code'] = $code;
    $_SESSION['reset_email'] = $email;

    // Send the email
    $subject = "Your SIWES Password Reset Code";
    $message = "Your password reset verification code is: $code\n\nUse this code to complete your password reset.";
    $headers = "From: siwes@mau.edu.ng";

    if (mail($email, $subject, $message, $headers)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send email']);
    }
}
?>
