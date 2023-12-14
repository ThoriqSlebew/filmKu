<?php
error_reporting(E_ALL); // error ditampilkan 
ini_set('display_errors',1); 

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
    $id_langganan = $data->id_langganan; // Ubah 'id barang' menjadi 'id_langganan'
    $id_film = $data->id_film; // Ubah 'id barang' menjadi 'id_langganan'
    $id_pengguna = $data->id_pengguna; // Ubah 'id barang' menjadi 'id_langganan'
    $tanggal = $data->tanggal; // Ubah 'id barang' menjadi 'id_langganan'// $nama_kategori = $data->nama_kategori;
    $jumlah = $data->jumlah;
    $alamat = $data->alamat;
    $aksi=$data->aksi;
 
    if ($aksi == 'tambah') {
        $data2 = array(
            'id_film' => $id_film,
            'id_pengguna' => $id_pengguna,
            'tanggal' => $tanggal,
            'jumlah' => $jumlah,
            'alamat' => $alamat,
        );
        

       
        $abc->tambah_langganan($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_langganan' => $id_langganan,
            'id_film' => $id_film,
            'id_pengguna' => $id_pengguna,
            'tanggal' => $tanggal,// 'nama_kategori' => $nama_kategori,
            'jumlah' => $jumlah,
            'alamat' => $alamat,
        );
        $abc->ubah_langganan($data2);
    } elseif ($aksi == 'hapus') { // Ubah '=' menjadi '==' untuk memeriksa kesamaan
        $abc->hapus_langganan($id_langganan);
    }

    // hapus variabel dari memori
    unset($input, $data, $data2, $id_langganan, $id_film, $id_pengguna, $tanggal, $jumlah, $alamat, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') 
    {
    if (isset($_GET['aksi']) && ($_GET['aksi']=='tampil') && (isset($_GET['id_langganan'])) )
    {   $id_langganan = filter($_GET['id_langganan']); // Ubah 'id barang' menjadi 'id_langganan'
        $data = $abc->tampil_langganan($id_langganan); // Ubah 'tampil data' menjadi 'tampil_data'
        echo json_encode($data);
    } else 
        { //menampilkan semua data
        $data = $abc->tampil_semua_langganan();
        echo json_encode($data);
        }
        unset($postdata, $data, $id_langganan, $abc);
    }

?>