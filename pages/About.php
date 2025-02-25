<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
</head>
<body>
<button type="Submit" class="btn btn-dark btn-block" id = "log" name="signin-btn">Login</button>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../assets/js/sweetalert.min.js"></script>
<script type="text/javascript">

$(function(){
  $('#log').click(function(){
    swal("Good job!", "You clicked the button!", "success");
  })
})
</script>
</html>