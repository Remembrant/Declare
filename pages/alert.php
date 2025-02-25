<?php 

if(isset($_SESSION['success'])&&isset($_SESSION['success'])!=''){
    
echo '<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$_SESSION['success'].'</div>';
unset($_SESSION['success']);
}
    
if(isset($_SESSION['status'])&&isset($_SESSION['status'])!=''){
    
echo '<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$_SESSION['status'].'</div>';
unset($_SESSION['status']);
}

?>

