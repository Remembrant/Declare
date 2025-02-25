<?php
// Include database connection file
require_once "includes/connection.php";

session_start();
$student = $_SESSION['stud_num'];
if(isset($_SESSION['stud_num'])){

}
else
{
    echo "<script>location.href='./login.php'</script>";
}
  if(count($_POST)>0) {
  mysqli_query($conn,"UPDATE users set fullname ='" . $_POST['fullname'] . "' ,email='" . $_POST['email'] . "' ,phone='" . $_POST['phone'] . "',campus='" . $_POST['campus'] . "' WHERE stud_num='" . $_SESSION['stud_num']. "'");
  $_SESSION['success']="User Updated successfull!!!";
  header('Location: ./editProfile.php');
  //  echo "<script>alert('User Updated successfull!!! ');window.location='./editProfile.php'</script>";
   exit();
  }
    $result = mysqli_query($conn,"SELECT * FROM users WHERE stud_num='" . $_SESSION['stud_num'] . "'");
    $row= mysqli_fetch_array($result);
    

  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboardd.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <?php include "head.php"; ?>
  
</head>

<body class="user-profile"  >

  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a  class="simple-text logo-normal">
          Student Declaration
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./userdashboard.php">
              <i class="now-ui-icons design_app"></i>
              <p>Student Dashboard</p>
            </a>
          </li>
      
          <li class = "active">
            <a href="./editProfile.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          
          <li>
            <a href="./itemDeclare.php">
              <i class="now-ui-icons design-2_ruler-pencil"></i>
              <p>Declare Item</p>
            </a>
          </li>
          <li >
            <a href="./viewUserlostItems.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Lost Items Table List</p>
            </a>
          </li>
          <li>
            <a href="./viewUserItems.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Items Table List</p>
            </a>
          </li>
          <li>
            <a target="_blank" href="pdf.php?stud_num=<?php echo $student; ?>">
              <i class="now-ui-icons design-2_ruler-pencil"></i>
              <p>Print Declatation</p>
            </a>
          </li>
		  
        </ul>
      </div>
    </div>
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
            <a class="navbar-brand" href="#pablo">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <ul class="navbar-nav">
          <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="now-ui-icons users_single-02"></i><?php echo $_SESSION['stud_num']; ?>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#"><?php echo $_SESSION['fullname']; ?>
                  <a class="dropdown-item" href="./logout.php">Logout</a>
                </div>
              </li>
          </ul>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

              
                <?php  include "alert.php";?>


                <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Student Number</label>
                        <input type="text" readonly class="form-control" name="stud_num" placeholder="Enter Student Number" value="<?php echo $row["stud_num"]; ?>">
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Enter Full Names" value="<?php echo $row["fullname"]; ?>">
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email Address" value="<?php echo $row["email"]; ?>">
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" value="<?php echo $row["phone"]; ?>">
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <!-- <label>Campus</label>
                        <input type="text" class="form-control" name="campus" placeholder="Enter Campus" value="<?php echo $row["campus"]; ?>"> -->
                        <label>Campuses</label>
                         <select name="campus" id="campus" type="text" class="form-control" size="0.5" required>
                        <option value="">Current Campus is <?php echo $row["campus"]; ?></option>
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
				  
				<button type="Submit"  class="btn btn-secondary" name="update">Submit</button>
				
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/bg5.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                <br><br><br>
                  <a href="#">
                    <!-- <img class="avatar border-gray" src="#" alt="..."> -->
                    <h5 class="title"><?php echo $row["fullname"]; ?></h5>
                  </a>
                  <p class="description">
                  <?php echo $row["campus"]; ?>
                  </p>
                </div>
                <!--<p class="description text-center">
                  "Lamborghini Mercy <br>
                  Your chick she so thirsty <br>
                  I'm in that two seat Lambo"
                </p>-->
              </div>
              <hr>
              <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-instagram"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
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
