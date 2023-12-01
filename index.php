
<?php
 require_once("./templates/header.php");
 require_once("dao/MovieDAO.php");
 require_once("dao/ReviewDAO.php");


 $search = filter_input(INPUT_GET,"search");
 $moviedao = new MovieDao($conn);
 $reviewdao = new ReviewDao($conn);
 $lastetMovie = $moviedao->getLatestMovie();

 $actionMovie = $moviedao->getMoviesByCategory("Ação");

 $comedyMovie = $moviedao->getMoviesByCategory("Comèdia");

 $DramaMovie = $moviedao->getMoviesByCategory("Drama");

if(!empty($search))
{
   $searchFilter = $moviedao->findByTitle($search);
   
}

 //print_r($lastetMovie);exit;
 ?>

   <div class="index_list">

   <ul>
    <?php if(isset($searchFilter)): ?>
      <li>
         <h1>Filtro: <?= $search ?></h1>
         
         <?php 
     
         if(count($searchFilter) > 0)
         {
           

            echo "<div class='movie_card'>";
            foreach($searchFilter as $movie): 
               include("./templates/movie_card.php");
            endforeach;
            echo "</div>";
         }
         else
         {
            echo "<span>Filme Não encontrado!</span>";
         }

            ?>
      </li>

    <?php else: ?>
      <li>
         <h1>Filmes Novos</h1>
         <?php 
         if(count($lastetMovie) > 0)
         {
           

            echo "<div class='movie_card'>";
            foreach($lastetMovie as $movie): 
               include("./templates/movie_card.php");
            endforeach;
            echo "</div>";
         }
         else
         {
            echo "<span>Não Ha Filmes cadastrado</span>";
         }

            ?>
      </li>


      <li>
         <h1>Filmes de Ação</h1>
      

         <?php 
         if(count($actionMovie) > 0)
         {
           
            echo "<div class='movie_card'>";
            foreach($actionMovie as $movie): 
               include("./templates/movie_card.php");
            endforeach;
            echo "</div>";
         }
         else
         {
            echo "<span>Não Ha Filmes cadastrado</span>";
         }

            ?>
      </li>

      <li>
         <h1>Filmes de Comedia</h1>
      

         <?php 
         if(count($comedyMovie) > 0)
         {
            echo "<div class='movie_card'>";
            foreach($comedyMovie as $movie): 
               include("./templates/movie_card.php");
            endforeach;
            echo "</div>";
         }
         else
         {
            echo "<span>Não Ha Filmes cadastrado</span>";
         }

            ?>
      </li>


      <li>
         <h1>Filmes de Drama</h1>
      

         <?php 
         if(count($DramaMovie) > 0)
         {
            echo "<div class='movie_card'>";
            foreach($DramaMovie as $movie): 
               include("./templates/movie_card.php");
            endforeach;
            echo "</div>";
         }
         else
         {
            echo "<span>Não Ha Filmes cadastrado</span>";
         }

            ?>
      </li>

   <?php endif; ?>
   
   </ul>

   </div>
   

 <?php
 require_once("./templates/footer.php");
 ?>