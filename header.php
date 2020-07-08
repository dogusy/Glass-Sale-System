<?php  
require "session.php";
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>
<body>
<div class="containerheader" >
<div class="logo_container">
    <h1> <a href="index.php">GLA<span style="color:orange">SS</span> </a></h1>

</div>
<div class="navigation">
<ul>
    <li ><a href="man.php">MAN</a></li>
    <li ><a href="woman.php">WOMAN</a></li>
    <li ><a href="child.php">KIDS</a></li>
</ul>
</div>
<div  class="search" >
<form style="background-color:#101010; display:block; text-align:center" action="search.php" method="POST">
      <input style="width:100%;" type="text" placeholder="Search.." name="search">
       <button style="width:100%"name="searchbutton" type="submit"><i class="fa fa-search"></i></button>
    </form></div>

<div class="navigation">
<ul >
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="cart.php">Cart <?php 
    
    if (isset($_SESSION["cart"])) {
        $count=count($_SESSION["cart"]);
        echo "<span>".$count."</span>";
    }
    
    ?>

</a></li>
    <?php if(isset($_SESSION['userid'])){
    echo    '<li><a href="profil.php">My Profile</a>';
}
else {
    echo    '<li><a href="login.php">Login</a>';
}?>
<ul >
<?php
if(isset($_SESSION['userid']) && $_SESSION['useraut']==2 ){
    echo '<li><a href="profil.php">My Profile</a></li>';
    echo '<li><a href="sentnotif.php">Notification</a></li>';

    echo '<li><a href="logoutfunc.php">Logout</a></li>';

}

elseif(isset($_SESSION['userid']) && $_SESSION['useraut']==1 ){
    echo '<li><a href="manageproducts.php">Admin Panel</a></li>';

    echo '<li><a href="logoutfunc.php">Logout</a></li>';

}
else {
echo '<li><a href="login.php">Login</a></li>';
echo '<li><a href="signup.php">Signup</a></li>';
}

?>
</ul>

</li>
</ul>
</div>
</div>    



</body>
</html>