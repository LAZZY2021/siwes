<?php
include("connect.php");
session_start();
if(!isset($_SESSION['stu_id'])){
    header("location:index.php");
}

$yat=mysqli_query($con,"select * from student where id='".$_SESSION['stu_id']."'");
$me=mysqli_fetch_assoc($yat);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMS | Dashboard</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="staff/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="staff/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- CUSTOM STYLES-->
    <link href="staff/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="staff/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <style>
        body{
            border: 5px solid black;
            height: 1000px; 
            overflow: hidden;
        }
        /* Panel styles */
        .panel {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.2s;
        }
        .panel:hover {
            transform: scale(1.03);
        }
        .panel-body {
            padding: 30px;
        }
        .panel-footer {
            border-radius: 0 0 10px 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top sticky" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php" style="font-size:18px;">Welcome, <?php echo ucfirst($me['firstname'])?></a> 
            </div>
		
            <div style="color: white;
                padding: 15px 50px 5px 50px; text-align:center;
                font-size: 16px;">
                <font style="font-weight:bold; font-size:25px; font-family:Comic Sans MS;">SIWES MANAGEMENT SYSTEM</font>
                <a href="logout.php" class="btn btn-danger square-btn-adjust" style="float: right;">Logout</a> 
            </div>
        </nav>   
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side fixed" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li class="text-center">
                        <img src="staff/assets/img/find_user.png" class="user-image img-responsive" style="width:65px;"/>
					</li>
                    <li>
                        <a class="active-menu" href="dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="menu" href="account.php"><i class="fa fa-user fa-3x"></i> Account Details</a>
                    </li>
                    <li>
                        <a href="letter.php"><i class="fa fa-file-text fa-3x"></i> Print Introduction Letter</a>
                    </li>
                    <li>
                        <a href="supervisor.php"><i class="fa fa-user fa-3x"></i> Supervisor</a>
                    </li>	
				    <li>
                        <a href="logbook.php"><i class="fa fa-book fa-3x"></i> Logbook</a>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-user fa-3x"></i> Profile</a>
                    </li>
                    <li>
                        <a href="upload.php"><i class="fa fa-upload fa-3x"></i> Upload Acceptance</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-3x"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="font-size:26px;">Dashboard</h2>   
                    </div>
                </div>
                <hr />
			   
               
             <div class="row text-center" style="margin-top:30px; display:flex; justify-content:center;">

    <!-- Supervisor -->
    <div class="col-md-3-5" style="flex:0 0 29%; max-width:29%; margin:0 10px;">
        <a href="supervisor.php" style="text-decoration:none;">
            <div class="panel" style="background:#3498db; color:white; border-radius:12px; height:160px; display:flex; flex-direction:column; justify-content:center; align-items:center; transition:0.3s;">
                <i class="fa fa-user fa-3x" style="margin-bottom:10px;"></i>
                <h4>Supervisor</h4>
            </div>
        </a>
    </div>

    <!-- Logbook -->
    <div class="col-md-3-5" style="flex:0 0 29%; max-width:29%; margin:0 10px;">
        <a href="logbook.php" style="text-decoration:none;">
            <div class="panel" style="background:#27ae60; color:white; border-radius:12px; height:160px; display:flex; flex-direction:column; justify-content:center; align-items:center; transition:0.3s;">
                <i class="fa fa-book fa-3x" style="margin-bottom:10px;"></i>
                <h4>Logbook</h4>
            </div>
        </a>
    </div>

    <!-- Print Introduction -->
    <div class="col-md-3-5" style="flex:0 0 29%; max-width:29%; margin:0 10px;">
        <a href="letter.php" style="text-decoration:none;">
            <div class="panel" style="background:#e67e22; color:white; border-radius:12px; height:160px; display:flex; flex-direction:column; justify-content:center; align-items:center; transition:0.3s;">
                <i class="fa fa-envelope fa-3x" style="margin-bottom:10px;"></i>
                <h4>Print Introduction</h4>
            </div>
        </a>
    </div>

</div>

<!-- Hover Effect Styles -->
<style>
    .col-md-3 a div:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        opacity: 0.95;
    }
</style>


             
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="staff/assets/js/jquery-1.10.2.js"></script>
	
	<script> 
	  $(document).ready(function(){
		
	$("input.upload").change(function(){
		$("div.form_content").show();
	});
	$("button.close_content").click(function(){
		$("div.form_content").fadeOut();
	});
		
			$("#formupload").on('submit',(function(e){
			e.preventDefault();

				$.ajax({
						type: "POST",
                        url: "operation.php",
                        data: new FormData(this),
						contentType:false,
						processData:false,
                        cache: false,
                        success: function(data){ 
						$("div.msg").html(data);
                        } 
				});
			
		}));
		
	 });
	 </script> 
		<script>
	$(document).ready(function(){
		$("a.delete").click(function(){
			var delete_material = $(this).attr("id");
				if(confirm("Are you sure you want to delete file?"))
		  {
			$.ajax({
						type: "POST",
                        url: "operation.php",
                        data: ({delete_material:delete_material}),
                        cache: false,
                        success: function(data){ 
							$("div#"+delete_material).animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
						 } 
 });
 }

return false;
		});
		
	});
	</script>
	
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="staff/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="staff/assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="staff/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="staff/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="staff/assets/js/custom.js"></script>
    
   
</body>
</html>
