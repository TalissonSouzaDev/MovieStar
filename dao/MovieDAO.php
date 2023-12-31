
<?php
ob_start();
@session_start();
require_once("models/Movie.php");
require_once("./dao/UserDAO.php");
require_once("Models/Message.php");



class MovieDao implements IMovie
{

    private $conn,$message;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
        $this->message = new Message();
    }

    public function buildMovie($data)
    {
        $movie = new Movie();
        $movie->id = $data['id'];
        $movie->title = $data['title'];
        $movie->image = $data['image'];
        $movie->length = $data['length'];
        $movie->category = $data['category'];
        $movie->trailer = $data['trailer'];
        $movie->description = $data['description'];
        $movie->user_id = $data['user_id'];

        return $movie;
    }


    public function findAll(){}

    public function myfiles()
    {

      $userdao = new UserDao($this->conn);
      $user = $userdao->verifyToken(false);

      $movies= [];

      $stmt = $this->conn->prepare("SELECT * FROM movies WHERE user_id = :user_id ORDER BY id DESC");
      $stmt->bindParam(":user_id",$user->id);
      $stmt->execute();
      if($stmt->rowCount() > 0)
      {
        $moviearray = $stmt->fetchAll();
        foreach($moviearray as $movie)
        {
          $movies[] = $this->buildMovie($movie);
        }
      }

      return $movies;

    }
    public function getLatestMovie()
    {
      $movies= [];
      $stmt = $this->conn->query("SELECT * FROM movies ORDER BY id DESC");
      $stmt->execute();

      if($stmt->rowCount() > 0)
      {
        $moviearray = $stmt->fetchAll();
        foreach($moviearray as $movie)
        {
          $movies[] = $this->buildMovie($movie);
        }
      }
      return $movies;
    }




    public function getMoviesByUserId($id)
    {

      $userdao = new UserDao($this->conn);
      $user = $userdao->verifyToken(false);

      $movies= [];

      $stmt = $this->conn->prepare("SELECT * FROM movies WHERE user_id = :user_id ORDER BY id DESC");
      $stmt->bindParam(":user_id",$id);
      $stmt->execute();
      if($stmt->rowCount() > 0)
      {
        $moviearray = $stmt->fetchAll();
        foreach($moviearray as $movie)
        {
          $movies[] = $this->buildMovie($movie);
        }
      }

      return $movies;

    }
    public function getMoviesByCategory($category)
    {
  
      $movies= [];

      $stmt = $this->conn->prepare("SELECT * FROM movies WHERE category = :category LIMIT 4");
      $stmt->bindParam(":category",$category);
      $stmt->execute();
      if($stmt->rowCount() > 0)
      {
        $moviearray = $stmt->fetchAll();
        foreach($moviearray as $movie)
        {
          $movies[] = $this->buildMovie($movie);
        }
      }

      return $movies;
    }
    public function findById($id)
    {
      $stmt = $this->conn->prepare("SELECT * FROM movies WHERE id = :id");
      $stmt->bindParam(":id",$id);
      $stmt->execute();

      if($stmt->rowCount() > 0)
      {
        $moviedata = $stmt->fetch();
        $movie = $this->buildMovie($moviedata);

        return $movie;
      }
    }
    public function findByTitle($title)
    {
      $movies = [];
      $titleName = "%{$title}%";
      $stmt = $this->conn->prepare("SELECT * FROM movies WHERE title LIKE :title");
      $stmt->bindParam(":title",$titleName);
      $stmt->execute();

      if($stmt->rowCount() > 0)
      {
        $moviearray = $stmt->fetchAll();

        foreach($moviearray as $movie){
          $movies[] = $this->buildMovie($movie);
        }
       
      }

      return $movies;
    }
    public function Create(Movie $movie)
    {
      $sql = "INSERT INTO movies (title,description,image,trailer,category,length,user_id) VALUES (:title,:description,:image,:trailer,:category,:length,:user_id)";
      $stmt = $this->conn->prepare($sql);
      //  d***************************
      $stmt->bindParam(":title",$movie->title);
      $stmt->bindParam(":description",$movie->description);
      $stmt->bindParam(":image",$movie->image);
      $stmt->bindParam(":trailer",$movie->trailer);
      $stmt->bindParam(":category",$movie->category);
      $stmt->bindParam(":length",$movie->length);
      $stmt->bindParam(":user_id",$movie->user_id);
      $stmt->execute();

      return true;
    }
    public function update(Movie $movie)
    {

      $sql = "UPDATE movies SET title= :title,length= :length , trailer= :trailer, category= :category,description= :description,image= :image,user_id= :user_id WHERE id= :id ";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id",$movie->id);
      $stmt->bindParam(":title",$movie->title);
      $stmt->bindParam(":length",$movie->length);
      $stmt->bindParam(":trailer",$movie->trailer);
      $stmt->bindParam(":category",$movie->category);
      $stmt->bindParam(":description",$movie->description);
      $stmt->bindParam(":image",$movie->image);
      $stmt->bindParam(":user_id",$movie->user_id);
      $stmt->execute();


      if($stmt->rowCount() > 0)
      {
        return true;
      }

      else {
        return false;
      }
    }
    public function destroy($id)
    {
      try {
        $moviedata = $this->findById($id);
      $stmt = $this->conn->prepare("DELETE FROM movies WHERE id = :id ");
      $stmt->bindParam(":id",$moviedata->id);
      $stmt->execute();
      return true;
      }

      catch (Exception $e)
      {
        return false;
      }
    }

    public function ImageMovie($imagePost)
    {
        if(!empty($imagePost['tmp_name']))
      {

       $image = $imagePost;
       $imagetype= ["image/jpeg","image/jpg","image/png"];
       $jpgarray =   ["image/jpeg","image/jpg"];
  
       // checagem de tipo de image
       if(in_array($image['type'],$imagetype))
       {
        if(in_array($image['type'],$jpgarray))
        {
           // imagem é png
           $imagefile = imagecreatefromjpeg($image['tmp_name']);
        }
  
        else
        {
           $imagefile = imagecreatefrompng($image['tmp_name']);
        }

        $movie = new Movie();
  
        $imageName = $movie->generateimage();
  
        imagejpeg($imagefile,"./img/movies/". $imageName, 100);

  
       return $imageName;
  
       }
       else
       {
        $this->message->SetMessage("tipo invalido insira png,jpeg ou jpg","alert-danger","index.php");
       }
      }

      else
      {
        $this->message->SetMessage("Error","alert-danger","index.php");
      }
    

    }


}