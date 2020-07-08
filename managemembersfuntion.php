<?php
include "connect.php";
if(isset($_POST["delete"]) && isset($_POST["search"])){
$uid=$_POST["search"];

$sql="DELETE FROM members WHERE Iduser=".$uid;
$sql1="SELECT * FROM members WHERE Iduser=".$uid;

    $glass1=mysqli_query($baglan,$sql1);

    $glass=mysqli_query($baglan,$sql);

$numberofglass= mysqli_num_rows($glass1);

if ($numberofglass==0) {
  header("Location: managemembers.php?error=nomember");
}
else {
    header("Location: managemembers.php?deleted=deleted");

}
}
if(isset($_POST["add"])){
$id=$_POST["search"];
$aut=$_POST["aut"];

if (empty($_POST["search"])) {
    header("Location: managemembers.php?error=missingidorauth");
    exit();
}

$sql="UPDATE members SET Authorization=1 WHERE Iduser=".$id;
$glass=mysqli_query($baglan,$sql); 
header("Location: managemembers.php");

}
if(isset($_POST["edit"]) && isset($_POST["search"])){
    $uname=$_POST["uname"];
    $id=$_POST["search"];

    $email=$_POST["email"];
    $aut=$_POST["aut"];
    $name=$_POST["name"];
    $lname=$_POST["lname"];
    $address=$_POST["address"];
    if (empty($_POST["edit"])&&empty($_POST["uname"])&&empty($_POST["email"])&&!empty($_POST["aut"])&&
    empty($_POST["name"])&&empty($_POST["lname"])&&empty($_POST["address"])&&empty($_POST["search"])) {
        header("Location: managemembers.php?error=missingtext");
        exit();
    }
    $sql1="SELECT * FROM members WHERE Iduser=".$id;
    $glass=mysqli_query($baglan,$sql1); 
    $number=mysqli_num_rows($glass);

    if ($number==0) {
        header("Location: managemembers.php?error=invalidid");
        exit();
    }
    
    $sql="UPDATE members SET ";

    if (!empty($_POST["uname"])){
        $sql.="Username='".$uname."',";
    }
    if (!empty($_POST["email"])){
        $sql.="Email='".$email."',";
    } if (!empty($_POST["aut"])){
        $sql.="Authorization='".$aut."',";
    } if (!empty($_POST["name"])){
        $sql.="Namee='".$name."',";
    } if (!empty($_POST["lname"])){
        $sql.="Lastname='".$lname."',";
    } if (!empty($_POST["address"])){
        $sql.="Addresss='".$address."',";
    }if (!empty($_POST["aut"])){
        $sql.="Authorization='".$aut."',";
    }
    $sql=substr($sql, 0, -1);
    $sql.= " WHERE Iduser =".$id;



    $glass=mysqli_query($baglan,$sql);
    header("Location: managemembers.php?success=dogru");
    exit();
    }