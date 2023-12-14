<?php
include "Client.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_langganan" => $_POST['id_langganan'],
        "id_film" => $_POST['id_film'],
        "id_pengguna" => $_POST['id_pengguna'],
        "tanggal" => $_POST['tanggal'],
        "jumlah" => $_POST['jumlah'],
        "alamat" => $_POST['alamat'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_langganan($data);
    header('location:admin/langganan.php');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_langganan" => $_POST['id_langganan'],
        "id_film" => $_POST['id_film'],
        "id_pengguna" => $_POST['id_pengguna'],
        "tanggal" => $_POST['tanggal'],
        "jumlah" => $_POST['jumlah'],
        "alamat" => $_POST['alamat'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_langganan($data);
    header('location:admin/langganan.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_langganan" => $_GET['id_langganan'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_langganan($data);
    header('location:admin/langganan.php');
}

unset($abc, $data);