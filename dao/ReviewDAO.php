
<?php
ob_start();
@session_start();
require_once("models/Review.php");
require_once("./dao/UserDAO.php");
require_once("Models/Message.php");


class ReviewDao implements interfaceReview
{
    protected $conn,$message;
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
        $this->message  = new Message();

        
    }
    public function buildReview($data)
    {
        $review = New Review();
        $review->id = $data['id'];
        $review->review = $data['review'];
        $review->rating = $data['rating'];
        $review->user_id = $data['user_id'];
        $review->movie_id = $data['movie_id'];

        return $review;
    }
    public function getMoviewsReview($movieid)
    {
        $reviews = [];
        if(!empty($movieid))
        {
            $stmt = $this->conn->prepare("SELECT * FROM reviews WHERE movie_id=:movie_id");
            $stmt->bindParam(":movie_id",$movieid);
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                $reviewsarray = $stmt->fetchAll();
                foreach($reviewsarray as $review)
                {
                  $reviews[] = $this->buildReview($review);
                }
            }
        }

        return $reviews;
    }
    public function create($review)
    {
       try 
       {
        
        $sql = "INSERT INTO reviews (review,rating,user_id,movie_id) VALUES (:review,:rating,:user_id,:movie_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":review",$review->review);
        $stmt->bindParam(":rating",$review->rating);
        $stmt->bindParam(":user_id",$review->user_id);
        $stmt->bindParam(":movie_id",$review->movie_id);
        $stmt->execute();
        return true;
       }
       catch(Exception $e)
       {
        return false;
       }
    }

    public function getByIdEdit($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM reviews WHERE id = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();       
        if($stmt->rowCount() > 0 )
        {
            $review = $stmt->fetch();
            return $this->buildReview($review);
        }
        else
        {
            return false;
        }

    }

    public function update(Review $review)
    {
        try 
       {
        $sql = "UPDATE reviews SET review = :review,rating = :rating WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id",$review->id);
        $stmt->bindParam(":rating",$review->rating);
        $stmt->bindParam(":review",$review->review);
        $stmt->execute();
        return true;
       }
       catch(Exception $e)
       {
        return false;
       }
    }
    public function destroy($id)
    {
       try {
        $stmt= $this->conn->prepare("DELETE FROM reviews WHERE id =:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return true;
       }
       catch(Exception $e)
       {
        return false;
       }
    }

    public function hasAlreadyReviewed($id, $userId){}
    public function getRatings($id)
    {

        $stmt = $this->conn->prepare("SELECT AVG(rating) as rating FROM reviews WHERE movie_id = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();       
        if($stmt->rowCount() > 0 )
        {
            $MediaRating = $stmt->fetch();
            return $MediaRating;
        }
        else
        {
            return 0;
        }
    }
}