<?php
include("../connect.php"); // adjust path if needed
require __DIR__ . '/../vendor/autoload.php'; // Composer autoload

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['upload'])) {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // allowed file types
        $allowed = ['csv', 'xls', 'xlsx'];
        if (!in_array($fileExtension, $allowed)) {
            die("<script>alert('Invalid file type. Please upload Excel or CSV'); window.location='upload_students.php';</script>");
        }

        try {
            // load Excel/CSV file
            $spreadsheet = IOFactory::load($fileTmpPath);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // Skip header row (row 0)
            for ($i = 1; $i < count($rows); $i++) {
                $row = $rows[$i];

                // match your dummy_students.xlsx columns
                $fullname   = mysqli_real_escape_string($con, $row[1]); // Fullname
                $matric     = mysqli_real_escape_string($con, $row[2]); // Matric No
                $level      = mysqli_real_escape_string($con, $row[3]); // Level
                $dept       = mysqli_real_escape_string($con, $row[4]); // Department
                $password   = mysqli_real_escape_string($con, $row[5]); // Password
                $supervisor = mysqli_real_escape_string($con, $row[6]); // Supervisor
                $regdate    = mysqli_real_escape_string($con, $row[7]); // Reg date

                // insert into database (adjust table/fields to match yours)
                $query = "
                    INSERT INTO student (fullname, matric_no, level, department, password, supervisor, reg_date)
                    VALUES ('$fullname', '$matric', '$level', '$dept', '$password', '$supervisor', '$regdate')
                ";
                mysqli_query($con, $query);
            }

            echo "<script>alert('Students imported successfully'); window.location='student.php';</script>";

        } catch (Exception $e) {
            die("Error loading file: " . $e->getMessage());
        }
    } else {
        die("File not uploaded properly.");
    }
}
?>
