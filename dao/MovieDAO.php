
<?php
ob_start();
@session_start();
require_once("models/Movie.php");
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
        $movie->length = $data['id'];
        $movie->category = $data['category'];
        $movie->trailer = $data['trailer'];
        $movie->description = $data['description'];
        $movie->user_id = $data['user_id'];

        return $movie;
    }


    public function findAll(){}
    public function getLatestMovie(){}
    public function getMoviesByCategory($category){}
    public function findById($id){}
    public function findByTitle($title){}
    public function Create(Movie $movie){}
    public function update(Movie $movie){}
    public function destroy($id){}

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
  
        imagejpeg($imagefile,"./img/movie/". $imageName, 100);

  
       return $imageName;
  
       }
       else
       {

        print_r('wrror');exit;
        $this->message->SetMessage("tipo invalido insira png,jpeg ou jpg","alert-danger","editprofile.php");
       }
      }

      else
      {
        print_r('wrror 01');exit;
      }
    

    }


}