<?php
/**
 * @author Yushae Raza
 * March 25, 2019
 * SENG 300 Project iteration 1
 * php file to register user
 * 
 */

include '../Scripts/config.php';
if(isset($_POST['name'])){
	echo $_POST['name'];
}
$errmsg="";

/**
 * Sends a verification email to the new user
 * @param email the recipient of the verification email
 * @param username the recipient's username
 * @param token the recipient's token includes their identity and privileges of their account
 */
function send_email($email,$username,$token){
	$subject = "Email Verification";
	$message="<html>
	<head></head>
	<body> <p> please verify your email
	<a href='https://www.yushae.com/Seng300/verify?username=" . $username . "&token=" . $token . "'>link.</a>

	</p></body></html>";
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	$headers[] = "From: Hospitalmangement <Hospitalmangement@yushae.com>";

	mail($email, $subject, $message, implode("\r\n", $headers));

}
if (isset($_POST["submit2"])){
  	//echo "asd";

	if(is_full()){
		
		if($_POST["password"] ==$_POST["password2"]){
			if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
				
					$sql = "SELECT Username FROM Users";
					$res= $connection->query($sql);
					$dublicate=false;
					while($row= $res->fetch_assoc()){
						if($row["Username"] ==$_POST["username"] ){
							$dublicate=true;
							echo "That username already exists";
							$GLOBALS['errmsg']="That username already exists";
						}
					}

					if(!$dublicate){
						$password=  password_hash($_POST['password'], PASSWORD_BCRYPT);
						$vtoken = bin2hex(openssl_random_pseudo_bytes(64));
						$sql=("INSERT INTO Users (`Username` ,`password` ,`Email`, `Name`,`Address`, `Province` ,`City`,`Country`,`Postal`,`vtoken`) VALUES('".$_POST['username']."','".$password."','".$_POST['email']."','".$_POST['Name']."','".$_POST['street']."','".$_POST['province']."','".$_POST['city']."','".$_POST['country']."','".$_POST['postal']."','".$vtoken."')");
						if($connection->query($sql)){
							$sql= "SELECT UserId FROM Users WHERE Username =('".$_POST['username']."' ) ";
							$result = $connection -> query($sql);
							$login=false;
							$correct_password=true;
							$correct_user=false;
							$userid;
							while($row = $result->fetch_assoc()) {
								$userid=$row['UserId'];
							}

							$sql= ("INSERT INTO Patients (`USERID`,`Health_CareCard`) VALUES('".$userid."','".$_POST['healthcardnumber']."')");
							if($connection->query($sql)){
								$GLOBALS['errmsg']= "Account created successfully";
								send_email($_POST['email'],$_POST['username'],$vtoken);
								header("Location: https://www.yushae.com/Seng300/Login");
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
			header("Location: https://www.yushae.com/Seng300/Register?errmsg=".$GLOBALS['errmsg']."");
			}
		
		}
		else{
				$GLOBALS['errmsg']= "Your Passwords dont match";

			header("Location: https://www.yushae.com/Seng300/Register?errmsg=".$GLOBALS['errmsg']."");
		}

	}
	else{
	
	}
}

/**
 * Checks if all the fields of the user are set
 * 
 * @return value Bool if all the fields are set
 */
function is_full(){
	$GLOBALS['errmsg'];
	$fields=  array("Name","username","email","password","password2","street","postal","city","province","country");
	foreach ($fields as $field) {
		if(empty($_POST[$field])){
			$GLOBALS['errmsg']= $field." is not filled. ";
			header("Location: https://www.yushae.com/Seng300/Register?errmsg=".$GLOBALS['errmsg']."");
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
		  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div style ="margin:0 auto; width:400em;" class="spinner-border text-primary"></div>
</body>
</html>