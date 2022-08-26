
<?php  
   include 'connect.php';
   if(isset($_GET['deleteid'])){
       $food_name=$_GET['deleteid'];



       $sql="DELETE FROM food WHERE food_name='$food_name'";
       $result=mysqli_query($con,$sql);
       if($result){
        header('location:fdisplay.php');
       }
    }
       ?>