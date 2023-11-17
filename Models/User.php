


<?php

class User {

    public $id;
    public $name;
    public $email;
    public $lastname;
    public $password;
    public $image;
    public $bio;
    public $token;

}

interface UserDaoInterface {
    public function buildUser($data): array;
    public function create(User $user, $authUser = false);
    public function update(User $user);
    public function verifyToken($protected = false);
    public function setTokenToSession($oken, $redirect = true);
    public function authenticateUser($email,$password);
    public function findByEmail($email);
    public function findById($id);
    public function findByToken($token);
    public function changePassword(User $user);
}