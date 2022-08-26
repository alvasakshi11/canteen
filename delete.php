
<?php  
   include 'connect.php';
   if(isset($_GET['deleteid'])){
       $canteen_id=$_GET['deleteid'];



       $sql="DELETE FROM canteen WHERE canteen_id='$canteen_id'";
       $result=mysqli_query($con,$sql);
       if($result){
        header('location:display.php');
       }
    }
       ?>