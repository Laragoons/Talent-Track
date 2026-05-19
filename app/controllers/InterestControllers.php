<?php
namespace App\Controllers;

class InterestControllers
{
    public function Interest()
    {
        require_once '../app/views/ChooseInterest/Interest.php';
    }

    public function saveInterests()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Not logged in']);
            exit;
        }

        require_once '../app/config/connection.php';

        $body      = file_get_contents('php://input');
        $data      = json_decode($body, true);
        $interests = $data['interests'] ?? [];

        if (empty($interests)) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'No interests selected']);
            exit;
        }

        $user_id = $_SESSION['user_id'];

        mysqli_query($conn, "DELETE FROM user_interests WHERE user_id = $user_id");

        foreach ($interests as $interestName) {
            $safeName = mysqli_real_escape_string($conn, trim($interestName));
            $result   = mysqli_query($conn, "SELECT id FROM interests WHERE name = '$safeName'");
            if (mysqli_num_rows($result) > 0) {
                $row         = mysqli_fetch_assoc($result);
                $interest_id = $row['id'];
                mysqli_query($conn, "INSERT INTO user_interests (user_id, interest_id) VALUES ($user_id, $interest_id)");
            }
        }

        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    }

    public function deleteInterest()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Not logged in']);
            exit;
        }

        require_once '../app/config/connection.php';

        $body = file_get_contents('php://input');
        $data = json_decode($body, true);
        $name = trim($data['name'] ?? '');

        if (empty($name)) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'No interest name provided']);
            exit;
        }

        $user_id  = $_SESSION['user_id'];
        $safeName = mysqli_real_escape_string($conn, $name);

        $result = mysqli_query($conn, "SELECT id FROM interests WHERE name = '$safeName'");

        if (mysqli_num_rows($result) === 0) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Interest not found']);
            exit;
        }

        $row         = mysqli_fetch_assoc($result);
        $interest_id = $row['id'];

        mysqli_query($conn, "DELETE FROM user_interests WHERE user_id = $user_id AND interest_id = $interest_id");

        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    }
}