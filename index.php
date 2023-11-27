
<?php
 require_once("./templates/header.php");
 require_once("dao/MovieDAO.php");


 $moviedao = new MovieDao($conn);
 $lastetMovie = $moviedao->getLatestMovie();

 $actionMovie = $moviedao->getMoviesByCategory("Ação");

 $comedyMovie = $moviedao->getMoviesByCategory("Comèdia");

 $DramaMovie = $moviedao->getMoviesByCategory("Drama");

 //print_r($lastetMovie);exit;
 ?>

   <div class="index_list">

   <ul>
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
           
            foreach($actionMovie as $movie): 
               include("./templates/movie_card.php");
            endforeach;
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
         
            foreach($comedyMovie as $movie): 
               include("./templates/movie_card.php");
            endforeach;
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
            echo "<span>Veja as criticas dos ultimos filmes adicionado</span>";
            foreach($DramaMovie as $movie): 
               include("./templates/movie_card.php");
            endforeach;
         }
         else
         {
            echo "<span>Não Ha Filmes cadastrado</span>";
         }

            ?>
      </li>

   
   </ul>

   </div>
   

 <?php
 require_once("./templates/footer.php");
 ?>