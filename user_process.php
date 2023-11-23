<?php
require_once("db.php");
require_once("Models/User.php");
require_once("Models/Message.php");
require_once("dao/UserDAO.php");



$Message = new Message();
$UserDao = new UserDao($conn);

$userdata = $UserDao->verifyToken();
$user = new User();


 $type = filter_input(INPUT_POST, "type");

 if($type == "update")
 {

    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $bio = filter_input(INPUT_POST, "bio");


   
    $userdata->name = $_POST['name'];
    $userdata->lastname = $_POST['lastname'];
    $userdata->email = $_POST['email'];
    $userdata->bio = $_POST['bio'];

    // image
 if(isset($_FILES['image']))
 {
   $imageName = $UserDao->Image($_FILES['image']);  
   $userdata->image = $imageName;
 }

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
   $password = filter_input(INPUT_POST, "password");
   $newpassword = filter_input(INPUT_POST, "newpassword");
   $newconfimpassword = filter_input(INPUT_POST, "newconfimpassword");



   $password_verif =  password_verify($password,$userdata->password);
   if($password_verif)
   {
      if($newpassword == $newconfimpassword)
      {

       
         $user = new User();
         $userdata->password = $user->generatePassword($newpassword);
         //print_r($userdata->password);
         $passwordok = $UserDao->changePassword($userdata);
         if($passwordok)
         {
            $Message->SetMessage("a senha foi alterada com sucesso","alert-success","editprofile.php");
         }


      }

      else
      {
         $Message->SetMessage("a senha nova tem que ser igual a de confirmação","alert-danger","editprofile.php");
      }
   }
   else
   {
      $Message->SetMessage("Senha Atual Incorreta","alert-danger","editprofile.php");
   }
 }

 else
 {
    $Message->SetMessage("Ops.. Algum deu errado","alert-danger","editprofile.php");
 }