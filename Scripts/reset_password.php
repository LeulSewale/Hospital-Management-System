<?php
/**
 * @author Nielson Trung
 * March 2019-03-16
 * SEng300 Project iteration 2
 * php file to reset user password
 */

include '../Scripts/config.php';
$errmsg="";

/**
 * Updates the users password with the new password
 */
    if(isset($_POST["submit"])){
        if(is_full()){
            if($_POST["password"]==$_POST["password2"]){
                $exists = true;
                    if($exists){
                        $username = $_SESSION['username'];
                        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
                        $sql = "UPDATE Users SET password='$password' WHERE Username='".$username."'";
                        if($connection->query($sql)){
                            $GLOBALS['errmsg'] = "Your Password has been reset";
                            header("Location: https://www.yushae.com/Seng300/Reset_Password?errmsg=".$GLOBALS['errmsg']."");
                            $connection->close();
                        }
                    }else{
                        $GLOBALS['errmsg'] = "You are not logged in";
                        header("Location: https://www.yushae.com/Seng300/Reset_Password?errmsg=".$GLOBALS['errmsg']."");    
                    }
                }else{
                    $GLOBALS['errmsg'] = "Your Passwords dont match";
                    header("Location: https://www.yushae.com/Seng300/Reset_Password?errmsg=".$GLOBALS['errmsg']."");
                }
            }else{
                $GLOBALS['errmsg'] = "Missing field";
                header("Location: https://www.yushae.com/Seng300/Reset_Password?errmsg=".$GLOBALS['errmsg']."");
            }
        }


 
/**
 * returns boolean if all the fields of the form are set
 * @return Boolean if all the fields are set
 */
function is_full(){
	$GLOBALS['errmsg'];
    $fields=  array("password","password2");
	foreach ($fields as $field) {
		if(empty($_POST[$field])){
			$GLOBALS['errmsg']= $field." is not filled. ";
			header("Location: https://www.yushae.com/Seng300/Reset_Password?errmsg=".$GLOBALS['errmsg']."");
			return false;
		}
		else{
			return true;
		}
		# code...
	}
}
?>