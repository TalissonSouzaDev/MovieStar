<?php
require_once("db.php");
require_once("Models/User.php");
require_once("Models/Message.php");
require_once("dao/UserDAO.php");



$Message = new Message();
$UserDao = new UserDao($conn);

$userdata = $UserDao->verifyToken();


 $type = filter_input(INPUT_POST, "type");

 if($type == "update")
 {

    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $bio = filter_input(INPUT_POST, "bio");


    $user = new User();
    $userdata->name = $_POST['name'];
    $userdata->lastname = $_POST['lastname'];
    $userdata->email = $_POST['email'];
    $userdata->bio = $_POST['bio'];
 

    $update = $UserDao->update($userdata);
    if($update)
    {
       
        $Message->SetMessage("Cadastro Atualizado com sucesso 👏","alert-success","editprofile.php");
    }
    else 
    {
        print_r("error");exit;
    }
    
 }

 elseif($type === "update-password")
 {
    print_r($_POST);exit;
 }

 else
 {
    $Message->SetMessage("Ops.. Algum deu errado","alert-danger","editprofile.php");
 }