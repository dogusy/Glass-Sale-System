<?php 
include "header.php";
include "connect.php"; 

$sql="SELECT * FROM glass";
$result=mysqli_query($baglan,$sql); 
$productid=array_column($_SESSION["cart"],"productid");
$productcountity=array_column($_SESSION["cart"],"productquantity");
if(isset($_SESSION["cart"])){
    $total=0;
    $count=0;
    while ($row=mysqli_fetch_assoc($result)) {
        foreach($productid as $key=>$id){
            if ($row['Id']==$id){ 
             
              $count=$count+$productcountity[$key];
           
             $total=$total+$row['Price']*$productcountity[$key];
     }}
    }
    //echo $count."count";
   // echo $total;

}
if (isset($_SESSION["userid"])) {
    if (isset($_GET["error"])) {
        if ($_GET["error"]="emptyfields") {
            echo '<p> Please fill form correctly</p>';
        }
    }



?>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">

<form action="paymentfunc.php" method="POST">

<div class="productpaymentcontainer">
<h2 style="">Payment & Address Informations</h2>
<?php foreach($productid as $value)
{
    echo '<input type="hidden" name="cartid[]" value="'. $value. '">';
}
foreach($productcountity as $value)
{
    echo '<input type="hidden" name="cartcount[]" value="'. $value. '">';
}
echo '<input type="hidden" name="userid" value="'. $_SESSION["userid"]. '">';

?>

 <div class="productpaymentinputs">

 <div style="height:15%;margin:.8em  0.8em;" >
<i class="fa fa-user"></i>  
<input   id="uname"style="width:70%; height:100%;
  border: 2px solid lightgray;;

"type="text" name="cname"  placeholder="Name on Cart">
 </div>
 <div style="height:15%; margin:.8em  0.8em;" >
 <i class="fas fa-credit-card"></i>
<input  id="ccn"style="width:69%; height:100%;
  border: 2px solid lightgray; 
"type="text" name="cnum"  placeholder="Credit Cart Number">
 </div>
 <div style="height:15%; margin:.8em 0.8em; " >
 <i class="fas fa-calendar-alt"></i>
<input  id="em"style="width:70%; height:100%;
  border: 2px solid lightgray;   
"type="text" name="cmonth"  placeholder="Expiration Month">
 </div>

 <div style="height:15%; margin:.8em 0.8em; " >
 <i class="fas fa-calendar-alt"></i>
<input  id="em"style="width:70%; height:100%;
  border: 2px solid lightgray;   
"type="text" name="cyear"  placeholder="Expiration Year">
 </div>
 <div style="height:15%; margin:.8em 0.8em; " >
 <i class="fab fa-cc-visa"></i>
<input  id="em"style="width:69%; height:100%;
  border: 2px solid lightgray;   
"type="text" name="ccvv"  placeholder="CVV">
 </div>
 </div>
 <div class="productpaymentaddress">

 <div style="height:13%; margin:.8em 0.8em; " >
 <i class="far fa-id-card"></i>
 <input  id="em"style="width:80%; height:100%;
  border: 2px solid lightgray;   
"type="text" name="uname"  placeholder="Name">
 </div>
 <div style="height:13%; margin:.8em 0.8em; " >
 <i class="far fa-id-card"></i>
 <input  id="em"style="width:80%; height:100%;
  border: 2px solid lightgray;   
"type="text" name="ulast"  placeholder="Last Name">
 </div>
 <div style="height:13%; margin:.8em 0.8em; " >
 <i class="fas fa-address-book"></i>
  <input  id="em"style="width:81%; height:100%;
  border: 2px solid lightgray;   
"type="text" name="uaddress"  placeholder="Address">
 </div>
 <div style="height:13%; margin:.8em 0.8em; " >
 <i class="fas fa-envelope"></i>
  <input  id="em"style="width:80%; height:100%;
  border: 2px solid lightgray;   
"type="text" name="umail"  placeholder="Email">
 </div>

 </div>
 <div class="productpaymenttotal">
        <div class="col-md-12 offset-md-1 border rounded mt-5 bg-white h-25">

        <div class="pt-8">
                <h2 style="
                 font-family: 'Montserrat';
                ">PRICE DETAILS</h2>
                <hr>
                <br>
  
                    <div class="col-md-8">
                        <h3 style="
                        font-family: 'Montserrat';
                        
                        ">TOTAL : <?php echo $total; ?> TL</h3>
                        <hr>
                    
                </div>
                <div class="col-md-6">
                <?php           
          

?>
                </div>
            </div>
    
   
     <input style="align-self:end;" type="submit" class ="btnn"  name="pay" placeholder="Pay" value="Pay">
 </div>

</div>
</form>

<?php
}
elseif (!isset($_SESSION["cart"])) {
    header("Location: ".$_SERVER['HTTP_REFERER']);
}
else
{

    header("Location: login.php?warning=pleaselogin");
}
 

?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
