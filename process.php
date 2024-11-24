<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $file = $_FILES['file'];

    // Validasi server-side
    if (strlen($name) < 3) {
        die('Nama harus lebih dari 3 karakter');
    }

    if (strlen($password) < 6) {
        die('Password harus lebih dari 6 karakter');
    }

    if (!is_numeric($age) || $age < 1) {
        die('Umur harus berupa angka positif');
    }

    if ($file['size'] > 1024 * 1024) { // 1MB
        die('Ukuran file tidak boleh lebih dari 1MB');
    }

    if ($file['type'] !== 'text/plain') {
        die('File harus berupa teks');
    }

    // Baca isi file
    $fileContent = file_get_contents($file['tmp_name']);
    $fileLines = explode("\n", $fileContent);

    // Dapatkan informasi browser dan sistem operasi
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    // Simpan data ke session untuk ditampilkan di result.php
    session_start();
    $_SESSION['data'] = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'age' => $age,
        'fileContent' => $fileLines,
        'userAgent' => $userAgent
    ];

    header('Location: result.php');
    exit();
}
?>
