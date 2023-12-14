<?php
error_reporting(1); // error ditampilkan
class Database
{
    private $host = "localhost";
    private $dbname = "film";
    private $user = "root";
    private $password = "";
    private $port = "3309";
    private $conn;

    // function yang pertama kali di-load saat class dipanggil
    public function __construct()
    {
        // koneksi database 
        try {
            $this->conn = new PDO("mysql:host=$this->host;port=$this->port; dbname=$this->dbname; charset=utf8", $this->user, $this->password);

        } catch (PDOException $e) {
            echo "Koneksi gagal";
        }
    }

    // ==================================== TAMPIL DATA ====================================

    public function tampil_film($id_film)
    {
        $query = $this->conn->prepare("select id_film, id_kategori, judul, sutradara, penerbit, sinopsis, kuota_langganan from film where id_film=?");
        $query->execute(array($id_film));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC); // mengembalikan data
        return $data;
        // hapus variable dari memory
        $query->closeCursor();
        unset($id_film, $data);
    }
    public function tampil_kategori($id_kategori)
    {
        $query = $this->conn->prepare("select id_kategori, nama_kategori, klasifikasi from kategori where id_kategori=?");
        $query->execute(array($id_kategori));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC); // mengembalikan data
        return $data;
        // hapus variable dari memory
        $query->closeCursor();
        unset($id_kategori, $data);
    }
    public function tampil_langganan($id_langganan)
    {
        $query = $this->conn->prepare("select id_langganan, id_film, id_pengguna tanggal, jumlah, alamat from langganan where id_langganan=?");
        $query->execute(array($id_langganan));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC); // mengembalikan data
        return $data;
        // hapus variable dari memory
        $query->closeCursor();
        unset($id_langganan, $data);
    }
    public function tampil_pengguna($id_pengguna)
    {
        $query = $this->conn->prepare("select id_pengguna, username, password, email, no_telp from pengguna where id_pengguna=?");
        $query->execute(array($id_pengguna));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC); // mengembalikan data
        return $data;
        // hapus variable dari memory
        $query->closeCursor();
        unset($id_film, $data);
    }

    // ==================================== TAMPIL SEMUA DATA ====================================

    public function tampil_semua_film()
    {
        $query = $this->conn->prepare("select id_film, id_kategori, judul, sutradara, penerbit,sinopsis, kuota_langganan  from film order by id_film");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }
    public function tampil_semua_kategori()
    {
        $query = $this->conn->prepare("select id_kategori, nama_kategori, klasifikasi  from kategori order by id_kategori");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }
    public function tampil_semua_langganan()
    {
        $query = $this->conn->prepare("select id_langganan, id_film, id_pengguna, tanggal, jumlah, alamat from langganan order by id_langganan");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }
    public function tampil_semua_pengguna()
    {
        $query = $this->conn->prepare("select id_pengguna, username, password, email,no_telp  from pengguna order by id_pengguna");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }

    // ==================================== TAMBAH DATA ====================================

    public function tambah_film($data)
    {
        $query = $this->conn->prepare("insert ignore into film (id_film, id_kategori, judul, sutradara, penerbit, sinopsis, kuota_langganan ) values (?,?,?,?,?,?,?)");
        $query->execute(array($data['id_film'], $data['id_kategori'], $data['judul'], $data['sutradara'], $data['penerbit'],$data['sinopsis'],$data['kuota_langganan']));
        $query->closeCursor();
        unset($data);
    }
    public function tambah_kategori($data)
    {
        $query = $this->conn->prepare("insert ignore into kategori (id_kategori, nama_kategori, klasifikasi) values (?,?,?)");
        $query->execute(array($data['id_kategori'], $data['nama_kategori'], $data['klasifikasi']));
        $query->closeCursor();
        unset($data);
    }
    public function tambah_langganan($data)
    {
        $query = $this->conn->prepare("insert ignore into langganan ( id_film, id_pengguna, tanggal, jumlah, alamat) values (?,?,?,?,?)");
        $query->execute(array( $data['id_film'], $data['id_pengguna'], $data['tanggal'], $data['jumlah'], $data['alamat']));
        $query->closeCursor();
        unset($data);
    }
    public function tambah_pengguna($data)
    {
        $query = $this->conn->prepare("insert ignore into pengguna (id_pengguna, username, password, email, no_telp ) values (?,?,?,?,?)");
        $query->execute(array($data['id_pengguna'], $data['username'], $data['password'], $data['email'],$data['no_telp']));
        $query->closeCursor();
        unset($data);
    }
// ==================================== UBAH DATA ====================================
    public function ubah_film($data)
{
    try {
        $query = $this->conn->prepare("UPDATE film SET id_kategori=?, judul=?, sutradara=?, penerbit=?, sinopsis=?, kuota_langganan=? WHERE id_film=?");
        $query->execute(array($data['id_kategori'],$data['judul'], $data['sutradara'], $data['penerbit'],$data['sinopsis'],$data['kuota_langganan'],  $data['id_film']));
        $query->closeCursor();
        unset($data);
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        // Handle any database-related errors here.
        // You can log the error, display a user-friendly message, or take appropriate action.
    }
}

public function ubah_kategori($data)
{
    try {
        $query = $this->conn->prepare("UPDATE kategori SET nama_kategori=?, klasifikasi=? WHERE id_kategori=?");
        $query->execute(array($data['nama_kategori'], $data['klasifikasi'],  $data['id_kategori']));  
        $query->closeCursor();
        unset($data);
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        // Handle any database-related errors here.
        // You can log the error, display a user-friendly message, or take appropriate action.
    }
}
public function ubah_langganan($data)
{
    try {
        $query = $this->conn->prepare("UPDATE langganan SET id_film=?, id_pengguna=?, tanggal=?,  jumlah=?, alamat=? WHERE id_langganan=?");
        $query->execute(array($data['id_film'],$data['id_pengguna'],$data['tanggal'], $data['jumlah'], $data['alamat'],  $data['id_langganan']));
        $query->closeCursor();
        unset($data);
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        // Handle any database-related errors here.
        // You can log the error, display a user-friendly message, or take appropriate action.
    }
}
public function ubah_pengguna($data)
{
    try {
        $query = $this->conn->prepare("UPDATE pengguna SET username=?,  password=?, email=?, no_telp=? WHERE id_pengguna=?");
        $query->execute(array($data['username'], $data['password'], $data['email'],$data['no_telp'],  $data['id_pengguna']));
        $query->closeCursor();
        unset($data);
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        // Handle any database-related errors here.
        // You can log the error, display a user-friendly message, or take appropriate action.
    }
}

// ==================================== HAPUS DATA ====================================

    public function hapus_film($id_film)
    {
        $query = $this->conn->prepare("delete from film where id_film=?");
        $query->execute(array($id_film));
        $query->closeCursor();
        unset($id_film);
    }
    public function hapus_kategori($id_kategori)
    {
        $query = $this->conn->prepare("delete from kategori where id_kategori=?");
        $query->execute(array($id_kategori));
        $query->closeCursor();
        unset($id_kategori);
    }
    public function hapus_langganan($id_langganan)
    {
        $query = $this->conn->prepare("delete from langganan where id_langganan=?");
        $query->execute(array($id_langganan));
        $query->closeCursor();
        unset($id_langganan);
    }
    public function hapus_pengguna($id_pengguna)
    {
        $query = $this->conn->prepare("delete from pengguna where id_pengguna=?");
        $query->execute(array($id_pengguna));
        $query->closeCursor();
        unset($id_pengguna);
    }
}
