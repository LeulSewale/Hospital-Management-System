<?php

/**
 * @author Yushae Raza
 * March 25, 2019
 * SENG 300 Project iteration 1
 * php file for logging in user
 * 
 */




include 'config.php';
$errmsg;
//verify if a user and password are set and not null
if(isset($_POST['username']) && isset($_POST['password'])){

	$username=$_POST['username'];
	$password= $_POST['password'];
	$email_verify=false;

	//verify that a username and password are set and not null
	if(strlen($username)>0 && strlen($password)>0){
		$sql= "SELECT * FROM Users WHERE Username =('".$username."' ) ";
		$result = $connection -> query($sql);
		$login=false;
		$correct_password=true;
		$correct_user=false;
		$role;
		//check if the user exists in the database 

		while($row = $result->fetch_assoc()) {
				$correct_user=true;
			if(password_verify($password, $row["password"])){
				if($row["verified"]==1){

				$_SESSION["id"] = $row["UserId"];
				$_SESSION["username"] = $row["Username"];
				$_SESSION["role"] = $row["Role"];
				$email_verify=true;
				$login=true;
				$role=$row["Role"];

				}



			}
			else{
				$correct_password=false;
			}
			
	      
	    }
	    if($login  &&$email_verify){
		    	echo "login success";
		    	header("Location: https://www.yushae.com/Seng300/");
	    	
	    }
	    else{
	    	if($correct_user){
		    	if(!$email_verify){
		    		$errmsg="please verify your email ";
		    	}
		    	if(!$correct_password){
		    		$errmsg="Incorrect password or username";
		    	}
	   		}
	    else{
	    	$errmsg="Incorrect username";
	    }
	    session_unset();
	    	session_destroy();
	    	header("Location: https://www.yushae.com/Seng300/Login?errmsg=$errmsg");
	    	
	    	
	    }
	}
	else{

		$errmsg= "please fill in your username and password";
		  	header("Location: https://www.yushae.com/Seng300/Login?errmsg=$errmsg");
	}


}?>