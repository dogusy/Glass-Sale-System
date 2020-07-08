<?php include "connect.php";include "header.php"; include "functions.php";


?>
<head>
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">

</head>

<div class="filterpart" >
<select id="name" class="howmanyitems" name="name" onchange="howmanyitems(this.value)" >
<option  value="" >Glasses per Page </option>
 <option  value="10" >10</option>
 <option value="20" >20</option>
 <option value="50">50</option>
</select> 



<?php 
    $main_id=isset($_COOKIE['count'])?$_COOKIE["count"]:10;
    unset($_COOKIE['count']); 
     $resultnumonpage=$main_id;

 ?>


  <!-- Trigger the modal with a button -->
<button style="font-size:18px" type="button" class="expandingfilter" data-toggle="modal" data-target="#myModal">Filter</button>

  <!-- Modal -->
  <div  class="modal fade" id="myModal" role="dialog">
    <div style="height:300px "  class="modal-dialog">
    
      <!-- Modal content-->
      <div  class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="  text-align: center; font-size:25px; font-weight:500"class="modal-title">FILTERS</h4>
        </div>
        <form action="child.php" method="GET" autocomplete="off" >
        <div  class="containerfilter">
            <?php  
                        $databrand=mysqli_query($baglan,"select distinct  Brand  from glass where Gender='Child'");
                        $datashape=mysqli_query($baglan,"select Frameshape, Frameshapeicon  from glass where Gender='Child' group by Frameshape ");
                        $dataglass=mysqli_query($baglan,"select distinct  Glassmaterial  from glass where Gender='Child'");
                        $datamaterial=mysqli_query($baglan,"select distinct  Framematerial  from glass where Gender='Child'");
                        $datamodelnumber=mysqli_query($baglan,"select distinct  ModelNumber  from glass where Gender='Child'");
                        $dataprice=mysqli_query($baglan,"select distinct  Price  from glass where Gender='Child'");
                        $dataframecolor=mysqli_query($baglan,"select distinct  Framecolor , Colorcode  from glass where Gender='Child'");
                        $dataproductdiv=mysqli_query($baglan,"select distinct  ProductDiv	  from glass where Gender='Child'");
             ?>
               <label for="br">Brand</label>
            <div id="br" class = "boxfilter" >  
             <?php if (mysqli_num_rows($databrand)!=0)while($getglass= mysqli_fetch_assoc($databrand)){ ?>
             <input type="checkbox" name="brand[]" placeholder="Brands" value="<?php echo $getglass['Brand']; ?>"><?php echo $getglass['Brand']; 
              ?> <br />  <?php } ?> 
             </div> 

              
             <label for="fs">Frame Shape</label>
             <div id="fs"class = "boxfilter"> 
             <?php if (mysqli_num_rows($datashape)!=0)while($getglass= mysqli_fetch_assoc($datashape)){?>
             <input type="checkbox" name="frameshape[]" value="<?php echo $getglass['Frameshape'] ?>"> <img src="<?php echo $getglass['Frameshapeicon']; ?>" style="height:23px;width:23px" alt="Remove this image" /><link rel="icon" sizes="16x16" type="">
                  <?php echo $getglass['Frameshape']; ?> <br/>  <?php  } ?>
             </div>
              
             <label for="gm">Glass Material</label>
             <div id="gm" class = "boxfilter" > 
             <?php if (mysqli_num_rows($dataglass)!=0)while($getglass= mysqli_fetch_assoc($dataglass)){?>
             <input type="checkbox" name="glassmaterial[]"  value="<?php echo $getglass['Glassmaterial'] ?>"> 
             <?php echo $getglass['Glassmaterial'];?>  <br/> <?php  } ?>
             </div>

             <label for="fm">Frame Material </label>
             <div id="fm" class = "boxfilter">
             <?php if (mysqli_num_rows($datamaterial)!=0)while($getglass= mysqli_fetch_assoc($datamaterial)){?>
             <input type="checkbox"  name="framematerial[]" value="<?php echo $getglass['Framematerial'] ?>"> 
             <?php echo $getglass['Framematerial']; ?>  <br/> <?php } ?>
             </div>

             <label for="mm">Model Number </label>
             <div id="mm" class = "boxfilter"> 
             <?php if (mysqli_num_rows($datamodelnumber)!=0)while($getglass= mysqli_fetch_assoc($datamodelnumber)){?>
             <input type="checkbox" name="modelnumber[]" value="<?php echo $getglass['ModelNumber'] ?>"> 
             <?php echo $getglass['ModelNumber'];  ?>  <br/> <?php } ?>
             </div> 

             <label for="p">Price</label>
             <div id="p" class = "boxfilter">  
             <?php if (mysqli_num_rows($dataprice)!=0)while($getglass= mysqli_fetch_assoc($dataprice)){?>
             <input type="checkbox" name="price[]" value="<?php echo $getglass['Price'] ?>">
             <?php echo $getglass['Price']; ?>  <br/> <?php   } ?>
             </div>

             <label for="pd">Glass Number</label>
             <div id="pd" class = "boxfilter" > 
             <?php if (mysqli_num_rows($dataproductdiv)!=0)while($getglass= mysqli_fetch_assoc($dataproductdiv)){?>
             <input type="checkbox" name=" productdiv[]" value="<?php echo $getglass['ProductDiv'] ?>"> 
             <?php echo $getglass['ProductDiv'];  ?>  <br/> <?php } ?>
             </div>

             <label for="fc">Frame Color</label>
             <div id="fc" class = "boxfilter" > 
             <?php if (mysqli_num_rows($dataframecolor)!=0)while($getglass= mysqli_fetch_assoc($dataframecolor)){?>
             <input type="checkbox" name=" framecolor[]" value="<?php echo $getglass['Framecolor'] ?>"> <span style="background-color:<?php echo $getglass['Colorcode']  ?>" class="dot"> </span>
             <?php echo $getglass['Framecolor'];  ?>  <br/> <?php } ?>
             </div>
     
     

             <div  class="modal-footer">
          <input type="submit"  name="submit" value="Submit" > </div>
  
  </div>
  
  </form> 
 
      </div>
    </div>
  </div>
