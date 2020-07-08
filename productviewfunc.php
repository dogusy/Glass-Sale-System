<?php 
session_start();
if(isset($_POST["addproduct"])) {
  //session_destroy();
  $quantity=isset($_POST["quantity"])?$_POST["quantity"]:1;
    print_r($_POST["productid"]);
        if(isset($_SESSION["cart"])){
          $item_array_id=array_column($_SESSION["cart"],"productid");
          print_r($item_array_id);
        
        if (in_array($_POST["productid"], $item_array_id)) {
          echo '<p> This product added already</p>';  
          print_r($item_array_id);
        header("Location: ".$_SERVER['HTTP_REFERER']."&warning=youhave");

exit();
        }
        else {
          $count=count($_SESSION["cart"]);
          $item_array=array("productid"=>$_POST["productid"],
          "productquantity"=>1
        );
          $_SESSION["cart"][$count]=$item_array;
        }
          }
          else{
              $item_array=array( 
                  "productid"=>$_POST["productid"],
                  "productquantity"=>1
            );
              $_SESSION["cart"][0]=$item_array;
          }}
          
          session_write_close();
          
header("Location: ".$_SERVER['HTTP_REFERER']."&warning=youhave");

  ?>
