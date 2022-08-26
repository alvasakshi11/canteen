
<?php  
   include 'connect.php';
   if(isset($_GET['deleteid'])){
       $employee_id=$_GET['deleteid'];



       $sql="DELETE FROM employee WHERE employee_id='$employee_id'";
       $result=mysqli_query($con,$sql);
       if($result){
        header('location:edisplay.php');
       }
    }
       ?>