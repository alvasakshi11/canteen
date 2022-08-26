
<?php
   include 'connect.php';
       $canteen_id=$_GET['updateid'];
       $sql="SELECT * FROM canteen WHERE canteen_id=$canteen_id";
       $result=mysqli_query($con,$sql);
       $row=mysqli_fetch_assoc($result);
       $canteen_name=$row['canteen_name'];
       $location=$row['location'];
     



   if(isset($_POST['submit'])){
     $canteen_name=$_POST['canteen_name'];
     $location=$_POST['location'];
    

     $sql="UPDATE `canteen` SET `canteen_name`='$canteen_name',`location`='$location' WHERE `canteen_id`=$canteen_id";
     $result=mysqli_query($con,$sql);
     if($result)
     { 
        // echo "updated successfully";
      header('location:display.php');
     }
     else{
      die(mysqli_error($con));

         }
    }




?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>CANTEEN MANAGEMENENT</title>
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
    <div class="container my-5">
     <form method="post">
  <div class="form-group">
    <label>canteen name</label>
    <input type="text" class="form-control" 
     placeholder="Enter canteen_name " name="canteen_name" autocomplete="off" 
     value=<?php echo "$canteen_name";?>>
</div>

<div class="form-group">
    <label>location</label>
    <input type="text" class="form-control" 
     placeholder="Enter your location" name='location' autocomplete="off" 
     value=<?php echo $location;?>>
</div>


 
  <button type="submit" class="btn btn-primary" name="submit">Update</button>


  </form>
      </div>  
    </section>
    </div>
</body>
</html>