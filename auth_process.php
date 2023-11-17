<?php
require_once("db.php");
require_once("Models/User.php");
require_once("Models/Message.php");
require_once("dao/UserDAO.php");


$UserDao = new UserDao($conn,"header");
$Message = new Message("");


 // verifica o formulario

 $type = filter_input(INPUT_POST, "type");

 if($type == "register")
 {
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirm_password = filter_input(INPUT_POST, "confirm_password");

    if($password == $confirm_password)
    {
        $data = [ 
            "name" => $name,
            "lastname" => $lastname,
            "email" => $email,
            "password" => $password,

        ];

        //$datauser = $UserDao->buildUser($data);

        print_r($data);
    }

    else {
        $Message->SetMessage("As senha não são iguais","alert-warning","auth.php");

     }
 }
 elseif ($type == "autenticar")
 {

    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    print_r($type);
 }

 else{
    echo "Não encontrado";
 }