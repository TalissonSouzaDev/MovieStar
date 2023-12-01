<?php
require_once("./templates/header.php");
require_once("models/Movie.php");
require_once("dao/MovieDAO.php");
require_once("dao/ReviewDAO.php");

// PEGA O ID DO FILME

$id = filter_input(INPUT_GET,"id");
$review_id = filter_input(INPUT_GET,"review");

$movie;
$author;
$review_edit;
//$review_edit;

$moviedao = new MovieDao($conn);

// review
$reviewdao = new ReviewDao($conn);

// media
$rating = $reviewdao->getRatings($id);
// comentario
$comments =  $reviewdao->getMoviewsReview($id);
// edit pegando os dados
if($review_id)
{
    $review_edit = $reviewdao->getByIdEdit($review_id);
}




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

// pegando ou author
$author = $userdao->findById($movie->user_id);

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
       <div class="movietrailer">
       <div class="offset-md-1 col-md-6 movie-container">
            <h1 class="page-title"><?= $movie->title ?></h1>
            <p class="movie-details">
                <span>Duração: <?= $movie->length ?></span>
                <span class="pipe"></span>
                <br>
                <span>Categoria: <?= $movie->category ?></span>
                <span class="pipe"></span>
                <br>
                <span>Nota<i class="fas fa-star star"></i>: <?= $rating['rating'] > 0 ? number_format($rating['rating'],1,".") : "Sem Avaliação"  ?></span>
                <br>
                <span>Author: <a href="profile.php?id=<?= $movie->user_id ?>" class="text-white"><?php echo "{$author->name} {$author->lastname}"; ?></a></span>
            </p>


            <iframe src="<?= $movie->trailer ?>" width="800" height="500"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encryted-media;
            gyroscope; picture-in-picture" allowfullscreen ></iframe>
            <p><?=$movie->description ?></p>
            
        </div>

        <div class="col-md-4">
           <img src="./img/movies/<?= $movie->image ?>" alt="<?= $movie->title ?>" srcset="" width="560">
        </div>
       </div>
        <div class="offset-md-1 col-md-10" id="reviews-container">
            <h3>Avaliações:</h3>
            <!-- verifica se habilita a review -->
           
            <div class="col-md-12" id="review-form-container">
            <?php if(!empty($userdata) && !$userOwnsMovie && $alreadyReviewed): ?>
                <h4>Envie sua avalição:</h4>
                <p class="page-description">Preencha o formulario com a nota e comentario sobre o filme</p>

                <form action="review_process.php" method="post">
                    <input type="hidden" name="type" value="<?= !empty($review_edit) ? 'update' : "create" ?>">
                    <input type="hidden" name="movie_id" value="<?=$movie->id ?>">
                    <input type="hidden" name="user_id" value="<?= $userdata->id ?>">
                    <?php if(!empty($review_edit)): ?>
                        <input type="hidden" name="review_id" value="<?= $review_edit->id ?>">

                    <?php endif; ?>
                    <div class="form-group">
                        <label for="rating">Nota do filme:</label>
                        <select name="rating" id="rating" class="form-select">
                            <option value="<?= !empty($review_edit) ? $review_edit->rating : "" ?>"><?= !empty($review_edit) ? $review_edit->rating : "Selecione uma nota" ?></option>
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
                        <textarea name="review" id="" rows="3" class="form-control"><?= !empty($review_edit) ? $review_edit->review : "" ?></textarea>
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
          <?php foreach($comments as $comment): ?>
            <?php $user = $userdao->findById($comment->user_id); ?>
            <?php if($user->image == "") 
            {
                $user->image = 'user_cover.png';
            }?>
            <div class="col-md-12 review">
                <div class="row">
                    <div class="col-md-1">
                        <img src="./img/user/<?= $user->image ?>" alt="" srcset="" width="100">

                    </div>
                    <div class="col-md-9 author-details-container">
                        <h4 class="author-name">
                            <a href="profile.php?id=<?=$user->id?>" class="text-white"><?= $user->name." ".$user->lastname ?></a>
                        </h4>
                        <p>Nota: <i class="fas fa-star star"></i> <?= number_format($comment->rating,1,".",",");?></p>
                    </div>

                    <div class="col-md-12 comment-elements">
                        <p class="comment-title">Comentário: <br> <?= $comment->review ?></p>

                        <?php if(!empty($comment) && !empty($userdata) && $comment->user_id == $userdata->id): ?>
                            <div class="btn-comment">
                            <a href="movie.php?id=<?= $id ?>&review=<?= $comment->id ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edita</a>

                           <form action="review_process.php" method="post">
                               <input type="hidden" name="type" value="delete">
                               <input type="hidden" name="review_id" value="<?= $comment->id ?>">
                               <input type="hidden" name="movie_id" value="<?= $comment->movie_id ?>">
                               <button type="submit" class="btn btn-danger"> <i class="fas fa-times"></i> Excluir</button>
                          
                          </form>
                        
                        </div> 
                    <?php endif; ?>
                    </div>
                    <hr>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

 

<?php
require_once("./templates/footer.php");
?>