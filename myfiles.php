
<?php
 require_once("./templates/header.php");
 require_once("./dao/MovieDAO.php");
 require_once("./dao/ReviewDAO.php");

 $moviedao =  new MovieDao($conn);
 $reviewdao =  new ReviewDao($conn);
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
  <?php  $rating = $reviewdao->getRatings($movie->id); ?>
  <span class="rating"><?= $rating['rating'] > 0 ? number_format($rating['rating'],1,".") : "Sem Avaliação"  ?></span>
  </div>
    <div class="latestmovie">
    <a href="movie.php?id=<?= $movie->id ?>" class="card-title"><?= $movie->title ?></a>
    <p class="card-text"><?= $movie->description ?></p>
    <a href="editmovie.php?id=<?= $movie->id ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>

    <form action="movie_process.php" method="post">
      <input type="hidden" name="type" value="delete">
      <input type="hidden" name="id" value="<?= $movie->id ?>">
      <button type="submit" class="btn btn-danger" style="width: 100%;"><i class="fas fa-times"></i> Excluir</button>
    </form>

    </div>
  
  </div>
</div>

<?php endforeach; ?>

</div>
</div>
   

 <?php
 require_once("./templates/footer.php");
 ?>