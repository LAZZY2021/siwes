<?php
include("connect.php");
session_start();

if (!isset($_SESSION['stu_id'])) {
    echo "❌ Session expired. Please log in again.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['letter'])) {
    $stu_id = $_SESSION['stu_id'];
    $file = $_FILES['letter'];
    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];
    $fileError = $file['error'];

    // Check for errors
    if ($fileError !== 0) {
        echo "❌ Error uploading file.";
        exit;
    }

    // Allow only PDF
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if ($fileExt !== "pdf") {
        echo "❌ Only PDF files are allowed.";
        exit;
    }

    // Create uploads folder if not exists
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Save file
    $newFileName = "acceptance_" . $stu_id . "_" . time() . ".pdf";
    $filePath = $uploadDir . $newFileName;

    if (move_uploaded_file($fileTmp, $filePath)) {
        // Save file path in DB
        $sql = "UPDATE student SET acceptance_letter='$filePath' WHERE id='$stu_id'";
        if (mysqli_query($con, $sql)) {
            echo "✅ Document uploaded successfully! <br><a href='$filePath' target='_blank'>View Document</a>";
        } else {
            echo "❌ Database update failed.";
        }
    } else {
        echo "❌ File upload failed.";
    }
} else {
    echo "❌ No file uploaded.";
}
?>
