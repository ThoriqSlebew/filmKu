<?php
error_reporting(1);
include "Client.php";

$id_film = $_GET['id'];
$film = $abc->tampil_film($id_film);

$judul = $film->judul;
$sutradara = $film->sutradara;
$penerbit = $film->penerbit;
$sinopsis = $film->sinopsis;
$kuota_langganan = $film->kuota_langganan;
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom sticky-top" style="background-color: orange;">
        <div class="container py-1">
            
            <button class="btn btn-warning ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                =
            </button>
            <a class="navbar-brand" href="index.php">Film-Ku</a>
            
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            </div>
        </div>
    </nav>

            <aside class="offcanvas offcanvas-start border-top" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel" style="margin-top: 64px; width: 15%">
                <div class="offcanvas-body">
                    <a href="index.php" class="btn btn-secondary w-100 mb-2">Dashboard</a>
                    <a href="admin/kategori.php" class="btn btn-outline-secondary w-100 mb-2">Daftar kategori</a>
                    <a href="admin/film.php" class="btn btn-outline-secondary w-100 mb-2">Daftar film</a>
                    <a href="admin/pengguna.php" class="btn btn-outline-secondary w-100 mb-2">Daftar Pengguna</a>
                    <a href="admin/.php" class="btn btn-outline-secondary w-100 mb-2">Daftar Pinjaman</a>
                </div>
            </aside>

    <main class="container w-50 ">
        <h1 class="fw-bold pt-5 pb-3 text-center"><?= $judul ?></h1>
        <img src="../img/<?= $film->id_film ?>.jpeg" alt="gambar" width="400px" style="display: block; margin: 0 auto;">

        <p class="m-0 py-1 text-center">oleh :<?= $sutradara?></p>
        <p class="m-0 py-1 text-center"> <?= $penerbit?></p>
        <p class="m-0 py-1 " style="text-align: justify;" ><?= $sinopsis ?></p>
        <p class="m-0 py-1 " style="text-align: justify;" >kuota tersedia : <?= $kuota_langganan ?></p>
        <a href="langgananform.php?id=<?= $id_film ?>" class="btn btn-warning " type="button">
                Pinjam Sekarang
        <i class="bi bi-arrow-right me-2 fs-5"></i>
            </a>
    </main>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda Yakin ingin keluar?</h5>
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