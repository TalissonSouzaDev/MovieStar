
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
<div class="myfiles">

<h1>Meu Filmes</h1>
<div class="card-myfiles">

<div class="card" style="width: 30rem;">
  <img class="card-img-top" src="./img//movies//movie_cover.jpeg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<div class="card" style="width: 30rem;">
  <img class="card-img-top" src="./img//movies//movie_cover.jpeg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<div class="card" style="width: 30rem;">
  <img class="card-img-top" src="./img//movies//movie_cover.jpeg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>


<div class="card" style="width: 30rem;">
  <img class="card-img-top" src="./img//movies//movie_cover.jpeg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>




</div>
</div>
   

 <?php
 require_once("./templates/footer.php");
 ?>