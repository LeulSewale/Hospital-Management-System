<?php


?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../Styles/style.css?v1.05">
<script type="text/javascript" src="../Scripts/loader.js"></script>
<script type="text/javascript" src="../Scripts/nav.js"></script>
<style type="text/css">

</style>
</head>
<body >
<h1>Login</h1>
 <div class="navb"></div>
<hr>
<div class="container form-container">
 


<br>
<div class ="col-md-6 form">
	<div class="text-center">
 <div id="loader" ></div>
</div>

	<div  id="message">
	<?php 
	if (isset($_GET['errmsg'])) {
		echo $_GET['errmsg'];
	}



	?>
	</div>

	<form   novalidate action="../Scripts/login.php" method="POST" autocomplete="off">

		 <div class="form-group">
		<label for="username">UserName</label>
		<input class="form-control" type="text"  name="username" placeholder="UserName" >
		</div>
		
		 <div class="form-group">
		<label for="pwd">Password</label>
		<input type="Password" name="password" class="form-control" placeholder="Password">
	</div>
		<div class="center-btn">
		<input  type="submit" name="submit2" class="btn btn-primary sub" value="Login">
	</div>
		  <div class="form-group center-btn">
           <a href="https://www.yushae.com/Seng300/Register" class="link">Create Account?</a>
           </div>

	</form>

	
	</div>

</div>
</body>
</html>