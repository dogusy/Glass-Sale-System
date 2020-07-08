<?php 
include "header.php"; 
include "connect.php"; 
if(isset($_SESSION["userid"])) {
$uid=$_SESSION["userid"];
$sql="SELECT * FROM members WHERE Iduser=".$uid;
$sqlorder="SELECT * FROM orders WHERE Userid=".$uid;
$resultorder=mysqli_query($baglan,$sqlorder);
$result=mysqli_query($baglan,$sql);
$row=mysqli_fetch_assoc($result);
?>

<div class="myprofilcontainer">




<div class="myprofilinfo" >
     <h3  >Name : <?php echo $row["Namee"]  ?></h3>
    
    <h3 >Lastname : <?php echo $row["Lastname"]  ?></h3>
    <h3  >Address : <?php echo $row["Addresss"]  ?></h3>
    <h3 >Email : <?php echo $row["Email"]  ?></h3>
    <h3 >Username : <?php echo $row["Username"]  ?></h3>

</div>
<div class="myprofilorderinfo" >
<table style="width:100%" >
    <tr  style="border: 1px solid black;">
    <th   style="border: 1px solid black; text-align:center"  >Order Number</th>
        <th  style="border: 1px solid black; text-align:center">Brand</th>
        <th  style="border: 1px solid black; text-align:center">Model Number</th>
        <th  style="border: 1px solid black; text-align:center">Quantity </th>
        <th  style="border: 1px solid black; text-align:center">Price </th>
    </tr>
<?php
$sum=0;
while($row1=mysqli_fetch_assoc($resultorder)){
    $sqlglass="SELECT Price FROM glass WHERE ModelNumber=".$row1["Modelnumber"];
    $resultglass=mysqli_query($baglan,$sqlglass);
    $row2=mysqli_fetch_assoc($resultglass);
   $sum +=$row2["Price"]*$row1["Quantity"];
    echo '
    <tr>
    <td>'.$row1["Idorder"].'</td>
<td>'.$row1["Brand"].'</td>
<td>'.$row1["Modelnumber"].'</td>
<td>'.$row1["Quantity"].'</td>
<td>'.$row2["Price"].'</td>

    </tr>
    ';

}
echo '<h2>Total Cost :'.$sum .'</h2>';

?>    
</table >

</div>
</div>

<?php
}
?>
<?php include "footer.php"; ?>
