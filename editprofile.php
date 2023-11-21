
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

   
   <div class="editprofile">
   <h1>Perfil do Usuario</h1>
   <img src="\img\users\user_cover.png" alt="" srcset="">


  <form action="" method="post">
  <div class="form-group">
      <input type="hidden" class="form-control" name="token" id="" value="<?php echo $userdata->token; ?>">
   </div>

   <div class="form-group">
   <span class="rounded-circle">
      <img src="\img\users\user_cover.png" alt="" srcset="">
   </span>
      
   </div>

  <div class="form-group">
      <input type="text" class="form-control" name="name" id="" value="<?php echo $userdata->name; ?>">
   </div>

   <div class="form-group">
      <input type="text" class="form-control" name="lastname" id="" value="<?php echo $userdata->lastname; ?>">
   </div>

   <div class="form-group">
      <input type="email" class="form-control" name="email" id="" value="<?php echo $userdata->email; ?>">
   </div>

   <div class="form-group">
      <textarea name="bio" id="" cols="30" rows="10" class="form-control">
         <?php echo $userdata->bio; ?>
      </textarea>
   </div>
   <br>


   <div class="form-group">
      <input type="submit" class="btn btn-warning" value="Atualizar Registro">
   </div>
  </form>



   </div>
   

 <?php
 require_once("./templates/footer.php");
 ?>