<?php
include "koneksi.php";
function tambah_data($data){
    $nisn = $data['nisn'];
    $nama_siswa = $data['nama_siswa'];
    $kelas = $data['kelas'];
    $jurusan = $data['Jurusan'];

    $query = "INSERT INTO siswa (NISN, NAMA, KELAS, JURUSAN) VALUES ('$nisn', '$nama_siswa', '$kelas', '$jurusan')";
    
    // --- BAGIAN INI YANG DIUBAH UNTUK MENGECEK ERROR ---
    $sql = mysqli_query($GLOBALS['conn'], $query);
    if (!$sql) {
        die("Gagal menyimpan data: " . mysqli_error($GLOBALS['conn']));
    }
    // ---------------------------------------------------

    return true;
}

function ubah_data($data){
    $nisn = $data['nisn'];
    $nama_siswa = $data['nama_siswa'];
    $kelas = $data['kelas'];
    $jurusan = $data['Jurusan'];

    $query = "UPDATE siswa SET NAMA = '$nama_siswa', KELAS = '$kelas', JURUSAN = '$jurusan' WHERE NISN = '$nisn';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
};

function hapus_data($data){
    $nisn = $data['hapus'];

    $query = "DELETE FROM siswa WHERE NISN = '$nisn';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
};
?>