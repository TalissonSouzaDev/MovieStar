
<?php
 require_once("./templates/header.php");

 $_SESSION['wewe'] =  "ola muindo";
 ?>

   
    <h1>Corpo do site <?php $_SESSION['wewe']; ?></h1>
   

 <?php
 require_once("./templates/footer.php");
 ?>