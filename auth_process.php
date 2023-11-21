<?php
require_once("db.php");
require_once("Models/User.php");
require_once("Models/Message.php");
require_once("dao/UserDAO.php");



$Message = new Message();
$UserDao = new UserDao($conn);


 // verifica o formulario

 $type = filter_input(INPUT_POST, "type");

 if($type == "register")
 {
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirm_password = filter_input(INPUT_POST, "confirm_password");

    // verificar se os dados estão em branco
    if(!empty($name) && !empty($lastname) && !empty($email))
    {
 // verificar se as senha são iguais
    if($password == $confirm_password)
      {
        if($UserDao->findByEmail($email) == false)
         {

      try {
        $user= new User();
        $user->name = $name;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->password = $user->generatePassword($password);
        $user->token = $user->generateToken();

        $auth = true;

        $registertrue = $UserDao->create($user);

        if($registertrue)
        {
            return $UserDao->SetTokenToSession($user->token);
        }

        //return print_r($registertrue);
      }

      catch (Exception $e)
       {
         echo 'Exceção capturada: ',  $e->getMessage(), "\n";
       }

    
      
     }
     else
     {
        // message
        echo "cadastro ativo";
     }

    }

        //$datauser = $UserDao->buildUser($data);
    }

    else {

        //print_r("aqui");
        $Message->SetMessage("As senha não são iguais","alert-warning","auth.php");

     }
 }
 elseif ($type == "autenticar")
 {

    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    
    if(!empty($email) && !empty($password))
    { 
        $UserDao->authenticateUser($email,$password);
          
    }

    else 
    {
      $Message->SetMessage("Login ou senha incorreto","alert-danger","auth.php");
    }
 }

 else{
    echo "Não encontrado";
 }