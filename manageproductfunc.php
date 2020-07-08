<?php
include "connect.php";
if(isset($_POST["delete"]) && isset($_POST["search"])){
$modelid=$_POST["search"];

$sql="DELETE FROM glass WHERE Id=".$modelid;
$sql1="SELECT * FROM glass WHERE Id=".$modelid;

    $glass1=mysqli_query($baglan,$sql1);

    $glass=mysqli_query($baglan,$sql);

$numberofglass= mysqli_num_rows($glass1);

if ($numberofglass==0) {
  header("Location: manageproducts.php?error=noproduct");
    exit();

}
else {
    header("Location: manageproducts.php?deleted=deleted");
    exit();

}
}
if(isset($_POST["add"])){
$gender=$_POST["gender"];
$quantity=$_POST["quantity"];
$fhape=$_POST["fhape"];
$fmat=$_POST["fmat"];
$gmat=$_POST["gmat"];
$mm=$_POST["mm"];
$price=$_POST["price"];
$brand=$_POST["brand"];
$prodiv=$_POST["prodiv"];
$fcol=$_POST["fcol"];
    $fcolcode=$_POST["fcolcode"];

if (empty($_POST["gender"])||empty($_POST["quantity"])||empty($_POST["fhape"])||empty($_POST["fmat"])||
empty($_POST["gmat"])||empty($_POST["mm"])||empty($_POST["price"])||empty($_POST["brand"])||empty($_POST["brand"])
||empty($_POST["prodiv"])||empty($_POST["fcol"])) {
    header("Location: manageproducts.php?error=missingtext");
    exit();

}

$sql="INSERT INTO glass (Gender,Brand,Quantity,Frameshape,Glassmaterial,Framematerial,ModelNumber,Price,ProductDiv,Framecolor,Colorcode) VALUES('".$gender."','" .$brand."',".$quantity.",'". $fhape."','".$gmat."','". $fmat."',". $mm.",". $price." ,'".$prodiv."','".$fcol."','".$fcolcode."')";
$glass=mysqli_query($baglan,$sql); 
header("Location: manageproducts.php");
    exit();

}
if(isset($_POST["edit"]) && isset($_POST["search"])){
    $modelid=$_POST["search"];
    $gender=$_POST["gender"];
    $quantity=$_POST["quantity"];
    $fhape=$_POST["fhape"];
    $fmat=$_POST["fmat"];
    $gmat=$_POST["gmat"];
    $mm=$_POST["mm"];
    $price=$_POST["price"];
    $brand=$_POST["brand"];
    $prodiv=$_POST["prodiv"];
    $fcol=$_POST["fcol"];
    $fcolcode=$_POST["fcolcode"];
    if (empty($_POST["gender"])&&empty($_POST["search"])&&empty($_POST["quantity"])&&empty($_POST["fhape"])&&empty($_POST["fmat"])&&
    empty($_POST["gmat"])&&empty($_POST["mm"])&&empty($_POST["price"])&&empty($_POST["brand"])&&empty($_POST["brand"])
        &&empty($_POST["prodiv"])&&empty($_POST["fcol"])) {
        header("Location: manageproducts.php?error=missingtext");
        exit();
    }
    $sql1="SELECT * FROM glass WHERE Id=".$modelid;
    $glass=mysqli_query($baglan,$sql1); 
    $number=mysqli_num_rows($glass);

    if ($number==0) {
        header("Location: manageproducts.php?error=invalidid");
        exit();
    }
    
        $sql="UPDATE glass SET ";

    if (!empty($_POST["gender"])){
        $sql .="Gender='".$gender."',";
    }
    if (!empty($_POST["brand"])){
        $sql .="Brand='".$brand."',";
    }if (!empty($_POST["quantity"])){
        $sql .="Quantity='".$quantity."',";
    }if (!empty($_POST["fhape"])){
        $sql .="Frameshape='".$fhape."',";
    }if (!empty($_POST["gmat"])){
        $sql .="Glassmaterial='".$gmat."',";
    }if (!empty($_POST["fmat"])){
        $sql.="Framematerial='".$fmat."',";
    }if (!empty($_POST["mm"])){
        $sql.="ModelNumber='".$mm."',";
    }if (!empty($_POST["price"])){
        $sql.="Price='".$price."',";
    }if (!empty($_POST["fcol"])){
        $sql.="Framecolor='".$fcol."',";
    }if (!empty($_POST["fcolcode"])){
        $sql.="Colorcode='".$fcolcode."',";
    }

     $sql= substr($sql,0,-1);
    $sql.=" WHERE Id=".$modelid;

    $glass=mysqli_query($baglan,$sql);
    header("Location: manageproducts.php?success=dogru");
    exit();
    }

    if (isset($_POST["loadimg"])&&isset($_POST["search"])) {
        $id=$_POST["search"];
        $target="Glasspictures/";
        $target=$target.basename($_FILES["uploaded"]["name"]);
        $sql=" UPDATE glass SET Imgpath='".$target. "' WHERE Id=".$id;
        mysqli_query($baglan,$sql);
        header("Location: manageproducts.php?success=dogru");

    }
    if (isset($_POST["loadicon"])&&isset($_POST["search"])) {
        $id=$_POST["search"];
        $target="Frameicons/";
        $target=$target.basename($_FILES["uploaded"]["name"]);
        $sql=" UPDATE glass SET Frameshapeicon='".$target. "' WHERE Id=".$id;
        mysqli_query($baglan,$sql);
        header("Location: manageproducts.php?success=dogru");

    }