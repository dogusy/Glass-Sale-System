<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<?php
//Filtredki arrayi string yapıyor sql sorusunun okunması için
function arr2str( array $a){

for ($i=0; $i <count($a) ; $i++) { 
$a[$i]="'".$a[$i]."'";
    }

    return implode(",",$a);
}
?>

<script type="text/javascript">
 function howmanyitems(str) {
   var name=str;
  $.post('functions.php',{name:name },
  function (response) {
    setTimeout(function(){
           location.reload(); 
      }, 1000); 
  });
  
}
</script>
<?php 
  $name=isset($_REQUEST["name"])?$_REQUEST["name"]:5;
if(isset($_REQUEST["name"])){
    $a=$_REQUEST["name"];
    setcookie("count", $a, time() + (86400 * 30), "/");
}

  ?>

