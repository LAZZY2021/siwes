<?php
include("../connect.php");
session_start();
if(!isset($_SESSION['sms_admin_id'])){
    header("location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Students</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
</head>
<body class="container" style="margin-top:50px;">
    <h2>Upload Students (Excel/CSV)</h2>
    <form action="import_students.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Select File</label>
            <input type="file" name="file" accept=".csv,.xls,.xlsx" class="form-control" required>
            <small class="form-text text-muted">
                Allowed formats: <b>.csv</b>, <b>.xls</b>, <b>.xlsx</b>
            </small>
        </div>
        <button type="submit" name="upload" class="btn btn-primary">
            <i class="fa fa-upload"></i> Import
        </button>
        <a href="student.php" class="btn btn-default">Back</a>
    </form>
</body>
</html>
