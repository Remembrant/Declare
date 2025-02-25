<?php

require('./connection.php');

    if(isset($_GET['search'])){
        $search = mysqli_real_escape_string($conn,$_GET['search']);
       
        $sql = "SELECT * 
        FROM items 
        WHERE serial_num LIKE '%$search%'";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_num_rows($result);

        ?>
        <div class = "reult-count">
            Found <?php echo $data; ?> results.
        </div>
        
        <?php
       
        if($data>0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "<h5 class = card card-chart>
            <td>".$row['serial_num']."</td>
            <td>".$row['item_nam']."</td>
            </h5>";
        }
        }else{
        echo "There are no results matching your search";
        }
    }

                    
 ?>