<?php 
/**
 * @author Nielson Trung
 * March 16, 2019
 * Seng300 Project Iteration 2 Group 4
 * html page of Reset_Password
 * 
 */ 
  include '../Scripts/loggout.php';


 ?>


<!DOCTYPE html><html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Styles/style.css">
    <script type="text/javascript" src="../Scripts/nav.js"></script>
    
  
  </head>
  <div class="navb"></div>
  <body onload="test.reset();">
    <div class="container form-container">
        <h1>Password Reset</h1>
        <div class="col-md-6 form">
            <?php 
                if (isset($_GET['errmsg'])) {
                    echo $_GET['errmsg'];
                }
            ?>
            <form method="post" id="test" action="../Scripts/reset_password.php">
            <label>Type Your New Password</label>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Retype Password</label>
                    <input class="form-control" type="password" name="password2" placeholder="Retype Password">
                </div>
            <div class="form-group"></div>
            <input class="btn btn-primary" type="submit" name="submit">
            </form>
        </div>    
    </div>
    
  </body>
</html>