<?php
  require('includes/connection.php');
  session_start();
  if(isset($_SESSION['stud_num'])){
    
  }
  else
  {
      echo "<script>location.href='./login.php'</script>";
  }
  $student = $_SESSION['stud_num'];

  $query = "SELECT * FROM items WHERE stud_num = $student";

  $result = mysqli_query($conn,$query);

  /*$crud = mysqli_fetch_all($result);

  mysqli_free_result($result);

  mysqli_close($conn);*/
  
  $sql = "SELECT count(serial_num) AS counts FROM items WHERE stud_num = $student AND lost = 0";
  $item = mysqli_query($conn,$sql);
  $values =mysqli_fetch_assoc($item);
  $num=$values['counts'];

  $sql = "SELECT count(serial_num) AS counts FROM items WHERE stud_num = $student AND lost = 1";
  $item = mysqli_query($conn,$sql);
  $values =mysqli_fetch_assoc($item);
  $numlost=$values['counts'];
  


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    User Declaration Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboardd.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->

  <?php include "head.php"; ?>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="./dashboard.php" class="simple-text logo-normal">
          Student Declaration System
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./dashboard.php">
              <i class="now-ui-icons design_app"></i>
              <p>Admin Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./adminDeclareItem.php">
              <i class="now-ui-icons design-2_ruler-pencil"></i>
              <p>Declare Item</p>
            </a>
          </li>
          <li>
            <a href="viewUsers.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Users List</p>
            </a>
          </li>
          <li>
            <a href="viewItems.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Items List</p>
            </a>
          </li>
          <li >
            <a href="viewlostItems.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Lost Items List</p>
            </a>
          </li>
         
         
          <li >
            <a href="./status.php">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Pending Items</p>
            </a>
          </li>
          <li >
            <a href="./read.php">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Messages</p>
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
            <a class="navbar-brand" href="#pablo">Search</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form action = "./searchuser.php" method="get">
              <div class="input-group no-border">
                <input type="text" name = "search" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                <button type = "submit" value = "search"><i class="fa fa-search" aria-hidden="true"></i></button>

                  
                  </div>
                
              </div>
            </form>
            <ul class="navbar-nav">
            
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" >
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
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Search Results</h4>
              </div>
              <?php
                if(isset($_GET['search'])){
                    $search = mysqli_real_escape_string($conn,$_GET['search']);
                   
                    $result = mysqli_query($conn,"SELECT * 
                    FROM users 
                    WHERE fullname LIKE '%$search%' OR stud_num LIKE '%$search%'");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
              <div class="card-body">
              <?php  include "alert.php";?>

                <div class="table-responsive">
                  <table class="table">
                   <thead class=" text-primary">
                   <th>
                        No.
                      </th>
                      <th>
                        User Name
                      </th>
                      <th>
                       Student Number
                      </th>
                      <th>
                        Contact
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Campus
                      </th>
                    </thead>
                    <tbody>
                    <?php
                    $i=0;
                    $coun = 1;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $coun++."."; ?></td>
                        <td><?php echo $row["fullname"]; ?></td>
                        <td><?php echo $row["stud_num"]; ?></td>
                        <td><?php echo $row["phone"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["campus"]; ?></td>
                          </td>
                    </tr>
                    
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "<h6 class='card-title'> No result found matching your search</h6>";
                    }
                }
                    ?> 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
              <h4 class="card-title"> The lost items declared by a user to the system</h4>
                <p class="category"> As a user you can edit and update the details of your items</p>
              </div>
              <div class="card-body">
              </div>
            </div>
          </div> -->
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



  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>