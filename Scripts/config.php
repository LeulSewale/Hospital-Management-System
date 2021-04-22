<?php
/**
 * @author Yushae Raza
 * March 25, 2019
 * SENG 300 Project iteration 1
 * php file to connect to the database
 * 
 */
ini_set('session.gc_maxlifetime', 30);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(30);
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$servername="localhost"; //ljmm zvtikbf !!!
$username="root";
$password= "yus123";
$database= "Hospital Managment";
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
	die("Connection Failed: " . $connection->connect_error);
	echo $connection->connect_error;
}
?>