<?php
session_start();
unset($_SESSION["cart"]);
session_write_close();
header("Location: cart.php?success=yourpayment");
?>