</div>
<div class="column-ads">

<?php  
$sorgu="select * from glass where Gender IN ('Child') ";
 if(isset($_GET['brand'])||isset($_GET['frameshape'])||isset($_GET['glassmaterial'])||isset($_GET['framematerial'])||isset($_GET['modelnumber'])||isset($_GET['price'])||isset($_GET['productdiv'])){
  //$sorgu.="where "; 
  if (isset($_GET['brand'])) {
    $sorgu.="AND Brand IN (".arr2str($_GET['brand'])." )";
    }
    if (isset($_GET['frameshape'])) {
      $sorgu.="AND Frameshape IN (".arr2str($_GET['frameshape'])." )";
     }
     if (isset($_GET['glassmaterial'])) {
      $sorgu.="AND Glassmaterial IN (".arr2str($_GET['glassmaterial'])." )";
     }
     if (isset($_GET['framematerial'])) {
      $sorgu.="AND Framematerial IN (".arr2str($_GET['framematerial'])." )";
     }
     if (isset($_GET['modelnumber'])) {
      $sorgu.="AND ModelNumber IN (".arr2str($_GET['modelnumber'])." )";
     }
     if (isset($_GET['price'])) {
      $sorgu.="AND Price IN (".arr2str($_GET['price'])." )";
     }
     if (isset($_GET['productdiv'])) {
      $sorgu.="AND ProductDiv IN (".arr2str($_GET['productdiv'])." )";
     }
}

            //bu nu input alacak şekilde değişecek
            //https://www.youtube.com/watch?v=gdEpUPMh63s pagination
            $glass=mysqli_query($baglan,$sorgu); 
            $numberofglass= $glass?mysqli_num_rows($glass):0;

            if ($numberofglass!=0) {
              if(!isset($_GET['page'])){
                $page=1;
            }
            else{
            $page=$_GET['page'];
            
            }
              $sqllimit=($page-1)*$resultnumonpage;
            $sql=$sorgu." limit ".$sqllimit.','.$resultnumonpage;
            $result=mysqli_query($baglan,$sql);
  ?>
<div class="productcontainer">
  <?php          
             while($getglass= mysqli_fetch_assoc($result)){
                
           ?>

 <div >
    <a  href="productview.php?Modelm=<?php echo $getglass['ModelNumber'] ?> "  style="text-allign:center;width:25%"> 
    <img src="<?php echo $getglass['Imgpath'];  ?>" style="text-align:center;margin-top:70px;margin-bottom:50px;padding-right:10px;" height="100" width="200"> <br>
    <?php echo $getglass['Brand']; echo str_repeat('&nbsp;', 5); echo $getglass['ModelNumber']; ?></img> 
    <br></a>
    <?php echo $getglass['Price'] ?></br>
    </div>
             <?php }   ?>
             </div>             </div>

             <div class="pagination">
<?php
    
        $numberofpages=ceil($numberofglass/$resultnumonpage);  
//echo '<div style="background-color:blue;" class="container">';
    for($page=1;$page<=$numberofpages;$page++){
        echo '<a  href="child.php?page='.$page.'">'.$page.'</a>';
    }
 // echo '</div>';
  }
  ?>
  </div>
  <?php
if($numberofglass==0)    {
  ?>

  <div style=" margin: auto;  width: 50%;">
<h2 style="font-family: 'Montserrat';  text-align: center;
"> 
<?php
    echo "Results not found.";  
  ?></h2> 

  <img  style=" display: flex;
  justify-content: center; margin: auto;  width: 50%;" src="Glasspictures/glassnotfount.jpg" alt="hata">

</div>
<?php } ?> 
    
<?php include "footer.php"; ?>
    