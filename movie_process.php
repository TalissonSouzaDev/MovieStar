<?php

require_once("db.php");
require_once("Models/Movie.php");
require_once("Models/Message.php");
require_once("dao/MovieDAO.php");
require_once("dao/UserDAO.php");



$Message = new Message();
$MovieDao = new MovieDao($conn);

// usuario autenticado
$UserDao = new UserDao($conn);
$user = $UserDao->verifyToken(false);




$type = filter_input(INPUT_POST, "type");


if($type == "create")
{
    $title = filter_input(INPUT_POST, "title");
    $length = filter_input(INPUT_POST, "length");
    $description = filter_input(INPUT_POST, "description");
    $trailer = filter_input(INPUT_POST, "trailer");
    $category = filter_input(INPUT_POST, "category");

    $movie = new Movie();

    if(!empty($title) && !empty($description) && !empty($length) )
    {

       
        $movie->title = $title;
        $movie->length = $length;
        $movie->description = $description;
        $movie->trailer = $trailer;
        $movie->category = $category;
        $movie->user_id = $user->id;
        if(isset($_FILES['image']))
        {

            $imageName=  $MovieDao->imageMovie($_FILES['image']);
            $movie->image = $imageName;

        }

        $createmovie = $MovieDao->Create($movie);
        if($createmovie)
        {
            $Message->SetMessage("Filme Adicionado com sucesso","alert-success","myfiles.php");
        }
    }
    else
    {
        $Message->SetMessage("error campos em brancos","alert-danger","newmovie.php");
    }
   
   
}
elseif($type == "delete")
{
    $id = filter_input(INPUT_POST, "id");
    $movie = $MovieDao->findById($id);
    if($movie->user_id == $user->id)
    {
        $delete = $MovieDao->destroy($movie->id);
        if($delete)
        {
            $Message->SetMessage("Cartaz Deletado com sucesso","alert-success","myfiles.php");
        }
        else
        {
            $Message->SetMessage("Error Inesperado ","alert-danger","myfiles.php");
        }
    }

    else
    {
        $Message->SetMessage("esse cartaz não faz refencia ao seu usuario ","alert-danger","myfiles.php");
    }
}

elseif($type == "update")
{


    $id = filter_input(INPUT_POST, "id");
    $title = filter_input(INPUT_POST, "title");
    $length = filter_input(INPUT_POST, "length");
    $description = filter_input(INPUT_POST, "description");
    $trailer = filter_input(INPUT_POST, "trailer");
    $category = filter_input(INPUT_POST, "category");
    $movie = new Movie();

    if(!empty($title) && !empty($description) && !empty($length) )
    {

        $movie->id = $id;
        $movie->title = $title;
        $movie->length = $length;
        $movie->description = $description;
        $movie->trailer = $trailer;
        $movie->category = $category;
        $movie->user_id = $user->id;

      

       
        if(isset($_FILES['image']) && !empty($_FILES['image']['tmp_name']))
        {

            $imageName=  $MovieDao->imageMovie($_FILES['image']);
            $movie->image = $imageName;

        }
        else
        {
            $moviefind = $MovieDao->findById($id);
            if($moviefind->user_id == $user->id)
            {
                $movie->image = $moviefind->image;
                $updatemovie = $MovieDao->update($movie);
               
            if($updatemovie)
            {
                $Message->SetMessage("Filme Atualizado com sucesso","alert-success","myfiles.php");
            }

            else
            {
                $Message->SetMessage("algum deu errado","alert-danger","myfiles.php");
            }
            }

            else
            {
                $Message->SetMessage("Sem Permissão","alert-danger","myfiles.php");
            }

        }

      
    }
    else
    {
        $Message->SetMessage("error campos em brancos","alert-danger","newmovie.php");
    }
   

}
else
{
$Message->SetMessage("tipo Não encontrado ","alert-danger","index.php");
}