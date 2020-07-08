<?php
if(isset($_POST["login"])){

    require "connect.php";

    $username=$_POST['uname'];
    $passw=$_POST['pass'];

    if (empty($username)||empty($passw)) {
       header("Location: login.php?error=emptyfields");
        exit();
    }
    else {
        $sql="SELECT * FROM members WHERE Username=?";
        $stmt=mysqli_stmt_init($baglan);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: login.php?error=sqlerror");
            exit();
        }
        else{

            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if ($row=mysqli_fetch_assoc($result)) {
                $passcheck=password_verify($passw,$row['Passw']);
                if ($passcheck==false) {
                    header("Location: login.php?error=wrongpasword");
                    exit(); 
                }
                elseif ($passcheck==true) {
                    session_start();
                    $_SESSION["userid"]=$row['Iduser'];
                    $_SESSION["useraut"]=$row['Authorization'];
                    $_SESSION["username"]=$row['Username'];
                    header("Location: index.php?login=success");
                    exit();
                }
            }
            else {
                header("Location: login.php?error=nouser");
                exit();
            }
        }
    }



}
else {
    header("Location: index.php");
}

?>