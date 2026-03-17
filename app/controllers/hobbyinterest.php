<?php
namespace App\Controllers;

class hobbyinterest
{

    public function home()
    {
        require_once '../app/views/hobby/index.php';
    }

    public function detail()
    {
        require_once '../app/views/hobby/index.php/detail.php';
    }

    public function show(string $id)
    {
        require_once '../app/views/students/show.php';
    }

}