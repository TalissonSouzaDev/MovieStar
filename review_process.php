<?php

require_once("db.php");
require_once("Models/Movie.php");
require_once("Models/Message.php");
require_once("dao/ReviewDAO.php");
require_once("dao/UserDAO.php");



$Message = new Message();
$ReviewDao = new ReviewDao($conn);

// usuario autenticado
$UserDao = new UserDao($conn);
$user = $UserDao->verifyToken(false);




$type = filter_input(INPUT_POST, "type");