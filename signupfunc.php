<?php 
  
  if(isset($_POST["signup"])){
    include "connect.php";

   
    
        $username=$_POST["uname"];
        $email=$_POST["email"];
        $pass=$_POST["pass"];
        $passagain=$_POST["passagain"];
        $name=$_POST["urname"];
        $lastname=$_POST["urlast"];
        $address=$_POST["uradd"];

        //check if it has some empty fields
        if (empty($username)|| empty($email)||empty($pass)||empty($passagain)||empty($name)||empty($lastname)||empty($address)) {
  header("Location: signup.php?error=inavalidmailusername&uname=".$username."&email=".$email);
  exit();
        }
        //checks email is correct form and username has valid characters
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)&& (!preg_match("/^[a-zA-Z0-9]*$/",$username))) {
          header("Location: signup.php?error=invalidemail");
          exit();        }
                  //checks email is correct form

        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
          header("Location: signup.php?error=invalidemail&uname=".$username);
          exit();        }
          //check username has valid characters
          elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
            header("Location: signup.php?error=invalidusername&email=".$email);
            exit();        }

            //check passwords are identical
          elseif ($pass!==$passagain) {
            header("Location: signup.php?error=passwordcheck&email=".$email);
            exit(); 
          }
          //checks email or username had taken by another user
else{

  //it has question mark because a sql code can be written on input area and it can destroy database
  //thats why we have it for security issues and we checkink username taken or not
  $sql="SELECT Username FROM members WHERE Username = ?";
  $stmt= mysqli_stmt_init($baglan);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("Location: signup.php?error=sqlerror");
    exit(); 
  }
  else {
    // ıt binds variable and sql statement 
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resulCheck=mysqli_stmt_num_rows($stmt);

    if ($resulCheck>0) {
    header("Location: signup.php?error=usernametaken&email=".$email);
    exit(); 
    }
  }
    //same procedure but now we
    $sql="SELECT Email FROM members WHERE Email = ?";
    $stmt= mysqli_stmt_init($baglan);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: signup.php?error=sqlerror");
      exit(); 
    }
    else {
      // ıt binds variable and sql statement 
      mysqli_stmt_bind_param($stmt,"s",$email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resulCheck=mysqli_stmt_num_rows($stmt);
  
      if ($resulCheck>0) {
      header("Location: signup.php?error=emailtaken&uname=".$username);
      exit(); 
      }
      else {
          $sql="INSERT INTO members (Username,Passw,Email,Authorization,Namee,Lastname,Addresss) VALUES (?,?,?,?,?,?,?)";
          $aut=2;
          $stmt= mysqli_stmt_init($baglan);
          if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: signup.php?error=sqlerror");
            exit(); 
          }
          else {
            $hashedPwd=password_hash($pass,PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,"sssisss",$username,$hashedPwd,$email,$aut,$name,$lastname,$address);
            mysqli_stmt_execute($stmt);
            header("Location: signup.php?signup=success");
            exit(); 
          }
        }

  }
}

    }

  ?>