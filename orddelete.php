
<?php  
   include 'connect.php';
   if(isset($_GET['deleteid'])){
       $customer_id=$_GET['deleteid'];



       $sql="DELETE FROM orders WHERE customer_id='$customer_id'";
       $result=mysqli_query($con,$sql);
       if($result){
        header('location:orddisplay.php');
       }
    }
       ?>