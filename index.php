<?php
include "koneksi.php";

$query = "SELECT * FROM siswa";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>Belajar_CRUD</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            CRUD _ BS5
            </a>
        </div>
    </nav>

    <!-- Judul -->
     <div class="container">
        <h1 class="mt-4">Data Siswa</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Berisi data yang telah disimpan di database.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Create Read Update Delete</cite>
            </figcaption>
        </figure>
        
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i>
            Tambah Data
        </a>
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'hapus') {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> Data siswa telah dihapus.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
            } elseif ($_GET['pesan'] == 'tambah') {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> Data siswa baru telah ditambahkan.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
            } elseif ($_GET['pesan'] == 'edit') {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> Data siswa telah diperbarui.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
            }
        }
        ?>
        <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover">
            <thead>
            <tr>
                <th><center>No.</center></th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                while ($result = mysqli_fetch_assoc($sql)){
                ?>
                <tr>
                    <td><center>
                        <?php echo ++$no . '.'; ?>
                    </center></td>
                    <td>
                        <?php echo $result['NISN']; ?>
                    </td>
                    <td>
                        <?php echo $result['NAMA']; ?>
                    </td>
                    <td>
                        <?php echo $result['KELAS']; ?>
                    </td>
                    <td>
                        <?php echo $result['JURUSAN']; ?>
                    </td>
                    <td>
                        <a href="kelola.php?ubah=<?php echo $result['NISN']; ?>" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="proses.php?hapus=<?php echo $result['NISN']; ?>" type="button" class="btn btn-danger btn-sm" onClick ="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </div>
     </div>

     <footer class="bg-light text-center text-lg-start mt-auto">
        <div class="center p-4">
            <p>&copy: 2026 StudentAPP. ALL rights reserved.</p>
        </div>
     </footer>
</body>
</html>