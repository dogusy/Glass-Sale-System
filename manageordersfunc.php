<?php
include "connect.php";
if(isset($_POST["delete"]) && isset($_POST["search"])){
$modelid=$_POST["search"];

$sql="DELETE FROM orders WHERE Idorder=".$modelid;
$sql1="SELECT * FROM orders WHERE Idorder=".$modelid;
    $glass1=mysqli_query($baglan,$sql1);

    $glass=mysqli_query($baglan,$sql);

$numberofglass= mysqli_num_rows($glass1);

if ($numberofglass==0) {
  header("Location: manageorders.php?error=noproduct");
  exit();
}
else {
    header("Location: manageorders.php?deleted=deleted");
    exit();

}
}

if(isset($_POST["edit"]) && isset($_POST["search"])){
    $modelid=$_POST["search"];
    $brand=$_POST["brand"];
    $mm=$_POST["mm"];
    $pi=$_POST["pi"];
    $qua=$_POST["qua"];
    $ui=$_POST["ui"];
    $name=$_POST["name"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    if (empty($_POST["search"])&&empty($_POST["brand"])&&empty($_POST["mm"])&&empty($_POST["pi"])&&empty($_POST["qua"])&&
    empty($_POST["ui"])&&empty($_POST["name"])&&empty($_POST["lname"])&&empty($_POST["email"])&&empty($_POST["address"])) {
        header("Location: manageorders.php?error=missingtext");
    }
    $sql1="SELECT * FROM orders WHERE Idorder=".$modelid;
    $glass=mysqli_query($baglan,$sql1); 
    $number=mysqli_num_rows($glass);

    if ($number==0) {
        header("Location: manageorders.php?error=invalidid");

    }
    
    $sql="UPDATE orders SET ";

    if (!empty($_POST["brand"])){
        $sql .="Brand='".$brand."',";
    }
    if (!empty($_POST["mm"])){
        $sql .="Modelnumber='".$mm."',";
    }
    if (!empty($_POST["pi"])){
        $sql .="ProductID='".$pi."',";
    }
    if (!empty($_POST["qua"])){
        $sql .="Quantity='".$qua."',";
    }
    if (!empty($_POST["ui"])){
        $sql .="Userid='".$ui."',";
    }
    if (!empty($_POST["name"])){
        $sql .="Namee='".$name."',";
    }
    if (!empty($_POST["lname"])){
        $sql .="Lastname='".$lname."',";
    }if (!empty($_POST["email"])){
        $sql .="Email='".$email."',";
    }if (!empty($_POST["address"])){
        $sql .="Addres='".$address."',";
    }
    $sql= substr($sql,0,-1);
    $sql.=" WHERE Idorder =".$modelid;
    $glass=mysqli_query($baglan,$sql);
    header("Location: manageorders.php?success=dogru");

    }