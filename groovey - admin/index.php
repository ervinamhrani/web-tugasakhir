<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "groovety_ta";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak terkoneksi ke database");
}
$judul_lagu     = "";
$nama_artis     = "";
$genre          = "";
$cover_lagu     = "";

if (isset($_POST['submit'])) {
    $judul_lagu     = $_POST['judul_lagu'];
    $nama_artis     = $_POST['nama_artis'];
    $genre          = $_POST['genre'];
    $cover_lagu     = $_POST['cover_lagu'];

    if ($judul_lagu && $nama_artis && $genre && $cover_lagu) {
        $query   = "insert into lagu(judul_lagu,nama_artis,genre,cover_lagu) VALUES ('$judul_lagu','$nama_artis','$genre','$cover_lagu')";
        $hasil   = mysqli_query($koneksi, $query);
        if ($hasil) {
            $sukses         = "Berhasil memasukkan data baru";
        } else {
            $php_errormsg   = "Gagal memasukkan data baru";
        }
    }
}
?>

<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1.0">
    <title>RUD Lagu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if (isset($error)) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php

                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="judul_lagu" class="col-sm-2 col-form-label">Judul Lagu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul_lagu" name="judul_lagu " value="<?php echo $judul_lagu ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_artis" class="col-sm-2 col-form-label">Nama Artis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_artis" name="nama_artis" value="<?php echo $nama_artis ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="genre" class="col-sm-2 col-form-label">Genre</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="genre">
                                <option value="">Pilih Genre</option>
                                <option value="pop" <?php if ($genre == "pop") echo "selected" ?>>Pop</option>
                                <option value="rock" <?php if ($genre == "rock") echo "selected" ?>>Rock</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="cover_lagu" class="col-sm-2 col-form-label">Cover Lagu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cover_lagu" name="cover_lagu" value="<?php echo $cover_lagu ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Lagu
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</body>

</html>

</html>