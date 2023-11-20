<?php

require_once("templates/header.php");

if($userdata){
    $userdao->destroytoken();
}