<?php
namespace App\Controllers;

class MinatBakatControllers
{

    public function MinatBakat()
    {
        require_once '../app/views/PilihMinatBakat/MinatBakat.php';
    }

    public function show(string $id)
    {
        require_once '../app/views/students/show.php';
    }

}