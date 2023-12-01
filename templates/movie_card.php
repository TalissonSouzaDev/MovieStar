

          <div class="card" style="width: 20rem;">
            <?php  $rating = $reviewdao->getRatings($movie->id); ?>
             <img class="card-img-top" src="./img/movies/<?= empty($movie->image) ? "movie_cover.jpeg" : $movie->image; ?>" alt="Card image cap" height="300px">
             <div class="card-body">
               <div class="card-rating">
                  <i class="fas fa-star star"></i>
                  <span class="rating"><?= $rating['rating'] > 0 ? number_format($rating['rating'],1,".") : "Sem Avaliação"  ?></span>
               </div>
               <div class="latestmovie">
               <a href="movie.php?id=<?= $movie->id ?>" class="card-title"><?= $movie->title; ?></a>
               <a href="movie.php?id=<?= $movie->id ?>" class="btn btn-dark">Avaliar</a>
               <a href="movie.php?id=<?= $movie->id ?>" class="btn btn-warning">Conhecer</a>
               </div>
             </div>
         </div>
