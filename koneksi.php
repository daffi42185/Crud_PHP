<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'sekolah';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    $conn = mysqli_connect($host, $user, $pass);

    if (!$conn) {
        die('Koneksi database gagal: ' . mysqli_connect_error());
    }

    $createDb = "CREATE DATABASE IF NOT EXISTS `$db`";
    if (!mysqli_query($conn, $createDb)) {
        die('Gagal membuat database: ' . mysqli_error($conn));
    }

    mysqli_close($conn);
    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
        die('Koneksi database gagal setelah dibuat: ' . mysqli_connect_error());
    }
}

mysqli_set_charset($conn, 'utf8mb4');

/*$tableCheck = mysqli_query($conn, "SHOW TABLES LIKE 'tb_sekolah'");
if (mysqli_num_rows($tableCheck) === 0) {
    $createTable = "
        CREATE TABLE tb_sekolah (
            id_siswa INT AUTO_INCREMENT PRIMARY KEY,
            nisn VARCHAR(20) NOT NULL,
            nama_siswa VARCHAR(100) NOT NULL,
            jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
            email VARCHAR(100) NOT NULL,
            jurusan VARCHAR(100) NOT NULL,
            foto_siswa VARCHAR(255) DEFAULT NULL,
            alamat TEXT NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ";

    if (!mysqli_query($conn, $createTable)) {
        die('Gagal membuat tabel: ' . mysqli_error($conn));
    }
} else {
    $columnCheck = mysqli_query($conn, "SHOW COLUMNS FROM tb_sekolah LIKE 'email'");
    if (mysqli_num_rows($columnCheck) === 0) {
        $alterTable = "ALTER TABLE tb_sekolah ADD COLUMN email VARCHAR(100) NOT NULL AFTER jenis_kelamin";
        if (!mysqli_query($conn, $alterTable)) {
            die('Gagal menambah kolom email: ' . mysqli_error($conn));
        }
    }

    $columnCheck = mysqli_query($conn, "SHOW COLUMNS FROM tb_sekolah LIKE 'jurusan'");
    if (mysqli_num_rows($columnCheck) === 0) {
        $alterTable = "ALTER TABLE tb_sekolah ADD COLUMN jurusan VARCHAR(100) NOT NULL AFTER email";
        if (!mysqli_query($conn, $alterTable)) {
            die('Gagal menambah kolom jurusan: ' . mysqli_error($conn));
        }
    }
}*/
?>