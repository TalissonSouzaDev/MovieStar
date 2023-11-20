
<?php
 require_once("./templates/header.php");

 if($userdata != [])
{
    $userdao->verifyToken(false);

 }
 else{
    $userdao->verifyToken(true);
 }
 ?>

   
    <h1>Perfil <?php echo @$_SESSION['token']; ?></h1>
   

 <?php
 require_once("./templates/footer.php");
 ?>