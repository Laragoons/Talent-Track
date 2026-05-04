<?php
namespace App\Controllers;

class JobControllers
{
    public function detail(string $id)
    {
        require_once '../app/views/Job/detail.php';
    }
    public function Save()
    {
        require_once '../app/views/Job/Saved.php';
    }
    public function ListJob()
    {
        require_once '../app/views/Job/ListJob.php';
    }
}