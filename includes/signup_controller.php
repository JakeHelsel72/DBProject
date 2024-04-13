<?php

declare(strict_types=1);

function is_input_empty(string $username, string $password) : bool 
{
    if (empty($username) || empty($password)){
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username){
   if(get_username($pdo, $username)){
    return true; // got username, therefore it exists already
   } else {
    return false;
   }
}