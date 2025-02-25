<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Declaration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="help.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>
  <body>
 
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-inverse navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><h2 style="color:#d5d5d5">Declaration</h2></a>
        
        <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto" >
                <li class="nav-item ">
                  <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php"><i class='fas fa-user'></i> Create Account</a>
                </li>
                <li class="nav-item" >
                  <a class="nav-link" href="login.php"><i class='fas fa-sign-in-alt'></i> Login</a>
                </li>
            </ul>
        </div>
      </div>
    </nav>

    <div>


    </div>
    <hr class="my-4">
    <hr class="my-4">
   
     <!---- jumbotron --->
    
      <div class="container-fluid" >
      <div  class="jumbotron bg-dark" >
        <div class="col-xs-12 ">
        <h1 style=" text-align: center;color:#d5d5d5">Easy Declaration</h1>
          <h3  style=" text-align: center;color:#d5d5d5">Avoid confrontation with the officers at the gate and declare your items now!</h3>
        </div>
      </div>
    </div>
    <hr class="my-3">
     

    <!-- image Slider-->
    <div id="slides" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators " >
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1" ></li>
        <li data-target="#slides" data-slide-to="2" ></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active" image-center>
          <img class="app" src="Images\demo1.png">
          
        </div>
        
        <div class="carousel-item">
          <img class="app" src="Images\demo2.png">
          
        </div>
        <div class="carousel-item">
          <img class="app" src="Images\demo3.png">
        </div>
      </div>
    </div>

    <!---- jumbotron --->
    <section id = "about">
      <div class="container-fluid" >
        <div class="jumbotron bg-dark" >
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
            <p style="color:#d5d5d5">Declaration is a system designed to assist the CPS (Campus Protect Service) to declare electronic devices for
            students so that they won’t have challenges every time they enter the campus with their devices and also for protection for student’s 
            devices. To declare a device one will have to be a registered student with a particular institution and have a serial number for that 
            particular device which needs to be declared.</p>
          </div>
        </div>
      </div>
      <hr class="my-4">
    </section>
   
    <!---- FIxed background --->

    <figure>
      <div class="fixed-wrap">
        <div id="fixed">

        </div>
      </div>
    </figure>

    <!---- Meet the team --->

    <div class="container-fluid padding">
        <div class="col-12">
          <h1 class="display-4" style = "text-align: center;">Declare Your Stuff</h1>
          <hr>
        </div>
    </div>

    

    <!--- Cards --->

    <div class="container-fluid padding">
      <div class="row padding">
      <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="images/computer-education-png-7-300x200.png" >
            
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="images/computer-education-png-7-300x200.png" >
           
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="images/display one.png" >
          
          </div>
        </div>
      
      </div>
    </div>
    <div>
      <hr class="my-4">
    </div>
    <!--- Contact --->
  <section id = "contact">
    <div class="container-fluid padding">
        <div class="row text-center padding">
          <div class="col-12">
            <h2>Follow Us</h2>
          </div>
          <div class="col-12 social padding">
            <a href="#"> <i class="fab fa-facebook"></i> </a>
            <a href="#"> <i class="fab fa-twitter"></i> </a>
            <a href="#"> <i class="fab fa-google-plus-g"></i> </a>
            <a href="#"> <i class="fab fa-instagram"></i> </a>
            <a href="#"> <i class="fab fa-youtube"></i> </a>
          </div>
        </div>
      </div>
   </section>
   
  </body>
      <!--- footer --->
<footer>
    <div class="container-fluid padding">
      <div class="row text-center bg-dark">
        <div class="col-md-4">
          <hr class="light">
          <h5>Contact</h5>
          <hr class="light">
          <p>071 196 9659</p>
          <p>sremembrant@gmail.com</p>
          <p>Pretoria, Sunnyside, 153 Troye Street</p>
        </div>
        <div class="col-md-4">
          <hr class="light">
          <h5>Trading Hours</h5><hr class="light">
          <p>Monday to Friday: 8am - 5pm</p>
          <p>Saturday: 8am - 1pm</p>
          <p>Sunday: closed</p>
        </div>
        <div class="col-md-4">
          <hr class="light">
          <h5>Service Area</h5><hr class="light">
          <p>Pretoria</p>
          <p>Soshanguve</p>
          <p>Ga-Rankuwa</p>
          <p>Emalahleni</p>
          <p>Mbombela</p>
          <p>Polokwane</p>
        </div>
        <div class="col-12">
          <hr class="light-100">
          <h5>&copy; 2020 TUT - All Rights Reserved</h5>
        </div>
      </div>
    </div>
</footer>
</html>
