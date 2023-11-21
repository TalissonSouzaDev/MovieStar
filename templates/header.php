<?php
ob_start();
session_start();
require_once('./globais.php');
require_once('./db.php');
require_once('./Models/Message.php');
require_once('./dao/UserDAO.php');

$message = new Message();
$flashmessage = $message->GetMessage();

if(!empty($flashmessage['msg']))
{
    $message->ClearMessage();
}

$userdao =  new UserDAO($conn);
$userdata = $userdao->verifyToken(false);




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieStar</title>

    <!-- CSS PROJETO -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.css" integrity="sha512-r0fo0kMK8myZfuKWk9b6yY8azUnHCPhgNz/uWDl2rtMdWJlk7gmd9socvGZdZzICwAkMgfTkVrplDahQ07Gi0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--  Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Javascript  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.js" integrity="sha512-ipBeSMCnlAvS4AEbycy0nTk9KkYr5lUJwFHNvf4IxtV/CDW4qx53mZKUryWtNr6GFaBl11EXyrU6iE3mo6ib2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <header class="">
        <nav class="navbar navbar-container navbar-expand navbar-dark bg-dark">




            <div class="container-fluid">
                <a class="navbar-brand" href="javascript:void(0)">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">


                    <form class="d-flex">
                        <input class="form-control" type="text" placeholder="Search">
                        <button class="btn btn-primary" type="button">Search</button>
                    </form>


                    <ul class="navbar-nav d-flex">
                    <?php if($userdata): ?>
                        <li class="nav-item"><a href="newmovie.php" class="nav-link"><i class="far fa-plus-square"></i> Incluir Filmes</a></li>
                        <li class="nav-item"><a href="dashboard.php" class="nav-link">Meus Filmes</a></li>
                        <li class="nav-item"><a href="editprofile.php" class="nav-link bold"><?php echo strtoupper($userdata->name); ?></a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link">Sair</a></li>
                       
                         
                                <?php echo $userdata->name; ?>
                            <?php else: ?>
                                <a class="nav-link" href="auth.php">Entrar | Registrar</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <div id="main-container" class="container-fluid">

        <?php if (!empty($flashmessage['msg'])) : ?>


            <div class="alert <?php echo $flashmessage['type'];  ?> alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert">
                </button>

                <span class="text-dark">
                <?php echo @$flashmessage['msg']; ?>
                </span>
             
            </div>
        <?php endif; ?>