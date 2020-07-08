<?php
include "connect.php"; 
session_start();
if(isset($_SESSION["useraut"])&&($_SESSION["useraut"]==1)) {
$sql="SELECT * FROM glass";
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
    <form action="manageproductfunc.php" enctype="multipart/form-data" method="POST">
        <button style="margin-left:35%;margin-bottom:2%;margin-top:2%;height:30px;width:70px"name="add" type="submit"><i class="fas fa-plus"></i></button>
        <button style="height:30px;width:70px" name="delete" type="submit"><i class="far fa-minus-square"></i></button>
        <button style="height:30px;width:70px" name="edit" type="submit"><i class="fas fa-edit"></i> </button>
        <input type="hidden" value="100000000" name="MAX_FILE_SIZE">
        <hr> 
        <br>
        <input type="file" name="uploaded">
        <input type="submit" name="loadimg" value="Upload Product Image">
        <input type="submit" name="loadicon" value="Upload Product Icon">

        <hr> 
        <br>

        <input type="text" name="search" placeholder="Model Id"  style=" margin:3px;height:30px; text-align:center"  > 
    <input  type="text"name="gender"  placeholder="Gender" style=" margin:3px; height:30px;text-align:center">
    <input type="text"name="quantity"  placeholder="Quantity" style=" margin:3px;height:30px; text-align:center">  
    <input type="text"name="fhape"  placeholder="Frame Shape" style="  margin:3px;height:30px;text-align:center">  
    <input type="text"name="fmat"  placeholder="Frame Material" style="margin:3px; height:30px; text-align:center">  
    <input type="text"name="fcol"  placeholder="Frame Color" style=" margin:3px; height:30px;text-align:center">

    <input type="text" name="gmat" placeholder="Glass Material" style="margin:3px; height:30px; text-align:center">  
    <input type="text"name="mm"  placeholder="Model Number" style="margin:3px; height:30px; text-align:center">  
    <input type="text"name="price"  placeholder="Price" style=" margin:3px;height:30px; text-align:center">  
    <input type="text"name="brand"  placeholder="Brand"  style=" margin:3px; height:30px;text-align:center"> 
    <input type="text" name="prodiv" placeholder="Product Division" style=" margin:3px;height:30px; text-align:center">
       <label style="font-family: Montserrat" for="color">Color Code</label>
        <input id="color" value="#ff0000" type="color" name="fcolcode" placeholder="Frame Color Code" style=" margin:3px;height:30px; text-align:center">

        <hr>
    </form>

<div style="float:left">
    <table class="content-table">
    <thead>

<tr  >
    <th   style=" text-align:center"  >Model Id</th>
    <th  style=" text-align:center">Gender</th>
    <th  style=" text-align:center">Quantity </th>
    <th  style=" text-align:center">Frame Shape </th>
    <th  style=" text-align:center">Frame Material </th>
    <th  style=" text-align:center">Glass Material </th>
    <th  style=" text-align:center">Model Number </th>
    <th  style=" text-align:center">Price </th>
    <th  style=" text-align:center">Brand</th>
    <th  style=" text-align:center">Product Division</th>
    <th  style=" text-align:center">Frame Color</th>

</tr>  </thead>
    <tbody>

    <?php 
while($row1=mysqli_fetch_assoc($result)){
   
    echo '
    <tr >
    <td style="text-align:center">'.$row1["Id"].'</td>
    <td style="text-align:center">'.$row1["Gender"].'</td>
    <td style=" text-align:center"> '.$row1["Quantity"].'</td>
    <td style=" text-align:center">'.$row1["Frameshape"].'</td>
    <td style=" text-align:center">'.$row1["Framematerial"].'</td>
    <td style=" text-align:center">'.$row1["Glassmaterial"].'</td>
    <td style=" text-align:center">'.$row1["ModelNumber"].'</td>
    <td style=" text-align:center">'.$row1["Price"].'</td>
    <td style=" text-align:center">'.$row1["Brand"].'</td>
    <td style=" text-align:center">'.$row1["ProductDiv"].'</td>
    <td style=" text-align:center">'.$row1["Framecolor"].'</td>

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