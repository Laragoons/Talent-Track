<?php
namespace App\Controllers;

class usersControllers
{
    public function Profile()
    {
        require_once '../app/views/Users/Profile.php';
    }

    public function Register()
    {
        require_once '../app/views/Users/Register.php';
    }
    public function Login()
    {
        require_once '../app/views/Users/Login.php';
    }

    public function show(string $id)
    {
        require_once '../app/views/students/show.php';
    }

}