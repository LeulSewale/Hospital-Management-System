<?php
/**
 * @author Yushae Raza
 * March 16, 2019
 * SENG 300 Project iteration 1
 * php file to look up data from database
 * 
 */ 
include '../Scripts/config.php';
	
/**
 * Returns an attribute from a table as a JSON 
 * @param $tbname the tablename
 * @param $colname the desired attribute of the table
 * @return $data 
 */
function Lookup($tbname,$colname){

	 	$sql="SELECT $colname FROM $tbname";
	 	$data=array();
	 	$result=$GLOBALS['connection']->query($sql);
	 	while($row=$result->fetch_array(MYSQLI_ASSOC)){
	 		$col=$row;
	 	
	 		$data[]=$col;
	 	}
	 	return json_encode($data);

		# code...
	}
	
	/**
	 * Return the patients from the database as a JSON
	 * @param $tbname tablename 
	 * @param $colname attribute name
	 */
	function get_patient($tbname,$colname){
		//select from the database where the attribute Role value is equal to 1 (patient role)
		$sql="SELECT $colname FROM $tbname WHERE Role = 1";
		$data=array();
	 	$result=$GLOBALS['connection']->query($sql);
	 	while($row=$result->fetch_array(MYSQLI_ASSOC)){
	 		$col=$row;
	 	
	 		$data[]=$col;
	 	}
	 	return json_encode($data);
	}

	if(isset($_POST['patient'])){

	 	$sql=("SELECT * FROM `Patients`");
	 	$test=array();
	 	$result = $connection -> query($sql);
	 	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
	 		
	 		$sql2 = ("SELECT `UserId`,`Name`,`Email`,`Address`,`Province`,`City`,`Country`,`Postal` FROM Users WHERE UserId = ('".$row['USERID']."')");
	 		$result2=  $connection->query($sql2);
	 		while($row2= $result2->fetch_array(MYSQLI_ASSOC) ){
	 			$col= $row2;
	 			$col['Healthcardno']= $row['Health_CareCard'];
	 			$test[]=$col;
	 		}
	 	}
	 	echo json_encode($test);
	 }

	/**
	 * Return the appointments from the database where the doctor id is equal to $docid
	 * as a JSON 
	 * @param $docid 
	 * @param $connection
	 */
	function get_appoint($docid,$connection){

	  $data_events = array();
	  $sql=("SELECT * FROM Appoinments WHERE DocID = ($docid) ");
	  $result = $connection -> query($sql);
		  while($row = $result->fetch_assoc()) {
		  	$ap=array();
		  	$ap['id']=$row['Id'];
		  	$ap['title']=$row['title'];
		  	$ap['description']=$row['Description'];
		  	$ap['end']=$row['end'];
		  	$ap['start']=$row['start'];
		  	$data_events[]= $ap;
		  	
					
	   }
	    return json_encode(array("events" => $data_events));


	 }
	 if(isset($_POST['docid'])){
	 	echo get_appoint($_POST['docid'],$connection);

	 }
	 if(isset($_POST['column_name'])&& isset($_POST['table'])){
	 	if($_POST['table']=="Users"){
	 			echo get_patient($_POST['table'],$_POST['column_name']);
	 	}
	 	else{
	 		echo Lookup($_POST['table'],$_POST['column_name']);
	 	}
	 	
	 }
	 function get_schedule($nurse_id_sched,$connection){

	  $data_events = array();
	  $sql=("SELECT * FROM Appoinments WHERE Nurse_ID = ($nurse_id_sched) ");
	  $result = $connection -> query($sql);
		  while($row = $result->fetch_assoc()) {
		  	$ap=array();
		  	$ap['id']=$row['Id'];
		  	$ap['title']=$row['title'];
		  	$ap['description']=$row['Description'];
		  	$ap['end']=$row['end'];
		  	$ap['start']=$row['start'];
		  	$data_events[]= $ap;
		  	
					
	   }
	    return json_encode(array("events" => $data_events));


	 }
	 if(isset($_POST['nurse_id_sched'])){
	 	echo get_schedule($_POST['nurse_id_sched'],$connection);

	 }
	 /**
	  * Add a new appoinment to database
	  * @param $title appointment title
	  * @param $pat patient
	  * @param $docid doctor id
	  * @param $from  
	  * @param $till
	  * @param $disc
	  * @param $connection query request to database
	  * @return 
	  */
	 function add_apoin($title,$pat,$docid,$from,$till,$disc,$connection){
	 	$sql=("INSERT INTO Appoinments (`DocID`,`title` ,`start`, `end`,`pid`, `Description`) VALUES($docid,'".$title."','".$from."','".$till."','".$pat."','".$disc."')");
	 	if($connection->query($sql)){
	 		return "Appoinment added successfully";
	 	}
	 	else{
	 		return "Error: " . $sql . "<br>" . $connection->error;
	 	}
	 }
	 if(isset($_POST['patients'])&& isset($_POST['Description'])&& isset($_POST['title'])&& isset($_POST['from'])&& isset($_POST['till'])&& isset($_POST['doc_id'])){

	 		echo add_apoin($_POST['title'],$_POST['patients'],$_POST['doc_id'],$_POST['from'],$_POST['till'],$_POST['Description'],$connection);
	 }
	 function add_nurse_schedule($title,$nurse_id,$from,$till,$disc,$connection){
	 	$sql=("INSERT INTO Appoinments (`Nurse_ID`,`title` ,`start`, `end`,`pid`, `Description`) VALUES ($nurse_id,'".$title."','".$from."','".$till."', -1,'".$disc."')");
	 	if($connection->query($sql)){
	 		return "Appoinment added successfully";
	 	}
	 	else{
	 		return "Error: " . $sql . "<br>" . $connection->error;
	 	}	
	 }
	 if(isset($_POST['Description'])&& isset($_POST['title'])&& isset($_POST['from'])&& isset($_POST['till'])&& isset($_POST['nurse_id'])){

	 		echo add_nurse_schedule($_POST['title'],$_POST['nurse_id'],$_POST['from'],$_POST['till'],$_POST['Description'],$connection);
	 }
 	?>
