<?php
ob_start();
@session_start();
require_once("models/User.php");
require_once("Models/Message.php");


class UserDao implements UserDaoInterface
{

    private $conn,$message;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
        $this->message = new Message();
    }


    public function buildUser($data)
    {
        $user = new User();
        $user->id = $data['id'];
        $user->name = $data['name'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->image = $data['image'];
        $user->bio = $data['bio'];
        $user->token = $data['token'];

        return $user;
    }
    public function create(User $user)
    {
      try {
        $stmt = $this->conn->prepare(
            "INSERT INTO users (name,lastname,email,password,token)
            values (:name,:lastname,:email,:password,:token)
           
           
           ");
    
           $stmt->bindParam(":name",$user->name);
           $stmt->bindParam(":lastname",$user->lastname);
           $stmt->bindParam(":email",$user->email);
           $stmt->bindParam(":password",$user->password);
           $stmt->bindParam(":token",$user->token);
           $stmt->execute();

           return true;
      }
      catch (Exception $e) {
        return false;
      }


    }
    public function update(User $user){}
    public function verifyToken($protected = false)
    {
        if(!empty($_SESSION['token']))
        {
            $token = $_SESSION['token'];
            $user = $this->findByToken($token);

            if($user)
            {
                return $user;
            }
            else if($protected)
            {
                header("location:index.php");
            }
          

        }
        else if($protected)
        {
            header("location:index.php");
        }
    }


    public function setTokenToSession($token,$redirect = true)
    {
        $_SESSION['token'] = $token;

        if($redirect)
        {
          $this->message->setMessage("Seja bem vindo", "alert-success", "editprofile.php");
        }
    }



    public function authenticateUser($email,$password)
    {
        if($email != "" && $password != "")
        {
            $user = $this->findByEmail($email);

            //print_r($user); exit;

            if($user != [])
            {
                //print_r('ok'); exit;
                $password_verif =  password_verify($password,$user->password);
                if($password_verif)
                {
                    //print_r($password_verif); exit;
                     // retornando por front
                     $this->setTokenToSession($user->token);
    
                }
                else
                {
                    // senha não conferir
                    $this->message->SetMessage("senha incorreta","alert-info","auth.php");
                }

            }
            else
            {
              $this->message->SetMessage("email não cadastrado","alert-info","auth.php");
            }
           
           

          }

          else {
            $user = [];
            return $user;
          }
      
    }

    public function findByEmail($email)
    {
        if($email != "")
        {
            // preparando para consulta
          $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
          $stmt->bindParam(":email",$email);
          $stmt->execute();
          // fazendo contagem de linha caso seja maior que 1 é verdadeira
          if($stmt->rowCount() > 0)
          {
            // chamando o objeto de array para data
            $data = $stmt->fetch();
            // typando ela com buildUser;

           // print_r($data);exit;
            $user = $this->buildUser($data);
            // retornando por front
            return $user;

          }

          else {
            $user = [];
            return $user;
          }

    }

    else{
        return false;
    }
}
    public function findById($id){

        if($id != "")
        {
            // preparando para consulta
          $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
          $stmt->bindParam(":id",$id);
          $stmt->execute();
          // fazendo contagem de linha caso seja maior que 1 é verdadeira
          if($stmt->rowCount() > 0)
          {
            // chamando o objeto de array para data
            $data = $stmt->fetch();
            // typando ela com buildUser;
            $user = $this->buildUser($data);
            // retornando por front
            return $user;

          }

          else {
            $user = [];
            return $user;
          }
    }

        
    }
    public function findByToken($token)
    {
        if($token != "")
        {
            // preparando para consulta
          $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");
          $stmt->bindParam(":token",$token);
          $stmt->execute();
          // fazendo contagem de linha caso seja maior que 1 é verdadeira
          if($stmt->rowCount() > 0)
          {
            // chamando o objeto de array para data
            $data = $stmt->fetch();
            // typando ela com buildUser;
            $user = $this->buildUser($data);
            // retornando por front
            return $user;

          }

          else {
            $user = [];
            return $user;
          }
    }

}


    public function changePassword(User $user){}

    public function destroytoken()
    {
     
       session_destroy();
       header("Location:index.php");
       
    }

}