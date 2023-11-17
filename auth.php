
<?php
 require_once("./templates/header.php");
 ?>

   <div id="main-container" class="">
    

   <div class="form-auth-register">


   <div class="control-auth">
    <h1>Autenticação</h1>

   <form action="" method="post">

   <div class="form-group">
    <label for="">Login:</label>
    <input type="text" class="form-control" name="login" placeholder="login" autocomplete="off">
   </div>

   <div class="form-group">
    <label for="">Pássword:</label>
    <input type="text" class="form-control" name="password" placeholder="password" autocomplete="off">
   </div>

   <div class="form-group">
    <button class="btn btn-warning">Entrar</button>
   </div>
   
   

   </form>
   </div>




   <div class="control-register">

   <form action="" method="post" class="form-auth">

   <div class="form-group">
    <label for="">Login:</label>
    <input type="text" class="form-control" name="login" placeholder="login" autocomplete="off">
   </div>

   <div class="form-group">
    <label for="">Pássword:</label>
    <input type="text" class="form-control" name="password" placeholder="password" autocomplete="off">
   </div>

   <div class="form-group">
    <button class="btn btn-warning">Entrar</button>
   </div>

   </form>
   </div>



   </div>
   </div>

 <?php
 require_once("./templates/footer.php");
 ?>