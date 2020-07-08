<?php include "header.php"; ?>

<div class="feedbackgrid">
    <h1 style="text-align:center;"> Admin Notification Form</h1>
    <div class="feedbacktext">
        <?php
        if (isset($_GET["fill"])){
            if($_GET["fill"]=="empytspaces")
            echo '<h5 class="errorinfo" style="text-align:center;"> Please fill form correctly.</h5>';
            if ($_GET["fill"]=="validemail")
                echo '<h5 class="errorinfo" style="text-align:center;"> Please enter valid email.</h5>';
        }

        ?>
        <form action="forgotpassfunc.php" method="post">
            <label for="fname">First name:</label>
            <input style="height:30px;width:200px;" type="text" id="fname" name="name" placeholder="Enter Your Name">
            <br>
            <hr>
            <label for="lm"> <br>Last name:</label>
            <input style="height:30px;width:200px;" type="text" id="lm" name="lastname" placeholder="Enter Your Lastname">

            <hr>
            <label for="ma"> Mail     &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp    :</label>
            <input  style="height:30px;width:200px;" type="text" id="ma" name="email" placeholder="Enter Your Email">
            <hr>
            <br> <hr>  <button name="submit" class="btn btn-warning" style="margin-left: auto;margin-right: auto;   display: block;width:200px;height:40px" type="submit">Send Notification</button>
        </form>


    </div>

</div>
<?php include "footer.php"; ?>
