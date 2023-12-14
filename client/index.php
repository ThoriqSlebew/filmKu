<?php
error_reporting(1);
include "Client.php";
$data_film = $abc->tampil_semua_film();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Film-Ku</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

</head>

<body style="background-color: white;">
  <nav class="navbar navbar-expand-lg bg-body-tertiary " style="background-color: orange;">
    <div class="container">

    <button class="btn me-4" style="background-color: orange;" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                =
    </button>

      <a class="navbar-brand" href="index.php">Film-Ku</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" id="searchInput" placeholder="goleki" aria-label="Search">
        </form>
      </div>
    </div>
  </nav>

  <aside class="offcanvas offcanvas-start border-top" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel" style="margin-top: 64px; width: 15%">
    <div class="offcanvas-body">
      <a href="index.php" class="btn btn-secondary w-100 mb-2">Dashboard</a>
      <a href="admin/kategori.php" class="btn btn-outline-secondary w-100 mb-2">Daftar kategori</a>
      <a href="admin/film.php" class="btn btn-outline-secondary w-100 mb-2">Daftar Film</a>
      <a href="admin/pengguna.php" class="btn btn-outline-secondary w-100 mb-2">Daftar Pengguna</a>
      <a href="admin/langganan.php" class="btn btn-outline-secondary w-100 mb-2">Daftar langganan</a>
    </div>
  </aside>


  <!-- cards -->
  <main class="container" style="min-height: 60vh;">
    <h3 class="pt-5">Selamat Datang</h3>
    <p class="pb-3">Dapatkan Pengalaman Nonton FILM Terbaik</p>

    <div class="d-flex flex-wrap">
  <?php foreach ($data_film as $film) : ?>
    <div class="col mb-3">
      <div class="card ms-2 " style="  width: 19rem;">
        <a href="detail-film.php?id=<?= $film->id_film ?>" class="card text-decoration-none">
          <div class="card-body" style="background-color: orange;">
            <h5 class="fw-bold"><?= $film->judul ?></h5>
            <img src="../img/<?= $film->id_film ?>.jpeg" alt="gambar" width="270px">
            <div style="font-size: small">
              <p class="m-0">Sutradara : <?= $film->sutradara ?></p>
              <br>
              <p class="m-0">
                <?php 
                $sinopsis_pendek = substr($film->sinopsis , 0 , 200);
                if (strlen($film->sinopsis) > 200) {
                  $sinopsis_pendek .= '...';
                }
                echo $sinopsis_pendek;
                ?>
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
  <?php endforeach ?>
</div>

  </main>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda yakin Ingin Keluar?</h5>
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





  <!-- footer -->
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
  <script>
    function carifilm() {
      var input = document.getElementById("searchInput").value.toLowerCase();
      var cards = document.getElementsByClassName("card");

      for (var i = 0; i < cards.length; i++) {
        var card = cards[i];
        var namafilm = card.getElementsByClassName("fw-bold")[0].textContent.toLowerCase();

        if (namafilm.indexOf(input) > -1) {
          card.style.display = "";
        } else {
          card.style.display = "none";
        }
      }
    }

    document.getElementById("searchInput").addEventListener("input", carifilm);
  </script>
</body>


</html>