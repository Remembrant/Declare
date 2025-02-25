<?php

session_start();
require('includes/connection.php');
 $sql = "SELECT count(message) AS msg FROM message WHERE status = 0";
 $item = mysqli_query($conn,$sql);
 $values =mysqli_fetch_assoc($item);
 $message=$values['msg'];

 $sql = "SELECT count(serial_num) AS statu FROM items WHERE read_mesg = 0";
 $item = mysqli_query($conn,$sql);
 $values =mysqli_fetch_assoc($item);
 $statu=$values['statu'];

$student = $_SESSION['stud_num'];
 if(isset($_SESSION['stud_num'])){

 }
 else
 {
     echo "<script>location.href='./login.php'</script>";
 }

?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Declare Item 
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

<body class="user-profile"  >

  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a  class="simple-text logo-normal">
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
          <li class = "active">
            <a href="./adminDeclareItem.php">
              <i class="now-ui-icons design-2_ruler-pencil"></i>
              <p>Declare Item</p>
            </a>
          </li>
          <li >
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
            <a class="navbar-brand" href="#pablo">Declare Item</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
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
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#"><?php echo $_SESSION['stud_num']; ?>
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
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Declare Item</h5>
              </div>
              <div class="card-body">
              <?php  include "alert.php";?>
                <form action="includes/adminDeclaredb.php" method="post" style="margin-left:200" enctype="multipart/form-data">
                  

                <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Student Number</label>
                        <input type="number" class="form-control" name="stud_num" placeholder="e.g 215734738" value="" required>
                      </div>
                    </div>
                 </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Serial Number</label>
                        <input type="text" class="form-control" name="serial_num" placeholder="e.g S45DS551STEWDC" value="" required>
                      </div>
                    </div>
                 </div>
				  
				  
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Name of Item</label>
                        <input type="text" class="form-control" name="item_nam" placeholder="e.g laptop Dell" value="" required>
                      </div>
                    </div>
                  </div>
                    
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                       <label>Status</label>
                         <select name="status" type="text" class="form-control" placeholder="Select Status" size="0.5" required>
                  
                         <option value="0">Pending</option>
                        <option value="1">Approve</option>
                        <option value="2">Decline</option>
                        </select>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                       <label>Lost or Not Lost</label>
                         <select name="lost" type="text" class="form-control" placeholder="Select Statu" size="0.5" required>
                        
                         <option value="0">Not lost</option>
                        <option value="1">Lost</option>
                        
                        </select>
                      </div>
                    </div>
                    </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Item Description</label>
                        <textarea rows="4" cols="80" class="form-control" name="description" placeholder="Here can be your description" value="text" required></textarea>
                      </div>
                    </div>
                  </div>

                    <div class="row">
                  <div class="col-md-6">
                  <label>Upload file</label>
                  
                  <input type="file" class="btn btn-light"  name="file"  required>
                 
                  </div>
                  </div>
              
                 <input type="hidden" name="role" value = "1">
                 <input type="hidden" name="read_mesg" value = "1">
				  
				<button type="Submit" class="btn btn-secondary" name="submit">Submit</button>
				
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
      <br><br>
      <h3>Upload the supporting document</h3>
      <p>
      You can upload a slip that you recieved when you were buying your item or provide an affidavite if u don't have the slip, in case your item was given to you by your relatives, they'll have to do an affidavit stating that they're the rightful owners of the item, they're now handing the item to you and they must also state the serial number of the item. This documents are going to be a proof that the item you are declaring belong to you. </p>
      <ul>
      <li>Upload a slip</li>
      <li>Or Upload an affidavit</li>
      </ul>
      <i class="fa fa-file-pdf" style="font-size:300px;"></i>
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


