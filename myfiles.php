
<?php
 require_once("./templates/header.php");
 require_once("./dao/MovieDAO.php");

 $moviedao =  new MovieDao($conn);
 $movies = $moviedao->myfiles();
 
 if($userdata != [])
{
    $userdao->verifyToken(false);

 }
 else{
    $userdao->verifyToken(true);
 }
 


 ?>
<div class="myfiles">

<h1>Meus Filmes</h1>
<div class="card-myfiles">

<?php foreach($movies as $movie):?>

<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="./img/movies/<?= empty($movie->image) ? "movie_cover.jpeg" : $movie->image ?>" alt="Card image cap" height="300px">
  <div class="card-body">
    
  <div class="card-rating">
    Nota:
  <i class="fas fa-star" style="color: #f5dd42;"></i>
  <span class="rating">9</span>
  </div>
    <div class="latestmovie">
    <a href="movie.php?=<?= $movie->id ?>" class="card-title"><?= $movie->title ?></a>
    <p class="card-text"><?= $movie->description ?></p>
    <a href="#" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
    <a href="#" class="btn btn-danger"><i class="fas fa-times"></i> Excluir</a>
    </div>
  
  </div>
</div>

<?php endforeach; ?>

</div>
</div>
   

 <?php
 require_once("./templates/footer.php");
 ?>