
<?php 
include "header.php";
include "connect.php";
$sql="SELECT * FROM glass WHERE ModelNumber='".$_GET["Modelm"]."'";
$result=mysqli_query($baglan,$sql);
$fetched=mysqli_fetch_assoc($result);
$imagedestination=$fetched["Imgpath"];

?>

<div  class="productviewcontainer">
<div class="productimg"> <img style="       max-width:100%; height:auto;" src="<?php echo $imagedestination; ?>" alt="<?php echo $fetched["Brand"] ?>">

</div>

<img src="" alt="">
<div class="productbuy">
<br>
<br>
<br>
<h3 style=" text-align:center; font-size: 1em; font-family: 'Montserrat';  letter-spacing: .059535em; " ><?php echo $fetched["Brand"]." ".$fetched["ModelNumber"]." ".$fetched["ProductDiv"] ?></h3> 
<br>
<br>
<br>

<h4  style=" text-align:center; font-size: 2em; font-family: 'Montserrat';  letter-spacing: .059535em; "> <?php echo $fetched["Price"]." TL" ?></h4>
<div style="margin: 7em 0;">
<?php
//product div yani gözlük genişliklerini alıyoruz ve explode fonksiyonuyla *larla ayrılan stringi parcalara ayırıp her bir parçasını arraya atıyoruz
$productdiv=explode('*', $fetched["ProductDiv"] , 3);
    
echo '<div style="float:left;"><img style="margin: 0 0.4em; " src="productdiv/1.jpg" alt="aaa">    <p class="productpageps">'.$productdiv[0].' MM</p>
</div>'." ";
echo '<div style="float:left;"><img style="margin: 0 0.4em;" src="productdiv/2.jpg" alt="aaa">   <p class="productpageps" ">'.$productdiv[1].' MM</p>
</div>'." ";
echo '<div style="float:left;"><img style="margin: 0 0.4em;" src="productdiv/2.jpg" alt="">   <p class="productpageps" ">'.$productdiv[2].' MM</p>
</div>';

 ?>
</div>
<form  action="productviewfunc.php" method="POST">
<input type="submit" style="margin: 3em 0;"    name="addproduct" class="btnn" value="Add Card" placeholder="Add Card">
<input type="hidden" name="productid" value="<?php echo $fetched["Id"] ?>">
</form>
</div>
<div class="productinfo">

<div>
<p class="productpageinfopart"> <b> Model Number :</b>  </p>
<p class="productpageps" style="font-size:.9em;text-align:left"> <?php echo $fetched["ModelNumber"] ?></p>
</div>
<div>
<p class="productpageinfopart"> <b> Brand :</b> </p>

    <p class="productpageps" style="font-size:.9em;text-align:left"> <?php echo $fetched["Brand"] ?></p>
</div>
<div>
<p class="productpageinfopart" > <b> Gender :</b> </p>

    <p class="productpageps" style="font-size:.9em;text-align:left"> <?php echo $fetched["Gender"] ?></p>
</div>
<div>
<p class="productpageinfopart" > <b> Frame Shape :</b> </p>

    <p class="productpageps" style="font-size:.9em;text-align:left"> <?php echo $fetched["Frameshape"] ?></p>
</div>
<div>
<p class="productpageinfopart" > <b> Glass Material :</b> </p>

    <p class="productpageps" style="font-size:.9em;text-align:left"> <?php echo $fetched["Glassmaterial"] ?></p>
</div>
<div>
<p class="productpageinfopart" > <b> Frame Material :</b> </p>

    <p class="productpageps" style="font-size:.9em;text-align:left"> <?php echo $fetched["Framematerial"] ?></p>
</div>
<div>
<p class="productpageinfopart" > <b> Glass Number :</b> </p>

    <p class="productpageps" style="font-size:.9em;text-align:left"> <?php echo $fetched["ProductDiv"] ?></p>
</div>
<div>
<p class="productpageinfopart" > <b> Frame Color :</b> </p>

    <p class="productpageps" style="font-size:.9em;text-align:left"> <?php echo $fetched["Framecolor"] ?></p>
</div>

</div>

</div>

<?php 
session_write_close();
?>
<?php include "footer.php"; ?>
