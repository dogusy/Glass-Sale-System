<?php 
include "connect.php";
session_start();
if(isset($_SESSION["userid"])){
if (isset($_POST['pay'])) {
    $cname=$_POST["cname"];
    $cnum=$_POST["cnum"];
    $cmonth=$_POST["cmonth"];
    $cyear=$_POST["cyear"];
    $ccvv=$_POST["ccvv"];
    $uname=$_POST["uname"];
    $ulast=$_POST["ulast"];
    $uaddress=$_POST["uaddress"];
    $umail=$_POST["umail"];
    $productid=$_POST["cartid"];
    $productcountity=$_POST["cartcount"];
    $uid=$_POST["userid"];
    print_r($uid);
   
if (empty($cname)||empty($cnum)||empty($cmonth)||empty($cyear)||empty($ccvv)||empty($uname)||empty($ulast)||empty($uaddress)||empty($umail)) {
    header("Location: payment.php?error=emptyfields");
    exit();
}
else {
     $sqlglass="SELECT * FROM glass WHERE 1" ;
   $result=mysqli_query($baglan,$sqlglass); 
   while($row=mysqli_fetch_assoc($result)){
    foreach($productid as $key=>$id){
        if ($row["Id"]==$id) {
        $sqlupdate="UPDATE glass SET Quantity =Quantity-".$productcountity[$key]." WHERE Id = ".$productid[$key]."";
        $sqlorder="INSERT INTO orders  (Brand,Modelnumber,ProductID ,Quantity,Userid,Namee,Lastname,Email,Addres) VALUES ('".$row['Brand']."','".$row['ModelNumber']."',".$productid[$key].",".$productcountity[$key].",".$uid.",'".$uname."','".$ulast."','".$umail."','".$uaddress."')"; 
        mysqli_query($baglan,$sqlupdate); 
        mysqli_query($baglan,$sqlorder); 

      header("Location: cartdelete.php");
        }
    }
}

}


  

}}


?>