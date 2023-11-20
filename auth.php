
<?php
 require_once("./templates/header.php");
 ?>

   <div id="main-container" class="">
    

   <div class="form-auth-register">


   <div class="control-register">
    <h1>Criar Uma Conta</h1>

   <form action="auth_process.php" method="post">

<input type="hidden" name="type" value="register">

   <div class="form-group">
    <label for="">Nome:</label>
    <input type="text" class="form-control" name="name" placeholder="Nome" autocomplete="off">
   </div>

   <div class="form-group">
    <label for="">SobreNome:</label>
    <input type="text" class="form-control" name="lastname" placeholder="LastName" autocomplete="off">
   </div>

   <div class="form-group">
    <label for="">Email:</label>
    <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off">
   </div>

   <div class="form-group">
    <label for="">Senha:</label>
    <input type="password" class="form-control" name="password" placeholder="password" autocomplete="off">
   </div>

   <div class="form-group">
    <label for="">Confirme a senha:</label>
    <input type="password" class="form-control" name="confirm_password" placeholder="Confime sua senha" autocomplete="off">
   </div>
   <br>

   <div class="form-group">
    <button type="submit" class="btn btn-warning btn-lg">Cadastrar</button>
   </div>
   
   

   </form>
   </div>




   <div class="control-register">
   <h1>Autenticação</h1>

   <form action="auth_process.php" method="post">
   <input type="hidden" name="type" value="autenticar">

   <div class="form-group">
    <label for="">Login:</label>
    <input type="email" class="form-control" name="email" placeholder="Digite seu email" autocomplete="off">
   </div>

   <div class="form-group">
    <label for="">Senha:</label>
    <input type="password" class="form-control" name="password" placeholder="senha" autocomplete="off">
   </div>
   <br>

   <div class="form-group">
    <button class="btn btn-warning btn-lg">Entrar</button>
   </div>

   </form>
   </div>



   </div>
   </div>

 <?php
 require_once("./templates/footer.php");
 ?>