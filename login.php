
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
  " class="logincontainer">
<div class="logincontainerlogo"  > 
    <div class="logo_container">
    <h1> <a href="index.php">MAIN<span style="color:orange">PAGE</span> </a></h1>

    </div>
</div>

<div class="customerlogin" >
    <h2>
<span>SIGN IN</span>
    </h2>
</div>
<form class="loginform" method="POST" action="loginfunc.php">
    <?php 
    if (isset($_GET['error'])) {
        if ($_GET['error']=="wrongpasword") {
echo '<p class="errorinfo" > Your username or password is wrong<p>';        }
elseif ($_GET['error']=="nouser") {
    echo '<p class="errorinfo">There is no such user please sign up<p>';        }
    elseif ($_GET['error']=="emptyfields") {
        echo '<p class="errorinfo">Please fill form correctly<p>';        }
    }
    if(isset($_GET["warning"])){
        if ($_GET["warning"]=="pleaselogin") {
            echo '<p class="errorinfo">Please login or signup<p>';
        }

    }
    
    ?>
<div > 
<div>
<div >
<i class="far fa-user"></i>
    <input type="text" name="uname"  placeholder="Username">
</div>
<div>
<i class="fas fa-lock"></i>
    <input type="password" name="pass" placeholder="Password">
</div>
<input type="submit" class="btnn" name="login" value="Login">

<a href="forgotpass.php"><h4 style="color:black; padding: 30px 0;font-size: 18px;font-family: 'Montserrat'; cursor:pointer;">Forgot Your Password</h4></a>
<a href="signup.php"><input type="button" class="btnn"  name="createacc" value="Create an Account"></a>

</div>
</form>
</div>
<div style="background-color:white; grid-row: 3/13; opacity:0.3"> </div>
<div style="background-color:white; grid-row: 3/13; opacity:0.3"> </div>


</div>  
<?php include "footer.php"; ?>
