<?php
 function cartelement($productimg,$productbrand,$productprice,$productmodel,$productdiv,$productid,$key){
    $productcountity=array_column($_SESSION["cart"],"productquantity");
 
    $element='
  <form action="cart.php" method="POST" style="padding: 2% 0;">
  <div class="">
      <div class="row bg-white">
          <div class= "col-md-3 pl-0">
              <img src="'.$productimg.'" alt="" class="img-fluid">
          </div>
          <div class="col-md-6">
              <a style="color:black" href="productview.php?Modelm='.$productmodel.'">
              <h5 class="pt-2">'.$productbrand." ".$productmodel." ".$productdiv.'</h5></a>
              <h5 class="pt-2">'.$productprice.' TL</h5>
              <button type="submit" value="pay" name="pay"  class="btn btn-warning">Pay</button>

              <button type="submit" class="btn btn-danger mx-2"  value="remove" name="remove">Remove</button>

          </div>
          <div class="col-md-3 py-5">
      <div>    
      <button type="submit" name="minus" class="btn btn-default btn-circle"><i class="fas fa-minus"></i></button>
      <input type="text" value="'.$productcountity[$key].'"  class="form-control w-25 d-inline">
      <input type="hidden" value="'.$productid.'" name="prodid">
      <button type="submit" name="plus" class="btn btn-default btn-circle"><i class="fas fa-plus"></i></button>


      </div>
          </div>

      </div>
  </div>
  
  </form>';
  echo $element;
 }
 
 ?>