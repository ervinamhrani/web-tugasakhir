<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    $username =  $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tb_login";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($hasil);

    if ($username == $data['username']) {
        if ($password == $data['password']) {
            header('location: ../index.html');
        }
    }
}
