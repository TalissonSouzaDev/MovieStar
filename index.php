
<?php 
 require_once ('globais.php');
 require_once ('db.php');
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
   <header>
    <nav id="main-navbar" class="navbar navbar-expand-lg">
        <a href="" class="navbar-brand">Logo</a>
        <span id="moviestar-title">Movies</span>

        <button class="navbar-toggler" type="button" data-toggle="collpse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fas-bars"></i>
        </button>
        <form action="" method="get" id="search" class="form-inline my-2 my-lg-0">
            <input type="search" name="q" id="search" class="form-control mr-sm-2" placeholder="Buscar Filmes" aria-label="Search">
            <button type="submit" class="btn my2 my-sm-0"> <i class="fas fa-search"></i></button>

        </form>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <ul class="nav-item">
                    <a href="auth.php" class="nav-link">Entrar / Cadastrar</a> 
                </ul>
            </ul>
        </div>
    </nav>
   </header>


   <div id="main-container" class="container-fluid">
    <h1>Corpo do site</h1>
   </div>

   <footer id="footer">
    <div class="social-container">
        <ul>
            <li>
                <a href=""><i class="fab fa-facebook-square"></i></a>
            </li>
            <li>
                <a href=""><i class="fab fa-instagram"></i></a>
            </li>
            <li>
                <a href=""><i class="fab fa-youtube"></i></a>
            </li>
        </ul>
    </div>

    <div id="footer-links-container">
        <ul>
            <li><a href="">Adiconar Filme</a></li>
            <li><a href="">Adiconar Criticas</a></li>
            <li><a href="">Entrar / Registrar</a></li>
        </ul>
    </div>
    <p>&copy; 2023 Talisson Souza</p>
   </footer>
</body>
</html>