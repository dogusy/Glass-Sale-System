
<html lang="en">

<head>

<link rel="stylesheet"  type="text/css" href="style.css?v=<?php echo time(); ?>">
<meta name="viewport"  content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css">
</head>
<div style="
 background-image: url('backgroundimg/login1.jpg');
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-color: #464646;
  "   class="logincontainer">
<div class="logincontainerlogo"  > 
    <div class="logo_container" style="vertical-align: center">
    <h1> <a href="index.php">MAIN<span style="color:orange">PAGE</span> </a></h1>

    </div>
</div>

<div class="customerlogin" >
    <h2>
<span>SIGN UP</span>
    </h2>
</div>
<form  class="loginform" method="POST" action="signupfunc.php">
    <?php 
    if(isset($_GET['error'])){

        if ($_GET['error']=="inavalidmailusername") {
echo '<p  class="errorinfo">Please fill form without empty places</p> ';
        }
        
        if ($_GET['error']=="invalidemail") {
            echo '<p class="errorinfo">Please write appropriate email</p> ';
                    }
        
                    if ($_GET['error']=="invalidusername") {
                        echo '<p class="errorinfo">Please write username that includes only letter and numbers</p> ';
                                }
                                if ($_GET['error']=="passwordcheck") {
                        echo '<p class="errorinfo">Passwords different from each other</p> ';
                                }
                                if ($_GET['error']=="emailtaken") {
                                    echo '<p class="errorinfo">Email taken by another user</p> ';
                                            }
                                            if ($_GET['error']=="usernametaken") {
                                                echo '<p class="errorinfo">Username taken by another user</p> ';
                                                        }
                                                
    }
    if(isset($_GET['signup'])){
        echo '<a class="succinfo" href="index.php">You are succesfully registered please click this link and you will redirect to main page</a>';


    }

    ?>
<div style="padding: -50px 0;" > 
<div>
<div>
<i class="far fa-address-card""></i>
    <input type="text" name="urname" placeholder="Please Enter Name" required>
</div>
<div>
<i class="far fa-address-card""></i>
    <input type="text" name="urlast" placeholder="Please Enter Lastname" required>
</div>
<div>
<i class="far fa-address-card""></i>
    <input type="text" name="uradd" placeholder="Please Enter Address" required>
</div>
<div >
<i class="far fa-user"></i>
    <input type="text" name="uname"  placeholder="Username" required>
</div>
<div>
<i class="far fa-envelope"></i>
    <input type="text" name="email" placeholder="Please Enter E-mail" required>
</div>
<div>
<i class="fas fa-lock"></i>
    <input type="password" name="pass" placeholder="Password" required>
</div>
<div>
<i class="fas fa-lock"></i>
    <input type="password" name="passagain" placeholder="Password Again" required>
</div>
<input style="  font-weight: 800; font-size:25px" type="submit" class="btnn" name="signup" value="Register" required>

</div>
</form>
</div>
<div style="background-color:white; grid-row: 3/13; opacity:0.3"> </div>
<div style="background-color:white; grid-row: 3/13; opacity:0.3"> </div>


</div>
</html>
<?php include "footer.php"; ?>
