<?php 
include("../connect.php"); 
require __DIR__ . '/../vendor/autoload.php'; 

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
            $spreadsheet = IOFactory::load($fileTmpPath);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            $date = date("d-F-Y h:i:sa");
            $inserted = 0;
            $skipped = 0;
            $skippedList = [];

            // Skip header row
            for ($i = 1; $i < count($rows); $i++) {
                $row = $rows[$i];

                $firstname   = mysqli_real_escape_string($con, $row[0]);
                $lastname    = mysqli_real_escape_string($con, $row[1]);
                $matric      = mysqli_real_escape_string($con, $row[2]);
                $level       = mysqli_real_escape_string($con, $row[3]);
                $department  = mysqli_real_escape_string($con, $row[4]);

                $password = "12345"; // default password

                // skip if matric is empty
                if ($matric === '') {
                    $skipped++;
                    $skippedList[] = "(empty)";
                    continue;
                }

                // check if matric_no already exists
                $check = mysqli_query($con, "SELECT id FROM student WHERE matric_no='".$matric."'");
                if (mysqli_num_rows($check) > 0) {
                    $skipped++;
                    $skippedList[] = $matric;
                    continue;
                }

                // 👇 Pick supervisor with least students (auto assign)
                $supervisorQuery = mysqli_query($con, "
                    SELECT id FROM supervisor 
                    ORDER BY (SELECT COUNT(*) FROM student WHERE student.supervisor_id = supervisor.id) ASC 
                    LIMIT 1
                ");
                $supervisorRow = mysqli_fetch_assoc($supervisorQuery);
                $supervisor_id = $supervisorRow['id'] ?? null;

                // Insert new student
                $query = "
                    INSERT INTO student (firstname, lastname, matric_no, level, department, password, supervisor_id, reg_date)
                    VALUES ('$firstname', '$lastname', '$matric', '$level', '$department', '$password', '$supervisor_id', '$date')
                ";
                mysqli_query($con, $query) or die(mysqli_error($con));
                $inserted++;
            }

            // Prepare skipped message
            $skippedMessage = "";
            if ($skipped > 0) {
                $skippedMessage = "\\nSkipped (" . $skipped . "): " . implode(", ", $skippedList);
            }

            echo "<script>alert('Import complete: $inserted added. $skipped skipped.$skippedMessage'); window.location='student.php';</script>";

        } catch (Exception $e) {
            die("Error loading file: " . $e->getMessage());
        }
    } else {
        die("File not uploaded properly.");
    }
}
?>
