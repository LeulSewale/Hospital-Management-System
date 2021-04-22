
<?php
/**
 * @author Yushae Raza, Nielson Trung
 * 2019-3-16
 * Seng Project Iteration 2 Group 4
 * 
 */
include '../../Scripts/config.php';
include '../../Scripts/password generater.php';
if(isset($_POST['name'])){
	echo $_POST['name'];
}
$errmsg="";

/**
 * Sends a verification email to the new user
 * @param $email email of recipient
 * @param $username username of recipient
 * @param $password password of recipient
 */
function send_email($email,$username,$token,$password){
	$subject = "Email Verification";
	$message="<html>
	<head>

	<style type='text/css'>
		.logo{
			margin: 0 auto;
			text-align: center;
		}
		.content{
			margin: 0 auto;
			padding: 12px 18px;
			width: 500px;
		background-color:#C1C3DB;
			border-radius: 8px; 
		}

	</style>

	</head>
	

	<body> 
	<div class='email'>
<div class='logo'>
<img src='https://i2.wp.com/connectsociety.org/wp-content/uploads/2018/01/Alberta-Childrens-Hospital-2-blurb.jpg?zoom=1.25&w=1080&ssl=1'  width='400px' height='200px'>
</div>
<div class='content'>
	<p> welcome " .$username. " and congrats on becoming an employee of the calgary children hosptial your Login details are as follows.<br> Username: " .$username. "<br> Password: ".$password."<br>
	<p > please verify your email
	<a href='http://yushae.com/Seng300/verify?username=" . $username . "&token=" . $token . "'>link.</a></p>
</div>

</div>

	</body></html>";
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	$headers[] = "From: Hospitalmangement <Hospitalmangement@yushae.com>";

	mail($email, $subject, $message, implode("\r\n", $headers));

}

/**
 * Create a new nurse in database
 */
if (isset($_POST["submit2"])){
  	//echo "asd";
	if(is_full()){
			if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
				
					$sql = "SELECT Username FROM Users";
					$res= $connection->query($sql);
					$dublicate=false;
					//Check if the username is unique and assign $duplicate var accordingly
					while($row= $res->fetch_assoc()){
						if($row["Username"] ==$_POST["username"] ){
							$dublicate=true;
							
							$GLOBALS['errmsg']="That username already exists";
						}
					}

					//if not a duplicate username generate and encrypt password for user
					//and insert their data in database
					if(!$dublicate){
						$pass= generate(8);
						$password=  password_hash($pass, PASSWORD_BCRYPT);
						$vtoken = bin2hex(openssl_random_pseudo_bytes(64));
						$sql=("INSERT INTO Users (`Role`,`Username` ,`password` ,`Email`, `Name`,`Address`, `Province` ,`City`,`Country`,`Postal`,`vtoken`) VALUES('3','".$_POST['username']."','".$password."','".$_POST['email']."','".$_POST['Name']."','".$_POST['street']."','".$_POST['province']."','".$_POST['city']."','".$_POST['country']."','".$_POST['postal']."','".$vtoken."')");
					
						if($connection->query($sql)){
							
							
							$login=false;
							$correct_password=true;
							$correct_user=false;
							$userid=$connection ->insert_id;
							$sig= generate_signature(6);

							$sql= ("INSERT INTO nurses (`Nurse_ID`,`FullName`,`Department`) VALUES('".$userid."','".$_POST['Name']."','".$_POST['department']."')");
							if($connection->query($sql)){
								$GLOBALS['errmsg']= "Account created successfully";
								send_email($_POST['email'],$_POST['username'],$vtoken,$pass);
							
								$connection->close();
							}
							else{
							    echo "Error: " . $sql . "<br>" . $connection->error;
							}
						}
						else{
							    echo "Error: " . $sql . "<br>" . $connection->error;
						}
					}
			}
			else{
			$GLOBALS['errmsg'] = "That is not a valid email";
			}
	}
	else{
	}
}

/**
 * return true or false if all the form fields are filled
 * @return value if the form is filled or not
 */
function is_full(){
	$GLOBALS['errmsg'];
	$fields=  array("Name","username","email","password","password2","street","postal","city","province","country","type");
	foreach ($fields as $field) {
		if(empty($_POST[$field])){
			$GLOBALS['errmsg'].= $field." is not filled. <br>";
			return false;
		}
		else{
			return true;
		}
		# code...
	}
}





?>
<!DOCTYPE html>
<html>
<head>
<title></title>
	
	<title></title>
	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../Styles/style.css?v1.05">
	<script type="text/javascript" src="../../Scripts/loader.js"></script>
	<script type="text/javascript" src="../../Scripts/nav.js"></script>
	<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />

	
</head>
<body >
<div class="container form-container">
<h1>Create Nurse Account</h1>
<div class="navb"></div><br>
<hr>
<br>

<div class ="col-md-6 form">
<div class="text-center">
 <div id="loader" ></div>
</div>
<div id="message">
<?php 
	if (isset($errmsg)) {
		echo $errmsg;
	}



	?>
</div>
<form   novalidate  id ="test" method="POST" autocomplete="off" >
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
	<label>Department:</label>
	<select class="form-control"   name="department"  >
		<option value="icu">icu</option>
		<option value="emergency">i</option>
	</select>
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
		
		<div class="center-btn">
	<button  type ="button" 	class="btn btn-primary sub" onclick="showpage1()"> Back</button>
</div>

<br>
	<div class="center-btn">
	<input  type="submit" name="submit2" class="btn btn-primary sub" value="Create Account">
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