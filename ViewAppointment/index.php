


<!DOCTYPE html>
<html lang="en">
<head>

<!-- Fullcalendar stylesheet from bootstrap -->
<link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />

<!-- Calendar CSS -->
<link rel='stylesheet' href='fullcalendar-3.10.0/fullcalendar.css' />

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<!-- JavaScript Calendar -->

<script src='./fullcalendar-3.10.0/lib/moment.min.js'></script>
<script src="./fullcalendar-3.10.0/fullcalendar.js"></script>
<link href='../Styles/style.css' rel='stylesheet' />

<script src='../Scripts/nav.js'> </script>
<script src='../Scripts/view_appointment.js'></script>

</head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
    <div class="navb"></div><br>
    <?php 
    /**
     * @author Yushae Raza
     * March 25, 2019
     * SENG 300 Project iteration 1
     * php file logout page if login is successful
     * 
     */
    include '../Scripts/loggout.php'; 
    include '../Scripts/lookup.php';
    include '../Scripts/getappointments.php';
    ?>
    <div class="px-5">
        <div id="calendar"></div>
    </div>
    





</body>

</html>
