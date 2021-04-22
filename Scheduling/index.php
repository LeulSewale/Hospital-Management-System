<?php include '../Scripts/loggout(admin).php'; 
/**
 * @author Yushae Raza
 * March 25, 2019
 * SENG 300 Project iteration 1
 * php file logout page if login is successful
 * 
 */ 
?>


<!DOCTYPE html>
<html lang="en">
<head>

<!-- Fullcalendar stylesheet from bootstrap -->
<link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />

<!-- Calendar CSS -->
<link rel='stylesheet' href='../Booking/fullcalendar-3.10.0/fullcalendar.css' />

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<!-- JavaScript Calendar -->

<script src='../Booking/fullcalendar-3.10.0/lib/moment.min.js'></script>
<script src="../Booking/fullcalendar-3.10.0/fullcalendar.js"></script>
<script src="../Scripts/schedulingscripts.js"></script>
<link href='../Styles/style.css' rel='stylesheet' />

<script src='../Scripts/nav.js'> </script>

</head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>

<h1>Schedule Nurses</h1>
<div class="navb"></div><br>
<div class="row align-items-center justify-content-center">
  <div class="col-md-5">
  <div class="alert  alert-dismissible fade " role="alert" id="response_msg">
      <p id="msg"></p>
      <button type="button" id= "close_alert" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
</div>
</div>
<div class="row">

  <div class="col-md-2"></div>
  <div id='calendar' class="col-md-8"></div>
  
  <div class ="col-md-2">
  <div class="mr-4">
    <label for="">Available Nurses</label>
    <select id="sel_nurse" class="custom-select" onchange="select_nurse(this)"><!-- get avaiable doctors from database -->
      <option value="select">Select Nurses</option>

    </select>

  </div>
</div>





<!-- Trigger the modal with a button -->
<button id="btnTrigger" type="button" style="display:none;" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div class="modal fade" id="appoinment" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <br>
        
      
      </div>
      <div class="modal-body">
        <h2 class="text-center"> Book</h2>
       <form   novalidate action="" method="POST" autocomplete="off">

     <div class="form-group">
    <label for="patients">Patients</label>
    <select class="form-control" id="patients_sel" name="patients"  >
      <option value="select">select patients</option>
    </select>
    </div>
    
     
    <div class="form-group">
    <label for="description">Description</label>
    <input type="text" name="Description" class="form-control" placeholder="Description">
  </div>
    <div class="center-btn">
    <input  type="submit" name="submit2" class="btn btn-primary sub" value="Book Appoinment">
  </div>
 

  </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal for nurse scheduling-->
<div class="modal fade" id="nurse_schedule" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <br>
        
      
      </div>
      <div class="modal-body">
        <h2 class="text-center"> Schedule</h2>
       <form   novalidate action="" method="POST" autocomplete="off">
    
     
    <div class="form-group">
    <label for="description">Description</label>
    <input type="text" name="Description" class="form-control" placeholder="Description">
  </div>
    <div class="center-btn">
    <input  type="submit" name="submit2" class="btn btn-primary sub" value="Book Appoinment">
  </div>
      <div class="form-group center-btn">
           <a href="https://www.yushae.com/Seng300/Register" class="link">Create Account?</a>
           </div>

  </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal for viewing/deleting an appointment-->
 <div class="modal" id="appoinment-details">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Appointment Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <h5>Title: </h5>
        <p id="title"></p>
      
        <h5>Description: </h5>
        <p id="desc"></p>
     
        <p id="appoinmentid" style="display: none;">
     
        
        <h5>Start: </h5>
        <p id="start"></p>
  
       
        <h5>End: </h5>
        <p id="end"></p>
          <div class="center-btn">
           <button type="button"  onclick ="delete_appointment()" class="btn btn-primary sub">Delete Appoinment</button> 
  </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>




</body>

</html>
