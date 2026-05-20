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

    public function prosesRegister()
    {
        require_once '../app/config/connection.php';

        $name     = trim($_POST['username'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm  = $_POST['confirm_password'] ?? '';

        if (empty($name) || empty($email) || empty($password) || empty($confirm)) {
            header("Location: /Register?error=Semua field harus diisi");
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: /Register?error=Format email tidak valid");
            exit;
        }

        if (strlen($password) < 6) {
            header("Location: /Register?error=Password minimal 6 karakter");
            exit;
        }

        if ($password !== $confirm) {
            header("Location: /Register?error=Password tidak cocok");
            exit;
        }

        $emailCheck = mysqli_real_escape_string($conn, $email);
        $cek = mysqli_query($conn, "SELECT id FROM users WHERE email = '$emailCheck'");
        if (mysqli_num_rows($cek) > 0) {
            header("Location: /Register?error=Email sudah terdaftar");
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $safeName  = mysqli_real_escape_string($conn, $name);
        $safeEmail = mysqli_real_escape_string($conn, $email);

        $query = "INSERT INTO users (name, email, password) 
                  VALUES ('$safeName', '$safeEmail', '$hashedPassword')";

        if (mysqli_query($conn, $query)) {
            header("Location: /Login?success=Registrasi berhasil! Silakan login");
            exit;
        } else {
            header("Location: /Register?error=Terjadi kesalahan, coba lagi");
            exit;
        }
    }

    public function prosesLogin()
    {
        require_once '../app/config/connection.php';

        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            header("Location: /Login?error=Email dan password harus diisi");
            exit;
        }

        $safeEmail = mysqli_real_escape_string($conn, $email);
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$safeEmail'");

        if (mysqli_num_rows($result) === 0) {
            header("Location: /Login?error=Email tidak ditemukan");
            exit;
        }

        $user = mysqli_fetch_assoc($result);

        if (!password_verify($password, $user['password'])) {
            header("Location: /Login?error=Password salah");
            exit;
        }

        session_start();
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];

        $checkInterest = mysqli_query($conn, "SELECT id FROM user_interests WHERE user_id = " . $user['id'] . " LIMIT 1");

        if (mysqli_num_rows($checkInterest) > 0) {
            header("Location: /Home");
        } else {
            header("Location: /Interest");
        }
        exit;

    }

        public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /Login");
        exit;
    }
}