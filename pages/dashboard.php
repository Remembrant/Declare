
<?php
  require('includes/connection.php');

  session_start();
  $student = $_SESSION['stud_num'];

  $query = "SELECT * FROM users WHERE usertype = 'user'";

  $result = mysqli_query($conn,$query);

  /*$crud = mysqli_fetch_all($result);

  mysqli_free_result($result);

  mysqli_close($conn);*/

  $sql = "SELECT count(serial_num) AS counts FROM items WHERE lost=0";
  $item = mysqli_query($conn,$sql);
  $values =mysqli_fetch_assoc($item);
  $num=$values['counts'];
  
  $sql = "SELECT count(serial_num) AS counts FROM items WHERE lost=1";
  $item = mysqli_query($conn,$sql);
  $values =mysqli_fetch_assoc($item);
  $lost=$values['counts'];

  $sql = "SELECT count(stud_num) AS total FROM users WHERE usertype = 'user'";
  $all = mysqli_query($conn,$sql);
  $values =mysqli_fetch_assoc($all);
  $num_rows=$values['total'];

  $sql = "SELECT count(message) AS msg FROM message WHERE status = 0";
  $item = mysqli_query($conn,$sql);
  $values =mysqli_fetch_assoc($item);
  $message=$values['msg'];

  $sql = "SELECT count(serial_num) AS statu FROM items WHERE read_mesg = 0";
  $item = mysqli_query($conn,$sql);
  $values =mysqli_fetch_assoc($item);
  $statu=$values['statu'];

  $sql = "SELECT count(status) AS approve FROM items WHERE status = 1";
  $all = mysqli_query($conn,$sql);
  $values =mysqli_fetch_assoc($all);
  $approve=$values['approve'];

  $sql = "SELECT count(status) AS decline FROM items WHERE status = 2";
  $item = mysqli_query($conn,$sql);
  $values =mysqli_fetch_assoc($item);
  $decline=$values['decline'];

  $sql = "SELECT count(status) AS pending FROM items WHERE status = 0";
  $item = mysqli_query($conn,$sql);
  $values =mysqli_fetch_assoc($item);
  $pending=$values['pending'];
////////////////////////////////////////////////////////////////
// $sql1 = "SELECT * FROM message WHERE status = 0";
                 
//   $result1 = $conn->query($sql1);
//   if ($result1->num_rows > 0) {
//     while($data=mysqli_fetch_assoc($result1)){
//       $msg = $data['message'];
//     }
//   }else{
//        $msg = "Sorry no messages";
//   }
 ////////////////////////////////////////////////////////////////////////
 if(isset($_SESSION['stud_num'])){

 }
 else
 {
     echo "<script>location.href='login.php'</script>";
 }
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Declaration Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboardd.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
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
          <li class="active ">
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
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#">Admin Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
          <form  action = "./searchi.php"   method="get">
              <div class="input-group no-border">
                <input type="text" name = "search" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                <button type = "submit" value = "search"><i class="fa fa-search" aria-hidden="true"></i></button>

                  
                  </div>
                
              </div>
            </form>
            <ul class="navbar-nav">
           
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                $answer = $message + $statu;
            if($answer==0){
              echo "<i class='now-ui-icons ui-1_bell-53' style='font-size:20px;color:white'></i><span class='badge  'style='font-size:15px;color:white'>$answer</span>";
    
            }
                      else{
                        echo "<i class='now-ui-icons ui-1_bell-53' style='font-size:20px;color:red'></i><span class='badge  'style='font-size:15px;color:red'>$answer</span>";
        
                      }
                  ?>
                <!-- <i class="now-ui-icons ui-1_bell-53" style='font-size:20px;color:red'></i><span class="badge  "style='font-size:15px;color:red'><?php echo $message; ?></span> -->
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                 
                    <?php
                    
                          $sql1 = "SELECT * FROM message WHERE status = 0";
                          $sql2 = "SELECT * FROM items WHERE read_mesg = 0";
                      
                          $result1 = $conn->query($sql1);
                          $result2 = $conn->query($sql2);
                          if ($result1->num_rows > 0 || $result2->num_rows > 0) {
                            while($data=mysqli_fetch_assoc($result1)){
                          
                              echo '<a class="dropdown-item text-danger" href="read.php?id='.$data['id'].'">This user '.$data['fullname'].' student number '.$data['stud_num'].' '.$data['message'].'</a>';
                            }
                            while($data1=mysqli_fetch_assoc($result2)){
                          
                              echo '<a class="dropdown-item text-success" href="status.php?itemId='.$data1['itemId'].'">This user  '.$data1['stud_num'].' just declared a new item </a>';
                            }
                          }else{
      
                            echo '<a class="dropdown-item text-success" href="#">Sorry! no new messages</a>';
                        }
                          
                        
                    
                    ?>
                </div>
              </li>
            

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['stud_num']; ?><i class="now-ui-icons users_single-02"></i>
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
       <!-- <canvas id="bigDashboardChart"></canvas>-->
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category" ></h5>
                <h4 class="card-title">All Registered Users</h4>
                
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <h1 ><?php echo $num_rows;?></h1>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category"></h5>
                <h4 class="card-title">All Registered Items</h4>
                
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <h1 ><?php echo $num;?></h1>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">The Number of Lost Items</h4>
              </div>
              <div class="card-body">
                <div class="chart-area">
                <h1 ><?php echo $lost;?></h1>
                </div>
              </div>
              <div class="card-footer">
              <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">The Number of Approved Items</h4>
              </div>
              <div class="card-body">
                <div class="chart-area">
                <h1 ><?php echo $approve;?></h1>
                </div>
              </div>
              <div class="card-footer">
              <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">The Number of Declined Items</h4>
              </div>
              <div class="card-body">
                <div class="chart-area">
                <h1 ><?php echo $decline;?></h1>
                </div>
              </div>
              <div class="card-footer">
              <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">The Number of Pending Items</h4>
              </div>
              <div class="card-body">
                <div class="chart-area">
                <h1 ><?php echo $pending;?></h1>
                </div>
              </div>
              <div class="card-footer">
              <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>

          
      
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">All Users List</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                      Student Number
                      </th>
                      <th>
                      User Name
                      </th>
                    </thead>
                    <tbody>
                    <?php
                       while($row=mysqli_fetch_assoc($result))
                       {
                      ?>
                      <tr>
                        <td>
                        <?php echo $row['stud_num'];?>
                        </td>
                        <td>
                        <?php echo $row['fullname'];?>
                        </td>
                        
                       </tr>
                       <?php
                       }
                       ?>
                    </tbody>
                  </table>
                </div>
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
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>