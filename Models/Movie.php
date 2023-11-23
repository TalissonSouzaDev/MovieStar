<?php

class Movie
{


    public $id;
    public $title;
    public $image;
    public $length;
    public $category;
    public $trailer;
    public $description;
    public $user_id;

    
    public function generateimage()
    {
        return bin2hex(random_bytes(60)) . ".jpg";

    }

}


interface IMovie 
{

    public function buildMovie($data);
    public function findAll();
    public function getLatestMovie();
    public function getMoviesByCategory($category);
    public function findById($id);
    public function findByTitle($title);
    public function Create(Movie $movie);
    public function update(Movie $movie);
    public function destroy($id);
    public function ImageMovie($imagePost);
 

}