
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
        if(!empty($movieid))
        {
            $stmt = $this->conn->prepare("SELECT * FROM reviews WHERE movie_id=:movie_id");
            $stmt->bindParam(":movie_id",$movieid);
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                $reviewdata = $stmt->fetchAll();
                $review = $this->buildReview($reviewdata);
                return $review;
            }
        }
    }
    public function create(Review $review)
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
    public function update(Review $review){}
    public function destroy($id){}

    public function hasAlreadyReviewed($id, $userId){}
    public function getRatings($id){}
}