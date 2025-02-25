<?php
 session_start();
 $student = $_SESSION['stud_num'];
 if(isset($_SESSION['stud_num'])){
  
 }
 else
 {
     echo "<script>location.href='./login.php'</script>";
 }
require "./fpdf/fpdf.php";

include_once 'includes/connection.php';


if(isset($_GET['stud_num'])){


class PDF extends FPDF{
    function header(){
        $this->Image('./Images/logo.png',5,3);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'Declaration',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        if(isset($_SESSION['stud_num'])||$_SESSION['fullname']){
            $stud = $_SESSION['stud_num'];
            $name = $_SESSION['fullname'];
            $this->Cell(276,10,'Student Declaration Report for '.$name.' ',0,0,'C');
            $this->Ln();
            $this->Cell(276,5,'Student number '.$stud.' ',0,0,'C');
        }
        $this->Ln(20);
        $this->Ln();
        $this->Ln();
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
   
    }
    function headerTable(){
       
        $this->SetFont('Times','B',12);
       
        $this->Cell(10,10,'No.',1,0,'C');
        $this->Cell(30,10,'Item Name',1,0,'C');
        $this->Cell(70,10,'Description',1,0,'C');
        $this->Cell(60,10,'Serial Number',1,0,'C');
        $this->Cell(60,10,'Status',1,0,'C');
        $this->Cell(40,10,'Date Declared',1,0,'C');
        $this->Ln();
    }
    function viewTable($conn){
        if(isset($_GET['stud_num'])){
            $stud = $_GET['stud_num'];
            $coun = 1;
            $this->SetFont('Times','',12);
            $result = mysqli_query($conn,"SELECT * FROM items WHERE status != 2 AND lost = 0 AND stud_num = $stud");
            if (mysqli_num_rows($result) > 0) {

                while($data = mysqli_fetch_array($result)) {
                    $date = $data['date'];
                    $date = strtotime($date);
                    $date = date('M d Y',$date);
                    

                    $this->Cell(10,10,$coun++.".",1,0,'C');
                    $this->Cell(30,10,$data['item_nam'],1,0,'C');
                    $this->Cell(70,10,$data['description'],1,0,'C');
                    $this->Cell(60,10,$data['serial_num'],1,0,'C');
                    if ($data['status'] == 1) $this->Cell(60,10,"Approvrd",1,0,'C'); elseif ($data['status'] == 0) $this->Cell(60,10,"Pending",1,0,'C');
                    $this->Cell(40,10,$date,1,0,'C');
                    $this->Ln();
                }
            }else{
                $this->Cell(265,10,'No result found',1,0,'C');
            }
        }
    }
    function signture(){
        $this->SetFont('Arial','B',14);
        $this->Ln();
        $this->Ln();
       
        $this->Cell(276,5,'Signture_______________________________________________',0,0,'C');
        
    }

}
}elseif(isset($_GET['itemId'])){
    class PDF extends FPDF{
        function header(){
            $this->Image('./Images/logo.png',5,3);
            $this->SetFont('Arial','B',14);
            $this->Cell(276,5,'Declaration',0,0,'C');
            $this->Ln();
            $this->SetFont('Times','',12);
           
            if(isset($_SESSION['stud_num'])||$_SESSION['fullname']){
                $stud = $_SESSION['stud_num'];
                $name = $_SESSION['fullname'];
                $this->Cell(276,10,'Student Declaration Report for '.$name.' ',0,0,'C');
                $this->Ln();
                $this->Cell(276,5,'Student number '.$stud.' ',0,0,'C');
            }
            $this->Ln(20);
            $this->Ln();
            $this->Ln();
        }
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
       
        }
        function headerTable(){
           
            $this->SetFont('Times','B',12);
           
            $this->Cell(10,10,'No.',1,0,'C');
            $this->Cell(30,10,'Item Name',1,0,'C');
            $this->Cell(70,10,'Description',1,0,'C');
            $this->Cell(60,10,'Serial Number',1,0,'C');
            $this->Cell(60,10,'Status',1,0,'C');
            $this->Cell(40,10,'Date Declared',1,0,'C');
            $this->Ln();
        }
        function viewTable($conn){
            if(isset($_GET['itemId'])){
                $itemId = $_GET['itemId'];
                $coun = 1;
                $this->SetFont('Times','',12);
                $result = mysqli_query($conn,"SELECT * FROM items WHERE lost = 0 AND itemId = '$itemId'");
                if (mysqli_num_rows($result) > 0) {
    
                    while($data = mysqli_fetch_array($result)) {
                        $date = $data['date'];
                        $date = strtotime($date);
                        $date = date('M d Y',$date);
                        

                        $this->Cell(10,10,$coun++.".",1,0,'C');
                        $this->Cell(30,10,$data['item_nam'],1,0,'C');
                        $this->Cell(70,10,$data['description'],1,0,'C');
                        $this->Cell(60,10,$data['serial_num'],1,0,'C');
                        if ($data['status'] == 1) $this->Cell(60,10,"Approvrd",1,0,'C'); elseif ($data['status'] == 0) $this->Cell(60,10,"Pending",1,0,'C'); elseif ($data['status'] == 2) $this->Cell(60,10,"Decline",1,0,'C');
                        $this->Cell(40,10,$date,1,0,'C');
                        $this->Ln();
                    }

                        
                    
                }else{
                    $this->Cell(265,10,'No result found',1,0,'C');
                }
            }
        }
        function signture(){
            $this->SetFont('Arial','B',14);
            $this->Ln();
            $this->Ln();
           
            $this->Cell(276,5,'Signture_______________________________________________',0,0,'C');
            
        }
    
    }

}
 
$pdf =  new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($conn);
$pdf->signture();
$pdf->Output();
 