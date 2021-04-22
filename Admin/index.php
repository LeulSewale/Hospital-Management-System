<?php 
/**
 * @author Yushae Raza
 * March 16, 2019
 * SENG 300 Project iteration 2
 * php file Account page of Admin user
 * 
 */ 
	include '../Scripts/loggout(admin).php';
 ?>
 
 <!DOCTYPE html>
 <html>
 <head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />

	<link rel="stylesheet" type="text/css" href="../Styles/style.css?v1.05">
	<script type="text/javascript" src="../Scripts/loader.js"></script>
	<script type="text/javascript" src="../Scripts/nav.js"></script>
	<script type="text/javascript" src="../Scripts/admin.js"></script>


 </head>
 <body>

 
 <div id="wrapper">
 <h1>Admin</h1>
 <div class="navb"></div><br>
 <br>
 

 <div class="Admin" >
 	


 </div>
 <div class="patients">
  <h3 class="patient heading">Patients</h3>
 <table  id="patient" class="patients_table">
 <thead>
 <tr>
 	<th>User Id</th>
 	<th>Full Name</th>
 	<th>Email</th>
 	<th>Address</th>
 	<th>Provice</th>
 	<th>City</th>
 	<th>Country</th>
 	<th>Postal</th>
 	<th>Health Card Number</th>

 </tr>
 </thead>
 </table>

 </div>

 </div>
 </body>
 </html>