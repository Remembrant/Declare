<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Register User
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/register.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
  <!-- <link href="./r.css" rel="stylesheet" /> -->


  <?php include "head.php"; ?>
</head>

<style>
/* Style all input fields */
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  
}

/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
}

/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
  
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

#lblName,
#lblEmail,
#lblCellNO,
#lblCpass,
#lblStudentNumber{
  display:none;
  background: #f1f1f1;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}
/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>

<body class="user-profile"  >

    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo" style = "text-aligin"><h2>Registration</h2></a>
            
          </div>
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <i class="fa fa-home"></i>
                  
                </a>Home
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="title">User Registration</h5>
              </div>
              <div class="card-body">
                <form action="includes/registerdb.php" method="post" style="margin-left:200">

                  <div class="row">
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Student Number</label>
                        <input type="text" class="form-control" name="stud_num" id="studentNumber"  onkeyup="validateStudentNumber()" placeholder="Enter Student Number" value=""  required>
                        <label id="lblStudentNumber"></label>
                        
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="fullname" id="name" onkeyup="validateName()" placeholder="Enter Full Names" value="" required>
                        <label id="lblName"></label>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" onkeyup="validateEmail()" placeholder="Enter Email Address" value="" required>
                        <label id="lblEmail"></label>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone" id="cellNO" onkeyup="validateCellNO()" placeholder="Enter Phone Number" value="" required>
                        <label id="lblCellNO"></label>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Campuses</label>
                         <select name="campus" id="campus" type="text" class="form-control" size="0.5" required>
                        <option value="">Select Campus</option>
                        <option value="Soshanguve South Campus">Soshanguve South Campus</option>
                        <option value="Soshanguve North Campus">Soshanguve North Campus</option>
                        <option value="Pretoria Campus">Pretoria Campus</option>
                        <option value="Ga-Rankuwa Campus">Ga-Rankuwa Campus</option>
                        <option value="Mbombela Campus">Mbombela Campus</option>
                        <option value="eMalahleni Campus">eMalahleni Campus</option>
                        <option value="Polokwane Campus">Polokwane Campus</option>
                        <option value="Arts Campus">Arts Campus</option>
                        <option value="Arcadia Campus">Arcadia Campus</option>
                        </select>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="uPass" id="uPass" onkeyup="validatePass()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter your Password" value=""  required>
                      </div>
                    </div>
                    </div>

                    <div id="message">
							<h3>Password must contain the following:</h3>
							<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
							<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
							<p id="number" class="invalid">A <b>number</b></p>
							<p id="length" class="invalid">Minimum <b>8 characters</b></p>
							</div>

                  <div class="row">
					          <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="cPass" id="cPass" onkeyup="validatePasswordMatch()" placeholder="Confirm Password" value="" required>
                        <label id="lblCpass"></label>
                      </div>
                    </div>
                 </div>
                
                 <input type="hidden" name="usertype" value = "user">
				  
             
				  
				<button type="Submit" class="btn btn-secondary" name="signup-btn">Submit</button>

        <div class="form-group">
                  
                  Click <a href="./login.php">here</a> if you already have an account
                </div>
				
                </form>
              </div>
            </div>
          </div>
         
        </div>
      </div>
     
    </div>
  <!-- </div> -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/validations.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>


<script type="text/javascript">
var myInput = document.getElementById("uPass"); 
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

 // When the user clicks on the password field, show the message box
 document.getElementById("studentNumber").onfocus = function() {
      document.getElementById("lblStudentNumber").style.display = "block";
  }

  // When the user clicks outside of the password field, hide the message box
  document.getElementById("studentNumber").onblur = function() {
      document.getElementById("lblStudentNumber").style.display = "none";
  }

  // When the user clicks on the password field, show the message box
 document.getElementById("name").onfocus = function() {
      document.getElementById("lblName").style.display = "block";
  }

  // When the user clicks outside of the password field, hide the message box
  document.getElementById("name").onblur = function() {
      document.getElementById("lblName").style.display = "none";
  }

    // When the user clicks on the password field, show the message box
 document.getElementById("email").onfocus = function() {
      document.getElementById("lblEmail").style.display = "block";
  }

  // When the user clicks outside of the password field, hide the message box
  document.getElementById("email").onblur = function() {
      document.getElementById("lblEmail").style.display = "none";
  }

  // When the user clicks on the password field, show the message box
 document.getElementById("cellNO").onfocus = function() {
      document.getElementById("lblCellNO").style.display = "block";
  }

  // When the user clicks outside of the password field, hide the message box
  document.getElementById("cellNO").onblur = function() {
      document.getElementById("lblCellNO").style.display = "none";
  }

   // When the user clicks on the password field, show the message box
 document.getElementById("cPass").onfocus = function() {
      document.getElementById("lblCpass").style.display = "block";
  }

  // When the user clicks outside of the password field, hide the message box
  document.getElementById("cPass").onblur = function() {
      document.getElementById("lblCpass").style.display = "none";
  }


// When the user clicks on the password field, show the message box
document.getElementById("uPass").onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

</script>