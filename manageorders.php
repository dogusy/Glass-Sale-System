<?php
include "connect.php"; 
session_start();
if(isset($_SESSION["useraut"])&&($_SESSION["useraut"]==1)) {
$sql="SELECT * FROM orders";
$result=mysqli_query($baglan,$sql);

?>
<head>
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<div class="adminpanel">
    <div class="logincontainerlogo">
    <h1> <a href="index.php" style="color:white;font-weight: 200;">MAIN<span style="color:orange;font-weight: 600;">PAGE</span> </a></h1>

    </div>
<div class="leftside">

<ul>
    <li><a href="manageproducts.php">Manage Products</a></li>
    <li><a href="managemembers.php">Manage Members</a></li>
    <li><a href="manageorders.php">Manage Orders</a></li>
    <li><a href="adminmanual.php">Admin Manual</a></li>

</ul>

</div>


<div class="admincontents">
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "invalidid")
            echo ' <h4 class="errorinfo" style="word-wrap: break-word;text-align: center; margin:auto ;width:100px">Invalid Id</h4>';
        if ($_GET["error"] == "missingtext")
            echo ' <h4 class="errorinfo" style="word-wrap: break-word;text-align: center; margin:auto ;width:100px">Please fill form correctly</h4>';
        if ($_GET["error"] == "noproduct")
            echo ' <h4 class="errorinfo" style="word-wrap: break-word;text-align: center; margin:auto ;width:100px">Please enter correct product Id</h4>';
        }
    if (isset($_GET["deleted"]))
        echo ' <h4 class="succinfo" style="word-wrap: break-word;text-align: center; margin:auto ;width:100px">Deleted</h4>';
    if (isset($_GET["success"]))
        echo ' <h4 class="succinfo" style="word-wrap: break-word;text-align: center; margin:auto ;width:100px">Updated</h4>';

    ?>
    <form action="manageordersfunc.php" method="POST">
        <button style="margin-left:35%;margin-bottom:2%;margin-top:2%;height:30px;width:70px" name="edit" type="submit"><i class="fas fa-edit"></i> </button>
        <button style="height:30px;width:70px" name="delete" type="submit"><i class="far fa-minus-square"></i></button>

        <hr> 
        <br>
        <input type="text" name="search" placeholder="Order Id"  style=" margin:3px;height:30px; text-align:center"  > 
    <input  type="text"name="brand"  placeholder="Brand" style=" margin:3px; height:30px;text-align:center">
    <input type="text"name="mm"  placeholder="Model Number" style=" margin:3px;height:30px; text-align:center">  
    <input type="text"name="pi"  placeholder="Product Id"  style=" margin:3px; height:30px;text-align:center"> 
    <input type="text"name="qua"  placeholder="Quantity" style="  margin:3px;height:30px;text-align:center">  
    <input type="text"name="ui"  placeholder="User Id" style="margin:3px; height:30px; text-align:center">  
    <input type="text"name="name"  placeholder="Name" style=" margin:3px; height:30px;text-align:center">  
    <input type="text" name="lname" placeholder="Lastname" style="margin:3px; height:30px; text-align:center">  
    <input type="text"name="email"  placeholder="Email" style="margin:3px; height:30px; text-align:center">  
    <input type="text"name="address"  placeholder="Address" style=" margin:3px;height:30px; text-align:center">  

    <hr>
    </form>

<div style="float:left">
    <table class="content-table">
    <thead>

<tr  >
    <th   style=" text-align:center"  >Order Id</th>
    <th  style=" text-align:center">Brand</th>
    <th  style=" text-align:center">Model Number </th>
    <th  style=" text-align:center">Product Id </th>
    <th  style=" text-align:center">Quantity </th>
    <th  style=" text-align:center">User Id </th>
    <th  style=" text-align:center">Name </th>
    <th  style=" text-align:center">Lastname </th>
    <th  style=" text-align:center">Email</th>
    <th  style=" text-align:center">Address</th>
    </tr>  </thead>
    <tbody>

    <?php 
while($row1=mysqli_fetch_assoc($result)){
   
    echo '
    <tr >
    <td style="text-align:center">'.$row1["Idorder"].'</td>
    <td style="text-align:center">'.$row1["Brand"].'</td>
    <td style=" text-align:center"> '.$row1["Modelnumber"].'</td>
    <td style=" text-align:center">'.$row1["ProductID"].'</td>
    <td style=" text-align:center">'.$row1["Quantity"].'</td>
    <td style=" text-align:center">'.$row1["Userid"].'</td>
    <td style=" text-align:center">'.$row1["Namee"].'</td>
    <td style=" text-align:center">'.$row1["Lastname"].'</td>
    <td style=" text-align:center">'.$row1["Email"].'</td>
    <td style=" text-align:center">'.$row1["Addres"].'</td>

    </tr>
    ';
}
?> 
  <tbody>

</table> 
</div>

</div>

</div>

<?php } ?>
