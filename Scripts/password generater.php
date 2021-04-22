<?php
/**
 * @author Yushae Raza
 * Seng300 Project Iteration 2 Group 4
 * 2019-3-13
 * php file to generate passwords
 */

 	/**
	  * Return a password with @param $length password may contain numbers and special characters
      * @param $length length of the generated password
      */
	function generate($length){

		$char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!?~@#-_+';
		$password='';
		for($i=0; $i<$length;$i++){
			$random= rand(0,strlen($char));
			$rand_char=substr($char, $random,1);
			if(strlen($password)>0){
				while (strpos($rand_char, $password)!=false){
					$random= rand(0,strlen($char));
					$rand_char=substr($char, $random,1);
				}
			}
			
			
			$password.= $rand_char;

		}
		return $password;

	}

		/**
		 * Returns a password with @param $length password only contains numbers
		 * @param $length length of the generated password
		 */
		function generate_signature($length){

		$char = '1234567890';
		$password='';
		for($i=0; $i<$length;$i++){
			$random= rand(0,strlen($char));
			$rand_char=substr($char, $random,1);
			if(strlen($password)>0){
				while (strpos($rand_char, $password)!=false){
					$random= rand(0,strlen($char));
					$rand_char=substr($char, $random,1);
				}
			}
			
			
			$password.= $rand_char;

		}
		return $password;

	}


?>