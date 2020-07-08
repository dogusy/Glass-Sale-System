<?php 

$username="root";
$password="";
$sunucu="localhost";

$database="glasses";
$databaseuser="glasses";

// This is for products
$baglan=mysqli_connect($sunucu,$username,$password);

mysqli_real_query($baglan,"SET NAMES UTF8");


if(!$baglan)
{
 echo "Bağlantı hatası: ".mysqli_errno();
 exit();

}

$db=mysqli_select_db($baglan,$database);

if(!$database) {echo "Veritabanı hatası: ".mysqli_error();echo "</br>";
echo "Veritabanı bağlantı bilgilerini baglan.php dosyasından düzenleyebilirsiniz";
exit();
}
?>

