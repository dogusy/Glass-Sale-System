<?php include "header.php"; ?>

<div class="feedbackgrid">
<h1 style="text-align:center;"> Feedback Form</h1>


<div class="feedbacktext">
    <?php
    if (isset($_GET["fill"])){
        echo '<h5 class="errorinfo" style="text-align:center;"> Please fill form correctly.</h5>';
    }

    ?>
<form action="feedbackfunc.php" method="post">
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
  <label style="vertical-align:center" for="msg"> <br><br> Message   &nbsp :</label>

  <textarea style="height:150px;width:400px;wrap:nowrap;"type="text" name="message" id="msg" placeholder="Enter Your Message"></textarea>
  <br> <hr>  <button name="submit" class="btn btn-warning" style="margin-left: auto;margin-right: auto;   display: block;width:200px;height:40px" type="submit">Send Feedback</button>
</form> 


</div>

</div>
<?php include "footer.php"; ?>
