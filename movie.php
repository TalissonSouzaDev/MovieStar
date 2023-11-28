<?php
require_once("./templates/header.php");
require_once("models/Movie.php");
require_once("dao/MovieDAO.php");

// PEGA O ID DO FILME

$id = filter_input(INPUT_GET,"id");
$movie;

$moviedao = new MovieDao($conn);

if(empty($id))
{
    $message->SetMessage("Filme não encontrado!","alert-warning","index.php");
}
else 
{
    $movie = $moviedao->findById($id);

    // verificar se o filme exister
    if(!$movie)
    {
        $message->SetMessage("Filme não encontrado!","alert-warning","index.php");
    }

}

if(empty($movie->image))
{
    $movie->image = "movie_cover.jpeg";
}

$userOwnsMovie = false;

if(!empty($userdata))
{
    if($userdata->id === $movie->user_id)
    {
        $userOwnsMovie = true; 
    }
}

$alreadyReviewed = true;


?>


<div class="moviereview">
    <div class="row">
        <div class="offset-md-1 col-md-6 movie-container">
            <h1 class="page-title"><?= $movie->title ?></h1>
            <p class="movie-details">
                <span>Duração: <?= $movie->length ?></span>
                <span class="pipe"></span>
                <span> <?= $movie->category ?></span>
                <span class="pipe"></span>
                <span><i class="fas fa-star"></i> 9</span>
            </p>


            <iframe src="<?= $movie->trailer ?>" width="800" height="500"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encryted-media;
            gyroscope; picture-in-picture" allowfullscreen ></iframe>
            <p><?=$movie->description ?></p>
            
        </div>

        <div class="col-md-4">
           <img src="./img/movies/<?= $movie->image ?>" alt="<?= $movie->title ?>" srcset="" width="560">
        </div>
        <div class="offset-md-1 col-md-10" id="reviews-container">
            <h3>Avaliações:</h3>
            <!-- verifica se habilita a review -->
           
            <div class="col-md-12" id="review-form-container">
            <?php if(!empty($userdata) && !$userOwnsMovie && $alreadyReviewed): ?>
                <h4>Envie sua avalição:</h4>
                <p class="page-description">Preencha o formulario com a nota e comentario sobre o filme</p>

                <form action="review_process.php" method="post">
                    <input type="hidden" name="type" value="create">
                    <input type="hidden" name="movie_id" value="<?=$movie->id ?>">
                    <div class="form-group">
                        <label for="rating">Nota do filme:</label>
                        <select name="rating" id="rating" class="form-select">
                            <option value="">Selecione uma nota</option>
                            <option value="10">10</option>
                            <option value="9">9</option>
                            <option value="8">8</option>
                            <option value="7">7</option>
                            <option value="6">6</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="review">Seu Comentário:</label>
                        <textarea name="review" id="" rows="3" class="form-control"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-warning">Enviar Comentario</button>
                </form>
                <?php elseif(!$userOwnsMovie): ?>
                <h4>Para comenta você precisa esta logado!</h4>
                <a href="auth.php" class="btn btn-warning">Fazer Login / Registra-se</a>

                <?php else: ?>


                <?php endif; ?>

            </div>
     
            <br>

            <!-- comentario-->
            <div class="col-md-12 review">
                <div class="row">
                    <div class="col-md-1">
                        <img src="./img/user/user_cover.png" alt="" srcset="" width="100">

                    </div>
                    <div class="col-md-9 author-details-container">
                        <h4 class="author-name">
                            <a href="#">Talisson souza</a>
                        </h4>
                        <p>Nota: <i class="fas fa-star"></i> 9</p>
                    </div>

                    <div class="col-md-12">
                        <p class="commnet-title">Comentário:</p>
                        <p>Este é comentario do usuario</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

 

<?php
require_once("./templates/footer.php");
?>