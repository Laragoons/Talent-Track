<?php
namespace App\Controllers;

class PekerjaanControllers
{
    public function detail(string $id)
    {
        require_once '../app/views/Pekerjaan/detail.php';
    }
    public function Save()
    {
        require_once '../app/views/Pekerjaan/Saved.php';
    }
    public function List()
    {
        require_once '../app/views/Pekerjaan/ListPekerjaan.php';
    }

    public function show(string $id)
    {
        require_once '../app/views/students/show.php';
    }
}