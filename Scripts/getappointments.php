<?php

include '../Scripts/config.php';
function  getAppointments($meh,$connection,$userid)
	{
		
		$sql = "SELECT * FROM Appoinments WHERE pid = $userid";
		$data=array();
	 	$result=$connection->query($sql);
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
if(isset($_POST['meh']))
{
	$work=	$_SESSION["id"];
	echo getAppointments($_POST['meh'],$connection,$work);
}


?>