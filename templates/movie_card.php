

          <div class="card" style="width:20rem; height:500px;">
             <img class="card-img-top" src="./img/movies/<?= empty($movie->image) ? "movie_cover.jpeg" : $movie->image; ?>" alt="Card image cap" height="300px">
             <div class="card-body">
               <div class="card-rating">
                  <i class="fas fa-star" style="color:#f5dd42;"></i>
                  <span class="rating">9</span>
               </div>
               <div class="latestmovie">
               <a href="movie.php?id=<?= $movie->id ?>" class="card-title"><?= $movie->title; ?></a>
               <a href="movie.php?id=<?= $movie->id ?>" class="btn btn-dark">Avaliar</a>
               <a href="movie.php?id=<?= $movie->id ?>" class="btn btn-warning">Conhecer</a>
               </div>
             </div>
         </div>
