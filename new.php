<?php
include 'connect.php';
?>

 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANTEEN MANAGEMENT SYSTEM</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
  input[type=submit]:hover {
    background-color: #45a049;
  }

  input[type=text], select, textarea {
    width: 100%; 
    padding: 12px; 
    border: 1px solid #ccc; 
    border-radius: 4px; 
    box-sizing: border-box; 
    margin-top: 6px; 
    margin-bottom: 16px; 
    resize: vertical 
  }

  #grad1 {
    height: 1000px;
  background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
  font-family: cursive;
}
.btn-info {
    color: #fff;
    background-color: #3c0af1;
    border-color: #070024;
}


.sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
        
        .sidenav a:hover {
            color: #f1f1f1;
        }
        
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        
        #main {
            transition: margin-left .5s;
            padding: 16px;
        }
        
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }
            .sidenav a {
                font-size: 18px;
            }
        }

</style>
</head>

    <body>
      <div id="grad1">
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="b.php">CANTEEN</a>
        <a href="c.php">EMPLOYEE</a>
        <a href="e.php">CUSTOMER</a>
        <a href="d.php">FOOD</a>
        <a href="f.php">ORDER</a>
    </div>
    
    <div id="main">
    
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
    </div>
    
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }
    
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
</head>
<body>
 <div class="container">

 <tb>
            


     <table class="table table-info">
  <thead>
    <tr>
      <th scope="col">customer_id</th>
      <th scope="col">customer_name</th>
      <th scope="col">food_name</th>
      <th scope="col">price</th>
     <th scope="col">quantity</th>
     <th scope="col">total_cost</th>
     
     
    </tr>
  </thead>
  <tbody>

<?php
$customer_id=$_GET['newid'];

 $sql="SELECT * FROM customer,orders,food WHERE orders.customer_id =customer.customer_id AND orders.customer_id =$customer_id AND food.food_name=orders.food_name";
 $sum = 0;
 $result=mysqli_query($con,$sql);
 if($result){
     while($row=mysqli_fetch_assoc($result)) {
             $customer_id=$row['customer_id'];
             $customer_name=$row['customer_name'];
             $food_name=$row['food_name'];
             $price=$row['price'];
             $quantity=$row['quantity'];
             $total_cost= ($row["price"] * $row["quantity"]);   
             $sum = $sum + $total_cost;     
            
            echo '<tr>
            <th scope="row">'.$customer_id.'</th>
            <td>'.$customer_name.'</td>
            <td>'.$food_name.'</td>
            <td>'.$price.'</td>
            <td>'.$quantity.'</td>
            <td>'.$total_cost.'</td>
           
            <td>
            <button onclick="window.print()"  class="btn btn-danger">Print</button>
            
            </td>';
     }

    echo '</tr>';
    echo ' <tr>';
    echo    '<td colspan="5"></td>';
    echo    '<td>'."Total:" .$sum . '</td>';
    echo '</tr>';
     }
     

?>

</tbody>
</table>
</div>   
</body>
</html> 

