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

    public function toggleSave()
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: /Login");
            exit;
        }

        require_once '../app/config/connection.php';

        $user_id   = $_SESSION['user_id'];
        $career_id = (int) ($_POST['career_id'] ?? 0);

        if ($career_id === 0) {
            header("Location: /Home");
            exit;
        }

        $cek = mysqli_query($conn, 
            "SELECT id FROM saved_careers 
             WHERE user_id = $user_id AND career_id = $career_id"
        );

        if (mysqli_num_rows($cek) > 0) {
            mysqli_query($conn, 
                "DELETE FROM saved_careers 
                 WHERE user_id = $user_id AND career_id = $career_id"
            );
        } else {
            mysqli_query($conn, 
                "INSERT INTO saved_careers (user_id, career_id) 
                 VALUES ($user_id, $career_id)"
            );
        }

        header("Location: /Home");
        exit;
    }
}