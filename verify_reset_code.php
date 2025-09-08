<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_code = $_POST['code'];

    if (!isset($_SESSION['reset_code']) || !isset($_SESSION['reset_expire'])) {
        echo json_encode(['status' => 'error', 'message' => 'Session expired. Try again.']);
        exit;
    }

    if (time() > $_SESSION['reset_expire']) {
        echo json_encode(['status' => 'error', 'message' => 'Code expired.']);
        session_unset();
        exit;
    }

    if ($input_code == $_SESSION['reset_code']) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid code']);
    }
}
?>
