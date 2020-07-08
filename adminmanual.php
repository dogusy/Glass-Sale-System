<?php
include "connect.php";
session_start();
if(isset($_SESSION["useraut"])&&($_SESSION["useraut"]==1)) {
    $sql="SELECT * FROM glass";
    $result=mysqli_query($baglan,$sql);

    ?>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <div class="adminpanel">
        <div class="logincontainerlogo">
            <h1> <a href="index.php" style="color:white;font-weight: 200;">MAIN<span style="color:orange;font-weight: 600;">PAGE</span> </a></h1>

        </div>
        <div class="leftside">

            <ul>
                <li><a href="manageproducts.php">Manage Products</a></li>
                <li><a href="managemembers.php">Manage Members</a></li>
                <li><a href="manageorders.php">Manage Orders</a></li>
                <li><a href="adminmanual.php">Admin Manual</a></li>

            </ul>

        </div>


        <div class="admincontents">

        <h1 style="text-align: center;font-family: Montserrat">Admin Manual</h1>
            <h2 style="font-family: Montserrat">Manage Products </h2>
            <p style="font-family: Montserrat"> <img src="backgroundimg/artı.PNG"> : This button add product.Admin have to fill every entry except product id. </p>

            <p style="font-family: Montserrat"> <img src="backgroundimg/eksi.PNG"> : This button delete product.Admin have to fill id area for desired product. </p>

            <p style="font-family: Montserrat"> <img src="backgroundimg/edit.PNG"> : This button edit product.Admin should fill  attribute's areas but most importantly admin should specify product with id. </p>
            <hr>

            <h2 style="font-family: Montserrat">Manage Orders </h2>
            <p style="font-family: Montserrat"> <img src="backgroundimg/eksi.PNG"> : This button delete orders.Admin have to fill order id. </p>

            <p style="font-family: Montserrat"> <img src="backgroundimg/edit.PNG"> : This button edit orders.Admin can change order attributes.Order Id must filled. </p>
            <hr>

            <h2 style="font-family: Montserrat">Manage Members </h2>
            <p style="font-family: Montserrat"> <img src="backgroundimg/artı.PNG"> : This button creates admin from present members.Admin have to fill user id. </p>
            <p style="font-family: Montserrat"> <img src="backgroundimg/eksi.PNG"> : This button delete member.Admin have to fill id area for selected member. </p>
            <p style="font-family: Montserrat"> <img src="backgroundimg/edit.PNG"> : This button edit member.Admin should fill  attribute's areas for change but most importantly admin should specify member with id. </p>

        </div>

    </div>

<?php } ?>