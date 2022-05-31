<?php

function checkAuth(string $login, string $password): bool
{
    $users = require __DIR__.'/usersDB.php';

    foreach($users as $user){
        if ($login === $user['login'] && $password === $user['password'])
        {
            return true;
        }
        
        return false;
    }
}

function getUserLogin(): ?string //?string означает, что указанные параметры и возвращаемые значения, могут быть как указанного типа, так и null
{
    $loginFromCookie = $_COOKIE['login'] ?? '';
    $passwordFromCookie = $_COOKIE['password'] ?? '';

    if(checkAuth($loginFromCookie, $passwordFromCookie))
    {
        return $loginFromCookie;
    }

    return null;
}