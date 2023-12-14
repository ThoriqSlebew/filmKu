<?php
error_reporting(1);
include "Client.php";

$id_pengguna = $_POST['id_pengguna'];
$pengguna = $abc->tampil_pengguna($id_pengguna);

$id_film = $_POST['id_film'];
$film = $abc->tampil_film($id_pengguna);

$judul = $film->judul;

$data_langgananan = $abc->tampil_langganan($id_event);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/bootstrap-icons/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="style/style.css" />
</head>

<body style="background-color: white;">
    <nav class="navbar navbar-expand-lg border-bottom sticky-top" style="background-color: orange;">
        <div class="container py-1">
            <button class="btn me-4" style="background-color: #EFFEFF;" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                =
            </button>

            <a class="navbar-brand text-white" href="index.php">FilmKu</a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

            </div>
        </div>
    </nav>

    <main class="container" style="min-height: 60vh;">
        <div class="row">
            
                <h1 class="fw-bold pt-4 pb-3">Detail Langganan</h1>
                <form action="proses_langganan.php" method="post">
                <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $pengguna->username ?>" disabled>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $pengguna->username ?>" hidden>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal langganan</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $_POST['tanggal'] ?>" disabled>
                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $_POST['tanggal'] ?>" hidden>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $_POST['jumlah'] ?>" disabled>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $_POST['jumlah'] ?>" hidden>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $_POST['alamat'] ?>" disabled>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $_POST['alamat'] ?>" hidden>
                    </div>

                    <div class="mb-3">
                        <input type="hidden" name="aksi" value="tambah" />
                        <input type="hidden" class="form-control" name="id_film" value="<?= $id_film ?>">
                        <input type="hidden" class="form-control" name="id_pengguna" value="<?= $pengguna->id_pengguna ?>">
                    </div>
                    <button class="btn d-flex w-100 mt-4 p-3 justify-content-between align-items-center fw-semibold text-white" style="background-color: orange;" type="submit" name="submit">
                        Langganan sekarang 
                    </button>
                </form>
        </div>


    </main>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Beneran mau keluar?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Pilih "Logout" jika kamu ingin mengakhiri sesimu.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                    <a class="btn btn-dark" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5 text-light" style="height: 14rem; background-color: orange;">
        <div class="d-flex justify-content-around pt-5">
        <div class="col-4">
            <h1>FilmKu</h1>
            <p>
                 perpustakaan digital yang menyediakan akses mudah ke berbagai koleksi film, jurnal, dan sumber daya lainnya secara online. Nikmati kebebasan membaca dan belajar di mana saja, kapan saja.
            </p>
        </div>
        <div class="col-4">
            <h3>Discover More!</h3>
            <p>
                Temukan berbagai koleksi yang menarik dan bermanfaat di FilmKu Mantab. Tersedia film-film terbaru, jurnal ilmiah, majalah populer, dan banyak lagi. Tingkatkan pengetahuan Anda dengan menjelajahi dunia pengetahuan yang tak terbatas.
            </p>
    </div>
    </footer>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>