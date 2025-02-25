
<?php
 include_once 'includes/connection.php';
 session_start();
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
    User View Items
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
  <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="./dashboard.php" class="simple-text logo-normal">
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
          <li>
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
          <li class = "active">
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
            <a class="navbar-brand" href="#pablo">Declared Items</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
          <form action = "./searchuserd.php" method="get">
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
                <?php echo $_SESSION['stud_num']; ?><i class="now-ui-icons users_single-02"></i>
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
                <h4 class="card-title"> Declared items</h4>
              </div>
              <?php
                   
                    $result = mysqli_query($conn,"SELECT * FROM items WHERE stud_num = $student AND lost = 0");
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
                       Serial Number
                      </th>
                      <th>
                        Item Name
                      </th>
                      <th>
                        Description
                      </th>
                    
                      <th>
                        Student Number
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Proof
                      </th>
                      <th>
                        Print PDF
                      </th>
                      <th>
                        Edit
                      </th>
                      <th>
                        Delete
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
                        <td><?php echo $row["serial_num"]; ?></td>
                        <td><?php echo $row["item_nam"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>
                        <td><?php echo $row["stud_num"]; ?></td>
                        <td><?php if($row["status"]==0)echo "Pending"; elseif($row["status"]==1) echo "Approved"; elseif($row["status"]==2) echo "Declined";?></td>
                        <td><a target="_blank" href="./uploads/<?php echo $row["file"]; ?>" title='Print PDF'><?php echo $row["file"]; ?></a></td>
                        <?php if ($row["status"]==2){
                        echo
                         '<td>
                          <button disabled class ="btn btn-success">
                          <a target="_blank" href="pdf.php?itemId='.$row["itemId"].'" title="Print PDF" style="color:white">Print PDF</a>
                          </button>
                          </td>';}else{
                          echo
                        '<td>
                          <a target="_blank" href="pdf.php?itemId='.$row["itemId"].'" title="Print PDF" style="color:white">
                          <button class ="btn btn-success">Print PDF</button>
                          </a>
                          </td>';}
                        ?>

                        <td><a href="includes/updateItemdb.php?itemId=<?php echo $row["itemId"]; ?>" title='Update Record'><button class = "btn btn-success">Edit</button></a></td>
                        <td><input type="button" class = "btn btn-danger" onClick="delet(<?php echo $row["itemId"];  ?>)" name = "delete" value="delete"></td>
                    </tr>
                    <script language ="javascript">
                    function delet(delid){
                      if(confirm("Are You Sure Want To Detele This Item !!!")){
                        window.location.href='includes/deleteItemdb.php?del_id=' +delid+'';
                        return true;
                      }
                    }
                    </script>
                    <?php
                    $i++;
                    }
                    ?>

                    </table>
                     <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?> 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
              <h4 class="card-title"> The items declared by a user to the system</h4>
                <p class="category"> As a user you can edit and update the details of your items</p>
              </div>
              <div class="card-body">
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="#">
                  Declaration
                </a>
              </li>
              <li>
                <a href="#">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  contact
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
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