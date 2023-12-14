<?php
include "Client.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_kategori" => $_POST['id_kategori'],
        "nama_kategori" => $_POST['nama_kategori'],
        "klasifikasi" => $_POST['klasifikasi'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_kategori($data);
    header('location:admin/kategori.php');

} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_kategori" => $_POST['id_kategori'],
        "nama_kategori" => $_POST['nama_kategori'],
        "klasifikasi" => $_POST['klasifikasi'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_kategori($data);
    header('location: admin/kategori.php');
    
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_kategori" => $_GET['id_kategori'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_kategori($data);
    header('location: admin/kategori.php');
}

unset($abc, $data);