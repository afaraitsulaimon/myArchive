<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<title>Store Dashboard</title>
</head>
<body style="background-image: url(../images/digitalArchiving.jpg); background-size: cover;">


	<section class="newGround">

		<!--HEADER DASHBOARD FOR STORE START FROM HERE -->
           
           <div class="container-fluid">
           	   <div class="row">
           	   	   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bg-secondary">
           	   	   	   Welcome User
           	   	   </div>


           	   	   <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bg-secondary">
           	   	   	  
           	   	   	       <div>
           	   	   	         <span class="caret " id="theBola">theuser</span>

           	   	   	     </div>
           	   	   	   
           	   	   	   

           	   	   	</div>
           	   	   	<div>
           	   	   	    <ul id="theDetails" style="display: none">
           	   	   	     <li><a href="logout.php">Log Out</a></li>
           	   	   	     <li><a href="change-password.php">Change Password</a></li>
           	   	   	     <li><a href="edit-profile.php">Edit Profile</a></li>
           	   	   	    </ul>
           	   	   	  </div>
           	   	   </div>


           	   </div>
           </div>

		<!--HEADER DASHBOARD FOR STORE ENDS HERE -->

		<div >
			<a href="#" id="">Bola</a>
			  <ul  style="display: none">
			  	<li>logout</li>
			  	<li>look</li>
			  	<li>great</li>
			  </ul>
		</div>

	</section>

<script type="text/javascript" src="../script/jquery.js"></script>
</body>
</html>

<script type="text/javascript">
	
	$('#theBola') .click(function(){

		$('#theDetails') .toggle();
	});
</script>