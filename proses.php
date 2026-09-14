<?php
include "koneksi.php";
include "fungsi.php";

if (isset($_POST['aksi'])) {
    if (($_POST['aksi'] == "add")){
        // Parameter $_FILES sudah dihapus di sini
        $berhasil = tambah_data($_POST); 

        if($berhasil){
            header("location: index.php");
        } else {
            echo $berhasil;
        }

    } else if (($_POST['aksi'] == "edit")) {
        // Parameter $_FILES sudah dihapus di sini
        $berhasil = ubah_data($_POST); 

        if($berhasil){
            header("location: index.php");
        } else {
            echo $berhasil;
        }
    }
}

if(isset($_GET['hapus'])){
    $berhasil = hapus_data($_GET);

    if($berhasil){
    header("location: index.php");
    } else {
        echo $berhasil;
    }
}
?>