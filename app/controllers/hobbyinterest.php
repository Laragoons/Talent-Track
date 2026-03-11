<?php
namespace App\Controllers;

class hobbyinterest
{

    public function index()
    {
        require_once '../app/views/hobby/detail.php';
    }

    public function create()
    {
        require_once '../app/views/students/create.php';
    }

    public function show(string $id)
    {
        require_once '../app/views/students/show.php';
    }

}