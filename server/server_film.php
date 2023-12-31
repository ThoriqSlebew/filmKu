<?php
error_reporting(1); // error ditampilkan 


include "Database.php";
// buat objek baru dari class Database
$abc = new Database();

// function untuk menghapus selain huruf dan angka 
if(isset($_SERVER ['HTTP_ORIGIN'])){
    header("Access-Control-Allow-Origin:{$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Max-Age:86400');
}
if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header('Access-Control-Allow-Method:OPTIONS GET, POST, OPTIONS');
    if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS)']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}

$postdata = file_get_contents("php://input");

function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', ' ', $data);
    return $data;
    unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($postdata);
    $id_film = $data->id_film; // Ubah 'id barang' menjadi 'id_film'
    $id_kategori = $data->id_kategori; // Ubah 'id barang' menjadi 'id_film'
    $judul = $data->judul; // Ubah 'id barang' menjadi 'id_film' // $nama_kategori = $data->nama_kategori;
    $sutradara = $data->sutradara;
    $penerbit = $data->penerbit;
    $sinopsis = $data->sinopsis;
    $kuota_langganan = $data->kuota_langganan;
    $aksi=$data->aksi;

    if ($aksi == 'tambah') {
        $data2 = array(
            'id_film' => $id_film,
            'id_kategori' => $id_kategori,
            'judul' => $judul,// 'nama_kategori' => $nama_kategori,
            'sutradara' => $sutradara,
            'penerbit' => $penerbit,
            'sinopsis' => $sinopsis,
            'kuota_langganan' => $kuota_langganan,
        );

        $abc->tambah_film($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_film' => $id_film,
            'id_kategori' => $id_kategori,
            'judul' => $judul,// 'nama_kategori' => $nama_kategori,
            'sutradara' => $sutradara,
            'penerbit' => $penerbit,
            'sinopsis' => $sinopsis,
            'kuota_langganan' => $kuota_langganan,
        );
        $abc->ubah_film($data2);
    } elseif ($aksi == 'hapus') { // Ubah '=' menjadi '==' untuk memeriksa kesamaan
        $abc->hapus_film($id_film);
    }

    // hapus variabel dari memori
    unset($input, $data, $data2, $id_film, $id_kategori, $judul, $sutradara, $penerbit, $sinopsis, $kuota_langganan, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') 
    {
    if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_film'])) )
    {   $id_film = filter($_GET['id_film']); // Ubah 'id barang' menjadi 'id_film'
        $data = $abc->tampil_film($id_film); // Ubah 'tampil data' menjadi 'tampil_data'
        echo json_encode($data);
    } else 
        { //menampilkan semua data
        $data = $abc->tampil_semua_film();
        echo json_encode($data);
        }
        unset($postdata, $data, $id_film, $abc);
    }

?>