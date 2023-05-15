<?php
$SERVER = "localhost";
$con=mysqli_connect("localhost","root","","product");
if(!$con)
{
    die(mysqli_error($con));
}

?>