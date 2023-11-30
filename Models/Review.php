
<?php
class Review
{
    public $id;
    public $review;
    public $rating;
    public $user_id;
    public $movie_id;

}


interface interfaceReview
{
    public function buildReview($data);
    public function getMoviewsReview($id);
    public function create($review);
    public function update(Review $review);
    public function destroy($id);
    public function hasAlreadyReviewed($id, $userId);
    public function getRatings($id);

}


?>