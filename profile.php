<?php
include("connect.php");
session_start();
if(!isset($_SESSION['stu_id'])){
    header("location:index.php");
}

$yat=mysqli_query($con,"SELECT * FROM student WHERE id='".$_SESSION['stu_id']."'");
$me=mysqli_fetch_assoc($yat);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMS | Profile</title>

    <!-- BOOTSTRAP & FONTS -->
    <link href="staff/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="staff/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="staff/assets/css/custom.css" rel="stylesheet" />

    <style>
        body { background: #f4f6f9; font-family: 'Segoe UI', sans-serif; }
        .card {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }
        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid #27ae60;
            object-fit: cover;
        }
        .profile-header h3 {
            margin: 0;
            font-weight: bold;
        }
        .profile-header p {
            margin: 3px 0;
            color: #555;
        }
        table th { width: 35%; }
        .nav-tabs>li>a {
            font-weight: 600;
            color: #555;
        }
        .nav-tabs>li.active>a {
            background: #27ae60 !important;
            color: #fff !important;
            border-radius: 8px 8px 0 0;
        }
        .btn-custom {
            border-radius: 6px;
            padding: 8px 18px;
        }
        .msg { margin-top: 15px; }
    </style>
</head>
<body>
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-brand" href="dashboard.php" style="font-size:18px;">
                Welcome, <?php echo ucfirst($me['firstname']); ?>
            </a>
        </div>
        <div style="color:white;padding:15px 50px;text-align:center;font-size:16px;">
            <span style="font-weight:bold;font-size:22px;">SIWES MANAGEMENT SYSTEM</span>
            <a href="logout.php" class="btn btn-danger btn-custom" style="float:right;">Logout</a>
        </div>
    </nav>

    <!-- SIDEBAR -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="<?php echo !empty($me['profile_pic']) ? $me['profile_pic'] : 'staff/assets/img/find_user.png'; ?>" 
                         class="user-image img-responsive" style="width:70px;border-radius:50%;"/>
                </li>
                <li><a href="dashboard.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a></li>
                <li><a href="account.php"><i class="fa fa-user fa-2x"></i> Account</a></li>
                <li><a href="letter.php"><i class="fa fa-file-text fa-2x"></i> Letter</a></li>
                <li><a href="supervisor.php"><i class="fa fa-user fa-2x"></i> Supervisor</a></li>
                <li><a href="logbook.php"><i class="fa fa-book fa-2x"></i> Logbook</a></li>
                <li><a class="active-menu" href="profile.php"><i class="fa fa-user fa-2x"></i> Profile</a></li>
                <li><a href="upload.php"><i class="fa fa-upload fa-2x"></i> Upload</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-2x"></i> Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- PAGE CONTENT -->
    <div id="page-wrapper">
        <div id="page-inner">
            <h2 class="text-center">My Profile</h2>
            <hr>

            <!-- Profile Header Card -->
            <div class="card profile-header">
                <img src="<?php echo !empty($me['profile_pic']) ? $me['profile_pic'] : 'staff/assets/img/find_user.png'; ?>">
                <div>
                    <h3><?php echo $me['firstname']." ".$me['lastname']; ?></h3>
                    <p><b>Matric:</b> <?php echo $me['matric']; ?></p>
                    <p><b>Department:</b> <?php echo $me['department']; ?></p>
                    <p><b>Faculty:</b> <?php echo $me['faculty']; ?></p>
                </div>
            </div>

            <!-- Student Info -->
            <div class="card">
                <h4><b>Student Information</b></h4>
                <table class="table table-bordered table-striped">
                    <tr><th>Level</th><td><?php echo $me['level']; ?></td></tr>
                    <tr><th>SIWES Company</th><td><?php echo $me['company']; ?></td></tr>
                    <tr><th>Email</th><td><?php echo $me['email']; ?></td></tr>
                    <tr><th>Phone</th><td><?php echo $me['phone']; ?></td></tr>
                </table>
            </div>

            <!-- Tabs -->
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#contact" data-toggle="tab">Update Contact</a></li>
                    <li><a href="#password" data-toggle="tab">Change Password</a></li>
                    <li><a href="#picture" data-toggle="tab">Profile Picture</a></li>
                </ul>
                <div class="tab-content">
                    <!-- Contact Tab -->
                    <div class="tab-pane fade in active" id="contact">
                        <form method="post" action="update_profile.php" style="margin-top:15px;">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $me['email']; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" value="<?php echo $me['phone']; ?>" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-custom">Update Info</button>
                        </form>
                    </div>
                    <!-- Password Tab -->
                    <div class="tab-pane fade" id="password">
                        <form method="post" id="formpassword" style="margin-top:15px;">
                            <input type="hidden" value="<?php echo $me['password']; ?>" name="ori">
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" name="old" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="new" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="cnew" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-custom">Update Password</button>
                        </form>
                        <div class="msg"></div>
                    </div>
                    <!-- Picture Tab -->
                    <div class="tab-pane fade" id="picture">
                        <form method="post" action="upload_profile_pic.php" enctype="multipart/form-data" style="margin-top:15px;">
                            <input type="file" name="profile_pic" class="form-control" required>
                            <button type="submit" class="btn btn-info btn-custom" style="margin-top:10px;">Upload Picture</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="staff/assets/js/jquery-1.10.2.js"></script>
<script src="staff/assets/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $("#formpassword").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "operation_exe.php",
            data: new FormData(this),
            contentType:false,
            processData:false,
            success: function(data){ $(".msg").html(data); }
        });
    });
});
</script>
</body>
</html>
