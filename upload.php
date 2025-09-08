<?php
include("connect.php");
session_start();
if (!isset($_SESSION['stu_id'])) {
    header("location:index.php");
    exit;
}

$yat = mysqli_query($con, "SELECT * FROM student WHERE id='" . $_SESSION['stu_id'] . "'");
$me = mysqli_fetch_assoc($yat);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Upload Acceptance Letter</title>
    <link href="staff/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="staff/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="staff/assets/css/custom.css" rel="stylesheet" />
    <script src="staff/assets/js/jquery-1.10.2.js"></script>
    <script src="staff/assets/js/bootstrap.min.js"></script>
    <style>
        body {
            border: 5px solid black;
            height: 1000px;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top sticky" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-brand" href="dashboard.php" style="font-size:18px;">Welcome, <?php echo ucfirst($me['firstname']) ?></a>
        </div>
        <div style="color: white; padding: 15px 50px 5px 50px; text-align:center;
        font-size: 16px;">
            <font style="font-weight:bold; font-size:25px; font-family:Comic Sans MS;">
                SIWES MANAGEMENT SYSTEM
            </font>
            <a href="logout.php" class="btn btn-danger square-btn-adjust" style="float: right;">Logout</a>
        </div>
    </nav>

    <nav class="navbar-default navbar-side fixed" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="staff/assets/img/find_user.png" class="user-image img-responsive" style="width:65px;" />
                </li>
                <li><a class="active-menu" href="dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a></li>
                <li><a href="account.php"><i class="fa fa-user fa-3x"></i> Account Details</a></li>
                <li><a href="letter.php"><i class="fa fa-file-text fa-3x"></i> Print Introduction Letter</a></li>
                <li><a href="supervisor.php"><i class="fa fa-user fa-3x"></i> Supervisor</a></li>
                <li><a href="logbook.php"><i class="fa fa-book fa-3x"></i> Logbook</a></li>
                <li><a href="profile.php"><i class="fa fa-user fa-3x"></i> Profile</a></li>
                <li><a href="upload_acceptance.php"><i class="fa fa-upload fa-3x"></i> Upload Acceptance</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-3x"></i> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="font-size:26px;">Upload Acceptance Letter</h2>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">Upload Your Acceptance Letter (PDF only)</div>
                        <div class="panel-body">
                            <?php if (!empty($me['acceptance_letter'])): ?>
                                <p><strong>Already Uploaded:</strong>
                                    <a href="<?php echo $me['acceptance_letter']; ?>" target="_blank">View Acceptance Letter</a>
                                </p>
                            <?php endif; ?>
                            <form id="formupload" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="letter">Choose File:</label>
                                    <input type="file" name="letter" class="form-control" accept="application/pdf" required />
                                </div>
                                <button type="submit" class="btn btn-success">Upload</button>
                            </form>
                            <div class="msg" style="margin-top:10px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#formupload").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "operation.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: function (data) {
                    $(".msg").html(data);
                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);
                }
            });
        });
    </script>
</body>
</html>
