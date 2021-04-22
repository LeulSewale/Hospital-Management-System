

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../Styles/style.css?v1.05">
	<script type="text/javascript" src="../Scripts/loader.js"></script>
	<script src='../Scripts/nav.js'> </script>

</head>
<body  onload="test.reset();">
<h1>Register</h1>
 <div class="navb"></div>
<div class="container form-container">

<hr>
<br>

<div class ="col-md-6 form">
<div class="text-center">
 <div id="loader" ></div>
</div>
<div id="message">
<?php 
	if (isset($_GET['errmsg'])) {
		echo $_GET['errmsg'];
	}



	?>
</div>
<form   novalidate action="../Scripts/register.php" id ="test" method="POST" autocomplete="off" >
	<div id = "page1">
	 <div class="form-group">
	<label >Full Name </label>
	
	<input   class="form-control" type="text"  name="Name" placeholder="Full Name">
</div>
	 <div class="form-group">
	<label>UserName</label>
		<input class="form-control" type="text"  name="username" placeholder="UserName" >
	</div>
	 <div class="form-group">
	<label>Email</label>
	<input class="form-control" type="email"  name="email" placeholder="Email" >
</div>
	 <div class="form-group">
	<label>Password</label>
	<input type="Password" name="password" class="form-control" placeholder="Password">
</div>
	 <div class="form-group">
	<label>Retype Password</label>

	<input type="Password" name="password2" class="form-control" placeholder="Retype Password">
	</div>
	<div class="center-btn">
	<button type ="button" 	class="btn btn-primary sub" onclick="showpage2()"> Continue</button>
</div>
</div>
<div id ="page2">
	<div class="form-group">
	<label>Street Address</label>
		<input class="form-control" type="text"  name="street" placeholder="Street Address" >
	</div>
		<div class="form-group">
		<label>Postal Code </label>
		<input class="form-control" type="text"  name="postal" placeholder="Postal Code" >
	</div>
		<div class="form-group">
	<label>City</label>
		<input class="form-control" type="text"  name="city" placeholder="City" >
	</div>
		<div class="form-group">
<label>Province</label>

		<input class="form-control" type="text"  name="province" placeholder="Province" >
	</div>
<div class="form-group">

	<label>Country</label>
	

		<input class="form-control" type="text"  name="country" placeholder="Country" >
	</div>
		<div class="form-group">
		<label>Health Card number</label>
		<input  class="form-control" type ="number" name="healthcardnumber" placeholder="Health card number">
	</div>
		<div class="center-btn">
	<button  type ="button" 	class="btn btn-primary sub" onclick="showpage1()"> Back</button>
</div><br>
	<div class="center-btn">
	<input  type="submit" name="submit2" onclick="display_loader()"class="btn btn-primary sub" value="Create Account">
</div>
	<div class="form-group center-btn">
		<p> Already have a account <a class="link" href="https://www.yushae.com/Seng300/Login">Sign in!</a></p>
	</div>
</div>
</form>


</div>
</div>
<script type="text/javascript">
	
	function showpage2(){
	
		var page1 = document.getElementById("page1");
		var page2=document.getElementById("page2");
		page1.style="display:none;";
		page2.style.display="block";
	}
	function showpage1(){
		var page1 = document.getElementById("page1");
		var page2=document.getElementById("page2");
		page1.style="display:block;";
		page2.style.display="none";
	}
</script>
</body>
</html>