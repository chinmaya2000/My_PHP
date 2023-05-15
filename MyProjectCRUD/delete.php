<?php
include 'connection.php';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    
    $sql="delete from products where id=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
    ?>
    <script>
        alert("One row deleted");
        window.location="display.php";
        
    </script>
     <?php
     }

     else{
             echo mysqli_error($con);
         }
         
        }
    
     ?>   
