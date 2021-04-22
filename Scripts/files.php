<?php
/**
 * @author Yushae Raza
 * 2019-3-16
 * Determines type of user and loads pages corresponding to their permissions
 */

session_start();

	function read_file($filename){
		$file_content;
		if(isset($_SESSION['role'])){
		if($_SESSION['role']==2){
			$file_content = file_get_contents("../Menu/Menu(Admin).html");
		}
		else if($_SESSION['role']==1){
			$file_content = file_get_contents("../Menu/Menu(Patient).html");
		}
		else{
		$file_content = file_get_contents("../Menu/Menu(Patient).html");
		}
	}
	else{
		$file_content = file_get_contents("../Menu/Menu(Patient).html");
	}
	
		// else {
		// 	$file_content = file_get_contents("../Menu/Menu.html");
		// }

		return $file_content;
	}
	if(isset($_POST["Name"])){
		echo read_file($_POST["Name"]);
	}
	?>