<?php
include "Client.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_film" => $_POST['id_film'],
        "id_kategori" => $_POST['id_kategori'],
        "judul" => $_POST['judul'],
        "sutradara" => $_POST['sutradara'],
        "penerbit" => $_POST['penerbit'],
        "sinopsis" => $_POST['sinopsis'],
        "kuota_langganan" => $_POST['kuota_langganan'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_film($data);
    header('location:admin/film.php?');

} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_film" => $_POST['id_film'],
        "id_kategori" => $_POST['id_kategori'],
        "judul" => $_POST['judul'],
        "sutradara" => $_POST['sutradara'],
        "penerbit" => $_POST['penerbit'],
        "sinopsis" => $_POST['sinopsis'],
        "kuota_langganan" => $_POST['kuota_langganan'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_film($data);
    header('location:admin/film.php');

} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_film" => $_GET['id_film'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_film($data);
    header('location: admin/film.php?');
}

unset($abc, $data);