<?php
include '../Client.php';

$no = 1;
$data_langganan = $abc->tampil_semua_langganan();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - FilmKu</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom sticky-top">
        <div class="container py-1">
            <a class="navbar-brand" href="../index.php">FilmKu</a>
           
                <button class="btn btn-warning ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                    =
                </button>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        
                        <ul class="dropdown-menu dropdown-menu-end mt-3">
                            
                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                        
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <aside class="offcanvas offcanvas-start border-top" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel" style="margin-top: 64px; width: 15%">
        <div class="offcanvas-body">
            <a href="../index.php" class="btn btn-secondary w-100 mb-2">Dashboard</a>
            <a href="kategori.php" class="btn btn-outline-secondary w-100 mb-2">Daftar kategori</a>
            <a href="film.php" class="btn btn-outline-secondary w-100 mb-2">Daftar film</a>
            <a href="langganan.php" class="btn btn-outline-secondary w-100 mb-2">Daftar Pengguna</a>
            <a href="langganan.php" class="btn btn-outline-secondary w-100 mb-2">Daftar langganan</a>
        </div>
        </aside>

        <main class="container">
        <h3 class="pt-5">Daftar langganan</h3>
        <p class="pb-3">Kelola data</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">id pengguna</th>
                    <th scope="col">id film </th>
                    <th scope="col">Alamat </th>
                    <th scope="col">Tanggal langganan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data_langganan as $langganan) :
                ?>
                    
                        <tr>
                            <td scope="col"><?= $no++ ?></td>
                            <td scope="col"><?= $langganan->id_pengguna ?></td>
                            <td scope="col"><?= $langganan->id_film ?></td>
                            <td scope="col"><?= $langganan->alamat ?></td>
                            <td scope="col"><?= $langganan->tanggal ?></td>
                            <td scope="col"><?= $langganan->jumlah ?> </td>

                        
                        <td scope="col">
                            <div>
                                <a href="#" class="btn btn-danger btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $langganan->id_langganan ?>">
                                    Hapus
                                </a>
                                <div class="modal fade" id="hapusModal<?= $langganan->id_langganan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Yakin mau dihapus?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Pilih "Hapus" jika kamu yakin untuk menghapus ID langganan "<?= $langganan->id_langganan ?>".</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                <a class="btn btn-dark" href="../proses_langganan.php?aksi=hapus&id_langganan=<?= $langganan->id_langganan?>">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
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
                    <a class="btn btn-dark" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar peminjam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    <footer class="mt-5 bg-warning ">
    <div class="d-flex justify-content-around pt-5">
        <div class="col-4">
            <h1>FilmKu</h1>
            <p>
                FilmKu Mantab adalah perpustakaan digital yang menyediakan akses mudah ke berbagai koleksi film, jurnal, dan sumber daya lainnya secara online. Nikmati kebebasan membaca dan belajar di mana saja, kapan saja.
            </p>
        </div>
        <div class="col-4">
            <h3>Discover More!</h3>
            <p>
                Temukan berbagai koleksi yang menarik dan bermanfaat di FilmKu Mantab. Tersedia film-film terbaru, jurnal ilmiah, majalah populer, dan banyak lagi. Tingkatkan pengetahuan Anda dengan menjelajahi dunia pengetahuan yang tak terbatas.
            </p>
    </div>
</footer>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>