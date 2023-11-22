
<?php
 require_once("./templates/header.php");

 if($userdata != [])
{
    $userdao->verifyToken(false);

 }
 else{
    $userdao->verifyToken(true);
 }
 $user = new User();
 $fullname = $user->fullname($userdata);

 if($userdata->image == ""){
   $userdata->image = "img\user\user_cover.png";
 }

 ?>

   
   <div class="editprofile">
   <h1><?php echo "{$fullname}"; ?></h1>

  <form action="user_process.php" method="post" enctype="multipart/form-data">

      <input type="hidden"  name="type" id="" value="update">
  

   <div class="form-group file">
  
   <img src="<?php echo $userdata->image; ?>"  alt="imageuser" srcset=""/>
 
   <input type="file" name="image" id="" class="form-control-file">

      
   </div>

  <div class="form-group">
   <label for="name">Nome:</label>
      <input type="text" class="form-control" name="name" id="" value="<?php echo $userdata->name; ?>">
   </div>

   <div class="form-group">
   <label for="name">SobreNome:</label>
      <input type="text" class="form-control" name="lastname" id="" value="<?php echo $userdata->lastname; ?>">
   </div>

   <div class="form-group">
   <label for="name">Email:</label>
      <input type="email" readonly class="form-control disabled" name="email" id="" value="<?php echo $userdata->email; ?>">
   </div>

   <div class="form-group">
   <label for="name">Sobre você:</label>
      <textarea name="bio" id="" cols="30" rows="10" class="form-control"><?php echo $userdata->bio; ?></textarea>
   </div>
   <br>


   <div class="form-group">
      <input type="submit" class="btn btn-warning" value="Atualizar Registro">
   </div>
  </form>



  <!-- Alterar senha-->
  <h1>Atualizar senha</h1>
  <form action="user_process.php" method="post" enctype="multipart/form-data">
  <input type="hidden"  name="type" id="" value="update-password">
  <div class="form-group">
   <label for="name">Senha Atual:</label>
      <input type="password" class="form-control" name="password">
   </div>

   <div class="form-group">
   <label for="newpassword">Nova Senha:</label>
      <input type="password" class="form-control" name="newpassword">
   </div>

   <div class="form-group">
   <label for="newconfimpassword">Confirma Senha:</label>
      <input type="email" class="form-control disabled" name="newconfimpassword">
   </div>

<br>

   <div class="form-group">
      <input type="submit" class="btn btn-warning" value="Atualizar Senha">
   </div>
  </form>


   </div>
   

 <?php
 require_once("./templates/footer.php");
 ?>