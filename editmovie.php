
<?php
 require_once("./templates/header.php");
 require_once("./dao/MovieDAO.php");

 $moviedao =  new MovieDao($conn);
 
 if($userdata != [])
{
    $userdao->verifyToken(false);

 }
 else{
    $userdao->verifyToken(true);
 }

 $id = filter_input(INPUT_GET, "id");
if(!empty($id)) 
{
    $movie = $moviedao->findById($id);

}
else
{
    $message->SetMessage("id Não Encontrado!","alert-warning",'myfiles.php');
}
 
 ?>
<div class="newmovie">
    <h1>Edita Filme</h1>
    <h4>Mostre o melhor do cinema para o mundo!</h4>
    <h3><?= $movie->title ?></h3>
 <form action="movie_process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="type" value="update">
    <input type="hidden" name="id" value="<?= $movie->id?>">

 <div class="form-group">
    <label for="">Titulo</label>
    <input type="text" name="title" id="" class="form-control" placeholder="Insira o titulo do filme" value="<?=$movie->title ?>">

 </div>

 <div class="form-group">
    <label for="">Image</label>
    <input type="file" name="image" id="" class="form-control">
    <br>
    <img src="./img/movies/<?= $movie->image ?>" alt="" srcset="" width="400px" height="250px">

 </div>


 <div class="form-group">
    <label for="">Duração: <?=$movie->length ?></label>
    <input type="text" name="length" id="" class="form-control" placeholder="Insira a duração do filme" value="<?=$movie->length ?>">

 </div>

 <div class="form-group">
    <label for="">Categoria</label>
   <select name="category" id="" class="form-select">
    <option value="<?= $movie->category ?>"><?= $movie->category ?></option>
    <option value="Ação">Ação</option>
    <option value="Drama">Drama</option>
    <option value="Comèdia">Comèdia</option>
    <option value="Fantasia / Ficção">Fantasia / Ficção</option>
    <option value="Romance">Romance</option>
   </select>

 </div>


 <div class="form-group">
    <label for="">Trailer:</label>
    <input type="text" name="trailer" id="" class="form-control" placeholder="Insira o link do trailer" value="<?= $movie->trailer ?>">

 </div>

 <div class="form-group">
    <label for="">Descrição:</label>
    <textarea name="description" id="" rows="5" placeholder="descrevar o filme..." class="form-control"><?= $movie->description ?></textarea>

 </div>

<button type="submit" class="btn btn-warning btn-lg"> Atualizar Filme</button>
 </form>
</div>

  
   

 <?php
 require_once("./templates/footer.php");
 ?>