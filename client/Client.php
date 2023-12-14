<?php
error_reporting(1);

class Client
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
        unset($url);
    }

    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);
    }

    // ==================================== TAMPIL SEMUA DATA ====================================

    public function tampil_semua_film()
    {
        $client = curl_init($this->url . "server_film.php");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }
    public function tampil_semua_kategori()
    {
        $client = curl_init($this->url . "server_kategori.php");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }
    public function tampil_semua_langganan()
    {
        $client = curl_init($this->url . "server_langganan.php");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }
    public function tampil_semua_pengguna()
    {
        $client = curl_init($this->url . "server_pengguna.php");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }

    // ==================================== TAMPIL DATA ====================================


    public function tampil_film($id_film)
    {
        $id_film = $this->filter($id_film);
        $client = curl_init($this->url . "server_film.php?aksi=tampil&id_film=" . $id_film);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($id_film, $client, $response, $data);
    }
    public function tampil_kategori($id_kategori)
    {
        $id_kategori = $this->filter($id_kategori);
        $client = curl_init($this->url . "server_kategori.php?aksi=tampil&id_kategori=" . $id_kategori);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($id_kategori, $client, $response, $data);
    }
    public function tampil_langganan($id_langganan)
    {
        $id_langganan = $this->filter($id_langganan);
        $client = curl_init($this->url . "server_langganan.php?aksi=tampil&id_langganan=" . $id_langganan);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($id_langganan, $client, $response, $data);
    }
    public function tampil_pengguna($id_pengguna)
    {
        $id_pengguna = $this->filter($id_pengguna);
        $client = curl_init($this->url . "server_pengguna.php?aksi=tampil&id_pengguna=" . $id_pengguna);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($id_pengguna, $client, $response, $data);
    }
     
    // ==================================== TAMBAH DATA ====================================


    public function tambah_film($data)
    {
        $data = '{ "id_film" : "' . $data['id_film'] . '",
            "id_kategori" : "' . $data['id_kategori'] . '", 
            "judul" : "'. $data['judul'] .'",  
            "sutradara" : "'. $data['sutradara'] .'", 
            "penerbit" : "'. $data['penerbit'] .'", 
            "sinopsis" : "'. $data['sinopsis'] .'", 
            "kuota_langganan" : "'. $data['kuota_langganan'] .'", 
            "aksi": "' . $data['aksi'] .'"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_film.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }
    public function tambah_kategori($data)
    {
        $data = '{ "id_kategori" : "' . $data['id_kategori'] . '", 
            "nama_kategori" : "'. $data['nama_kategori'] .'", 
            "klasifikasi" : "'. $data['klasifikasi'] .'",  
            "aksi": "' . $data['aksi'] .'"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_kategori.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }
    public function tambah_langganan($data)
    {
        $data = '{ "id_langganan" : "' . $data['id_langganan'] . '",
            "id_film" : "' . $data['id_film'] . '",
            "id_pengguna" : "' . $data['id_pengguna'] . '", 
            "tanggal" : "'. $data['tanggal'] .'", 
            "jumlah" : "'. $data['jumlah'] .'", 
            "alamat" : "'. $data['alamat'] .'", 
            "aksi": "' . $data['aksi'] .'"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_langganan.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }
    public function tambah_pengguna($data)
    {
        $data = '{ "id_pengguna" : "' . $data['id_pengguna'] . '", 
            "username" : "'. $data['username'] .'", 
            "password" : "'. $data['password'] .'", 
            "email" : "'. $data['email'] .'", 
            "no_telp" : "'. $data['no_telp'] .'", 
            "aksi": "' . $data['aksi'] .'"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_pengguna.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    // ==================================== UDAH DATA ====================================

    public function ubah_film($data)
    {
        $data = '{ "id_film" : "' . $data['id_film'] . '", 
            "id_kategori" : "' . $data['id_kategori'] . '",
            "judul" : "'. $data['judul'] .'", 
            "sutradara" : "'. $data['sutradara'] .'", 
            "penerbit" : "'. $data['penerbit'] .'",
            "sinopsis" : "'. $data['sinopsis'] .'", 
            "kuota_langganan" : "'. $data['kuota_langganan'] .'", 
            "aksi": "' . $data['aksi'] .'"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_film.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data,$c,$response);
        // You can unset variables here or later as needed.
    }

    public function ubah_kategori($data)
    {
        $data = '{ "id_kategori" : "' . $data['id_kategori'] . '", 
            "nama_kategori" : "'. $data['nama_kategori'] .'", 
            "klasifikasi" : "'. $data['klasifikasi'] .'",  
            "aksi": "' . $data['aksi'] .'"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_kategori.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data,$c,$response);
        // You can unset variables here or later as needed.
    }

    public function ubah_langganan($data)
    {
        $data = '{ "id_langganan" : "' . $data['id_langganan'] . '",
            "id_film" : "' . $data['id_film'] . '",
            "id_pengguna" : "' . $data['id_pengguna'] . '", 
            "tanggal" : "'. $data['tanggal'] .'", 
            "jumlah" : "'. $data['jumlah'] .'", 
            "alamat" : "'. $data['alamat'] .'",
            "aksi": "' . $data['aksi'] .'"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_langganan.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data,$c,$response);
        // You can unset variables here or later as needed.
    }

    public function ubah_pengguna($data)
    {
        $data = '{ "id_pengguna" : "' . $data['id_pengguna'] . '", 
            "username" : "'. $data['username'] .'", 
            "password" : "'. $data['password'] .'", 
            "email" : "'. $data['email'] .'",
            "no_telp" : "'. $data['no_telp'] .'", 
            "aksi": "' . $data['aksi'] .'"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_pengguna.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data,$c,$response);
        // You can unset variables here or later as needed.
    }

        // ==================================== HAPUS DATA ====================================

    public function hapus_film($data)
    {
        $id_film = $this->filter($data['id_film']);
        $data = '{ "id_film" : "'.$id_film.'",
            "aksi": "' . $data['aksi'] .'"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_film.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_film,$data,$c,$response);
        // You can unset variables here or later as needed.
    }
    public function hapus_kategori($data)
    {
        $id_kategori = $this->filter($data['id_kategori']);
        $data = '{ "id_kategori" : "'.$id_kategori.'",
            "aksi": "' . $data['aksi'] .'"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_kategori.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_film,$data,$c,$response);
        // You can unset variables here or later as needed.
    }
    public function hapus_langganan($data)
    {
        $id_langganan = $this->filter($data['id_langganan']);
        $data = '{ "id_langganan" : "'.$id_langganan.'",
            "aksi": "' . $data['aksi'] .'"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_langganan.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_langganan,$data,$c,$response);
        // You can unset variables here or later as needed.
    }
    public function hapus_pengguna($data)
    {
        $id_pengguna = $this->filter($data['id_pengguna']);
        $data = '{ "id_pengguna" : "'.$id_pengguna.'",
            "aksi": "' . $data['aksi'] .'"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_pengguna.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_pengguna,$data,$c,$response);
        // You can unset variables here or later as needed.
    }

    public function __destruct()
    {
        unset($this->url);
    }
}

$url = 'http://192.168.137.1/film/server/';
$abc = new Client($url);
?>