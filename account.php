<?php
include("connect.php");
session_start();
if (!isset($_SESSION['stu_id'])) {
    header("location:index.php");
}

$yat = mysqli_query($con, "select * from student where id='" . $_SESSION['stu_id'] . "'");
$me = mysqli_fetch_assoc($yat);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>SMS | Account Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="staff/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="staff/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="staff/assets/css/custom.css" rel="stylesheet" />
    <link href="staff/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <style>
        body {
            border: 5px solid black;
            overflow: hidden;
        }
        .form-container {
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .panel-success {
            background-color: #f5f5f5;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            border-radius: 8px;
        }
        #saveMsg {
            display: none;
            font-weight: bold;
            margin-top: 10px;
        }

        /* ✅ Fix space between top navbar and sidebar */
        .navbar-cls-top {
            height:60px !important;
            margin-bottom: 0 !important;
        }

        .navbar-side {
            position: absolute;
            top: 80px;   /* match navbar height */
            left: 0;
            width: 260px; /* adjust sidebar width */
            margin-top: 0 !important;
            padding-top: 0 !important;
        }

        #page-wrapper {
            margin-left: 260px; /*push content beside sidebar*/
            padding: 20px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-cls-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="dashboard.php" style="font-size:18px;">
                    Welcome, <?php echo ucfirst($me['firstname']) ?>
                </a> 
            </div>
            <div style="color: white; padding: 15px 50px; text-align:center; font-size: 16px;">
                <font style="font-weight:bold; font-size:25px; font-family:Comic Sans MS;">
                    SIWES MANAGEMENT SYSTEM
                </font>
                <a href="logout.php" class="btn btn-danger square-btn-adjust" style="float: right;">Logout</a> 
            </div>
        </nav>

        <!-- ✅ SIDEBAR (no gap now) -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="staff/assets/img/find_user.png" class="user-image img-responsive" style="width:65px;" />
                    </li>
                    <li><a href="dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a></li>
                    <li><a href="letter.php"><i class="fa fa-file-text fa-3x"></i> Print Introduction Letter</a></li>
                    <li><a href="supervisor.php"><i class="fa fa-user fa-3x"></i> Supervisor</a></li>
                    <li><a href="logbook.php"><i class="fa fa-book fa-3x"></i> Logbook</a></li>
                    <li><a href="profile.php"><i class="fa fa-user fa-3x"></i> Profile</a></li>
                    <li><a href="upload.php"><i class="fa fa-upload fa-3x"></i> Upload Acceptance</a></li>
                    <li><a href="account.php"><i class="fa fa-university fa-3x"></i> Account Details</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-3x"></i> Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- SIDEBAR -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="staff/assets/img/find_user.png" class="user-image img-responsive" style="width:65px;" />
                    </li>
                    <li><a href="dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a></li>
  <li>
                        <a class="menu" href="account.php"><i class="fa fa-user fa-3x"></i> Account Details</a>
                    </li>
                    <li><a href="letter.php"><i class="fa fa-file-text fa-3x"></i> Print Introduction Letter</a></li>
                    <li><a href="supervisor.php"><i class="fa fa-user fa-3x"></i> Supervisor</a></li>
                    <li><a href="logbook.php"><i class="fa fa-book fa-3x"></i> Logbook</a></li>
                    <li><a href="profile.php"><i class="fa fa-user fa-3x"></i> Profile</a></li>
                    <li><a href="upload.php"><i class="fa fa-upload fa-3x"></i> Upload Acceptance</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-3x"></i> Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- PAGE CONTENT -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="font-size:26px;">Account Details</h2>
                    </div>
                </div>
                <hr />
               <div class="form-container">
    <div class="panel panel-success">
        <form id="accountForm">
            <!-- Account Number -->
            <div class="form-group mb-3">
                <label for="accountNumber">Account Number</label>
                <input type="text" class="form-control py-3" id="accountNumber" name="account_number"
                       placeholder="Enter account number" maxlength="10" required
                       oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10);">
                <small class="text-muted">Only numbers, max 10 digits</small>
            </div>

            <!-- Account Name -->
            <div class="form-group mb-3">
                <label for="accountName">Account Name</label>
                <input type="text" class="form-control py-3" id="accountName" name="account_name"
                       placeholder="Enter account name" required
                       oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');">
                <small class="text-muted">Only letters and spaces</small>
            </div>

            <!-- Bank Name -->
            <div class="form-group mb-3">
                <label for="bankName">Bank Name</label>
                <input type="text" class="form-control py-3" id="bankName" name="bank_name"
                       placeholder="Enter bank name" required
                       oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');">
                <small class="text-muted">Only letters and spaces</small>
            </div>

            <!-- Save/Update Button -->
            <div class="text-center">
                <button type="submit" id="saveBtn" class="btn btn-success px-5">Save</button>
            </div>

            <!-- Success Message -->
            <div id="saveMsg" class="alert alert-success text-center mt-3" style="display:none;">
                Account details saved successfully!
            </div>
        </form>
    </div>
</div>

<script>
    const accountForm = document.getElementById("accountForm");
    const saveMsg = document.getElementById("saveMsg");
    const saveBtn = document.getElementById("saveBtn");

    accountForm.addEventListener("submit", function(e) {
        e.preventDefault();

        let accNum = document.getElementById("accountNumber").value;

        // Validate account number (must be exactly 10 digits)
        if (accNum.length !== 10) {
            alert("Account number must be exactly 10 digits!");
            return;
        }

        // Show success message
        saveMsg.innerText = (saveBtn.innerText === "Save")
            ? "Account details saved successfully!"
            : "Account details updated successfully!";

        saveMsg.style.display = "block";

        // Change button text to "Update"
        saveBtn.innerText = "Update";

        // Hide message after 3 seconds
        setTimeout(() => {
            saveMsg.style.display = "none";
        }, 3000);
    });
</script>

    <!-- SCRIPTS -->
    <script src="staff/assets/js/jquery-1.10.2.js"></script>
    <script src="staff/assets/js/bootstrap.min.js"></script>
    <script src="staff/assets/js/jquery.metisMenu.js"></script>
    <script src="staff/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="staff/assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="staff/assets/js/custom.js"></script>

    <script>
    $(document).ready(function () {
        // Validate only numbers in Account Number
        $('#accountNumber').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Validate only letters and spaces in Account Name and Bank Name
        $('#accountName, #bankName').on('input', function () {
            this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
        });

        // AJAX form submission
        $('#accountForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: 'save_account.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.trim() === "success") {
                        $('#saveMsg').fadeIn().delay(3000).fadeOut();
                        $('#accountForm')[0].reset();
                    } else {
                        alert('Error saving data: ' + response);
                    }
                },
                error: function () {
                    alert('Connection error. Please try again.');
                }
            });
        });
    });
    </script>
</body>
</html>
