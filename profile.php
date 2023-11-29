<?php
 require_once("./templates/header.php");
 require_once("./dao/MovieDAO.php");

$moviedao =  new MovieDao($conn);
$id = filter_input(INPUT_GET, "id");
$user = new User();

if(empty($id))
{
    if(!empty($userdata->id))
    {
        $id = $userdata->id;
    }
    else
    {
        $message->SetMessage("Usuário Não encontrado!","alert-danger",'index.php');

    }
}

else
{
    $userdata =  $userdao->findById($id);
    
    if(!$userdata)
    {
        $message->SetMessage("Usuário Não encontrado!","alert-danger",'index.php');
    }
}

$fullname = $user->fullname($userdata);

if($userdata->image == ""){
  $userdata->image = "user_cover.png";
}

// filme que o usuario adicionou

$userMovies = $moviedao->getMoviesByUserId($id);
 
 ?>


<div class="main-container profile" id="container-fluid">
    <div class="col-md-8 offset-md-2">
        <div class="profile-container">
            <div class="col-md-12 profiledata">
                <h1 class="page-title"><?= $fullname ?></h1>
                <img src="./img/user/<?= $userdata->image ?>" alt="user">
                <h3 class="about-title">Sobre:</h3>
                <?php if(!empty($userdata->bio)): ?>
                    <p class="profile-description"><?= $userdata->bio ?></p>
                <?php else: ?>
                    <p class="profile-description">o usuario ainda não escreveu nada 😜</p>

                <?php endif; ?>
            </div>

            <div class="col-md-4 added-movies-container">
                <h3>Filmes que Enviou:</h3>
                    <?php 
                          echo "<div class='movie_card'>";
                          foreach($userMovies as $movie): 
                             include("./templates/movie_card.php");
                          endforeach;
                          echo "</div>";
                        ?>
            </div>
        </div>
    </div>
</div>

 <?php
 require_once("./templates/footer.php");
 ?>