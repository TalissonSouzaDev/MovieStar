<?php

require_once("db.php");
require_once("Models/Review.php");
require_once("Models/Message.php");
require_once("dao/ReviewDAO.php");
require_once("dao/UserDAO.php");



$Message = new Message();
$ReviewDao = new ReviewDao($conn);

// usuario autenticado
$UserDao = new UserDao($conn);
$user = $UserDao->verifyToken(false);




$type = filter_input(INPUT_POST, "type");

if($type == "create")
{
    $type = filter_input(INPUT_POST, "type");
    $movie_id = filter_input(INPUT_POST, "movie_id");
    $user_id = filter_input(INPUT_POST, "user_id");
    $rating = filter_input(INPUT_POST, "rating");
    $review = filter_input(INPUT_POST, "review");

    if(empty($review))
    {
        $Message->SetMessage("No comentario você precisa pelo menos ter acima de 1 caracter ","alert-info","movie.php?id=${movie_id}");
    }

    // operação de create
     $reviewdata = new Review();
     $reviewdata->rating = $rating;
     $reviewdata->review = $review;
     $reviewdata->user_id = $user_id;
     $reviewdata->movie_id = $movie_id;
     $reviewProcess = $ReviewDao->create($reviewdata);
    if($reviewProcess)
    {
        $Message->SetMessage("Comentario adicionado com sucesso 👏","alert-success","movie.php?id=${movie_id}");
    }
    else {
        $Message->SetMessage("algum deu errado 😞","alert-danger","movie.php?id=${movie_id}");
    }

   
}