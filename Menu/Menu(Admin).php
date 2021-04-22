


    <nav class="navbar navbar-expand-sm navbar-light bg-primary">
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class=" test navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
            <a class="navbar-brand font-bold" href="https://www.yushae.com/Seng300">Hospital Mangment</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="https://www.yushae.com/Seng300"><span class="fas fa-sign-in-alt"></span> Login</a>
        </li>
        <li class="nav-item dropdown dmenu">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <span class="fas fa-user"></span> Create Accounts </a>
        
            <div class="dropdown-menu mm-menu ">
           <a class="dropdown-item" href="yushae.com/Seng300/Admin/Create"><span class="fas fa-user"></span> Sign Up Admins</a>
                <a class="dropdown-item" href="yushae.com/Seng300/Admin/CreateDocters"><span class="fas fa-user"></span> Sign Up Docters</a>
            </div>
          </li>
          
            <li class="nav-item ">
            <a class="nav-link" href="https://www.yushae.com/Seng300/Admin">Admin</a>
        </li>
             <li class="nav-item ">
            <a class="nav-link" href="https://www.yushae.com/Seng300/Booking">Make Appointments</a>
        </li>
  
           
            <li class="nav-item dropdown dmenu">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
             <i class="fa fa-user"></i> 	<?php  session_start();
              echo $_SESSION["username"];	?></a>
            <div class="dropdown-menu mm-menu">
             <a class="dropdown-item" href="yushae.com/Seng300/Reset_Password">Change password</a>
              <a class="dropdown-item" href="/Seng300/Scripts/loggout(Admin).php?Logout=true">Log out</a>
            </div>
          </li>
             
          
          
           <!-- <li class="nav-item dropdown dmenu">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Dropdown link
            </a>
            <div class="dropdown-menu sm-menu">
              <a class="dropdown-item" href="#">Link 1</a>
              <a class="dropdown-item" href="#">Link 2</a>
              <a class="dropdown-item" href="#">Link 3</a>
              <a class="dropdown-item" href="#">Link 4</a>
              <a class="dropdown-item" href="#">Link 5</a>
              <a class="dropdown-item" href="#">Link 6</a>
            </div>
          </li> -->
          </ul>
     
        </div>
      </nav>
