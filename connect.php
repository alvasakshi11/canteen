<?php

$con=new mysqli('localhost','root','','canteen');


if(!$con){

    die(mysqli_error($con));
}
?> 