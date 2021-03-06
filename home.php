<?php
header("Content-type: text/html; charset=utf-8");  
error_reporting(E_ALL ^ E_NOTICE);
require "includes/config.php"; 
require "includes/sess.php";
session_start();

 if( !$_SESSION['fname'] ){
	header('Refresh: 0; URL=login.php');
	exit;
} 
?>

<style>

#logout{
	display:block;
	position:absolute;
	top:10px;
	right:15px;
}

</style>

<html>
	<head>
		<title>UsableX</title>
		<link href="css/home-style.css" rel="stylesheet" type="text/css" media="all" /><br/>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="js/jqueryUI/js/jqueryui.js"></script>
	</head>

	<body>
	<a onClick="window.location.href ='login.php?logout=true'" style="text-decoration:none">
		<button name="logout" id="logout" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false">
		<span class="ui-button-text">Logout</span></button>
	</a>
	
	<div id="main">

		<div id="icon">
			<a href="index.php?vertical=na" name="navXTable" id="navXTable" title="xTable">
				<img alt="XTable" id="XTable" src="img/xtable.png" height="130px" width="130px" />
			</a>
		</div>

		<div id="icon">
			<a href="dashboard.html" name="navDashboard" id="navDashboard" >
				<img alt="Dashboard" id="Dashboard" src="img/dashboard.png" height="130px" width="130px"  title="Dashboard"/>
			</a>
		</div>

		<div id="icon">
			<a href="reportgen.php" name="navReporting" id="navReporting" title="Reporting">		
				<img alt="Reporting" id="Reporting" src="img/reports_icon.jpg" height="130px" width="130px" />
			</a>
		</div>		
<?php
	if( $_SESSSION['role'] < 3){
?>
	
		<div id="icon">
			<a href="admin.php" name="navAdministration" id="navAdministration">
				<img alt="Administration" id="Administration" src="img/admin.png" height="130px" width="130px" title="Administration"/>				
			</a>			
		</div>

<?php		
}
?>
	</div>
	</body>

	<script charset="UTF-8">
	
			///////////////////////////////////LOGOUT FUNCTION///////////////////////////////////////////////////////////////////////	
			$("#logout").click(function(){
							
							window.location.reload();
							window.location.href ="login.php?logout=true";
							
								$.ajax({											
								  type: "GET",
								  url: "login_mod.php",
								  cache: false,
								  data: "kill=kill",
								}).done(function( msg ) {
								
									if( is_loggedin(msg) ){		
									
										if (msg == "true"){
										
											window.location.href ="login.php?logout=true";
											
										}else{
										
											alert("Error logging out, try again");																
										}
									}																
										
								});		

			});// END LOGOUT 
	
	</script>
	
</html>