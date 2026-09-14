<!DOCTYPE html>
<?php
include 'koneksi.php';

// Inisialisasi variabel kosong
$nisn = '';
$nama_siswa = '';
$kelas = '';
$jurusan = '';

// Mengecek apakah ada parameter 'ubah' di URL (saat tombol edit diklik)
if (isset($_GET['ubah'])){
    $nisn = $_GET['ubah'];

    // Mengambil data siswa berdasarkan NISN
    $query = "SELECT * FROM siswa WHERE NISN = '$nisn'";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    // Memasukkan data dari database ke dalam variabel
    $nisn = $result['NISN'];
    $nama_siswa = $result['NAMA'];
    $kelas = $result['KELAS'];
    $jurusan = $result['JURUSAN'];
}
?>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    
    <title>Belajar_CRUD</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light mb-4 shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">
                CRUD _ BS5
            </a>
        </div>
    </nav>

    <div class="container">
        <!-- enctype="multipart/form-data" Dihapus karena kita tidak mengupload foto lagi -->
        <form action="proses.php" method="POST">
            
            <!-- NISN -->
            <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                <div class="col-sm-10">
                    <!-- Ditambahkan 'readonly' saat mode edit agar NISN tidak bisa diubah -->
                    <input type="number" class="form-control" id="nisn" name="nisn" placeholder="Ex: 112233" value="<?php echo $nisn; ?>" <?php if(isset($_GET['ubah'])) { echo "readonly"; } ?> required>
                </div>
            </div>
            
            <!-- Nama Siswa -->
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama_siswa" placeholder="Ex: Alexander" value="<?php echo $nama_siswa; ?>" required>
                </div>
            </div>

            <!-- Kelas (Input baru) -->
            <div class="mb-3 row">
                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Ex: XI" value="<?php echo $kelas; ?>" required>
                </div>
            </div>

            <!-- Jurusan -->
            <div class="mb-3 row">
                <label for="Jurusan" class ="col-sm-2 col-form-label">Jurusan</label>
                <div class ="col-sm-10">
                    <input type="text" class="form-control" id="Jurusan" name="Jurusan" placeholder="EX : PPLG-RPL2" value="<?php echo $jurusan; ?>" required>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php
                    if(isset($_GET['ubah'])) {
                    ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Simpan Perubahan
                        </button>
                    <?php
                    } else {
                    ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Tambahkan
                        </button>
                    <?php
                        }
                    ?>

                    <a href="index.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>