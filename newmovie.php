
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
<div class="newmovie">
    <h1>Adicionar Filme</h1>
    <h4>Mostre o melhor do cinema para o mundo!</h4>
 <form action="movie_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="type" value="create">

 <div class="form-group">
    <label for="">Titulo</label>
    <input type="text" name="title" id="" class="form-control" placeholder="Insira o titulo do filme">

 </div>

 <div class="form-group">
    <label for="">Image</label>
    <input type="file" name="image" id="" class="form-control">

 </div>


 <div class="form-group">
    <label for="">Duração:</label>
    <input type="text" name="length" id="" class="form-control" placeholder="Insira a duração do filme">

 </div>

 <div class="form-group">
    <label for="">Categoria</label>
   <select name="category" id="" class="form-select">
    <option value="">Selecione</option>
    <option value="Ação">Ação</option>
    <option value="Drama">Drama</option>
    <option value="Comèdia">Comèdia</option>
    <option value="Fantasia / Ficção">Fantasia / Ficção</option>
    <option value="Romance">Romance</option>
   </select>

 </div>


 <div class="form-group">
    <label for="">Trailer:</label>
    <input type="text" name="trailer" id="" class="form-control" placeholder="Insira o link do trailer">

 </div>

 <div class="form-group">
    <label for="">Descrição:</label>
    <textarea name="description" id="" rows="5" placeholder="descrevar o filme..." class="form-control"></textarea>

 </div>

<button type="submit" class="btn btn-warning btn-lg"> Adicionar Filme</button>
 </form>
</div>

  
   

 <?php
 require_once("./templates/footer.php");
 ?>