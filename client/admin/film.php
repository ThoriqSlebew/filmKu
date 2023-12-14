<?php
error_reporting(1);
include "../Client.php";

$no = 1;
$data_film = $abc->tampil_semua_film();

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

<body >
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom sticky-top">
        <div class="container py-1">
                <button class="btn btn-warning ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                    =
                </button>
                <a class="navbar-brand" href="../index.php">FilmKu</a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                
            </div>
        </div>
    </nav>

    <aside class="offcanvas offcanvas-start border-top" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel" style="margin-top: 64px; width: 15%">
        <div class="offcanvas-body">
            <a href="../index.php" class="btn btn-secondary w-100 mb-2">Dashboard</a>
            <a href="kategori.php" class="btn btn-outline-secondary w-100 mb-2">Daftar kategori</a>
            <a href="film.php" class="btn btn-outline-secondary w-100 mb-2">Daftar film</a>
            <a href="pengguna.php" class="btn btn-outline-secondary w-100 mb-2">Daftar Pengguna</a>
            <a href="langganan.php" class="btn btn-outline-secondary w-100 mb-2">Daftar langganan</a>
        </div>
    </aside>

    <main class="container">
        <h3 class="pt-5">Daftar film</h3>
        <p class="pb-3">Kelola Data.</p>
        <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Data</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Id Kategori</th>
                    <th scope="col">judul</th>
                    <th scope="col">sutradara</th>
                    <th scope="col">penerbit</th>
                    <th scope="col">Sinopsis</th>
                    <th scope="col">kuota_langganan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    foreach ($data_film as $film) :
                    ?>
                        <tr>
                            <td scope="col"><?= $no++ ?></td>
                            <td scope="col"><?= $film-> id_kategori ?></td>
                            <td scope="col"><?= $film-> judul ?></td>
                            <td scope="col"><?= $film->sutradara ?></td>
                            <td scope="col"><?= $film->penerbit ?></td>
                            <td scope="col"><?= $film->sinopsis ?></td>
                            <td scope="col"><?= $film->kuota_langganan ?></td>
                            <td scope="col">
                            <div class="d-flex justify-content-around gap-2">
                                <a href="#" class="btn btn-warning btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $film->id_film ?>">
                                    Edit
                                </a>
                                <div class="modal fade" id="editModal<?= $film->id_film ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="user d-flex flex-column gap-2"  action="../proses_film.php" method="post">
                                                    <input type="hidden" class="form-control" name="id_film" value="<?= $film->id_film ?>">
                                                    <input type="hidden" class="form-control" name="aksi" value="ubah">
                                                    <div class="form-group">
                                                        <input disabled class="form-control" placeholder="id_kategori" name="id_kategori" value="<?= $film->id_kategori ?>" required>
                                                        <input hidden class="form-control" placeholder="id_kategori" name="id_kategori" value="<?= $film->id_kategori ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="judul" name="judul" value="<?= $film->judul ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="sutradara" name="sutradara" value="<?= $film->sutradara ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="penerbit" name="penerbit" value="<?= $film->penerbit ?>" required>
                                                    </div>
                                                    <label for="sinopsis">sinopsis</label>
                                                    <textarea class="form-control" id="sinopsis" rows="5" name="sinopsis" required><?= $film->sinopsis ?></textarea>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" placeholder="jumlah_film" name="kuota_langganan" value="<?= $film->kuota_langganan ?>" required>
                                                    </div>
                                                    <button type="submit" name="edit" class="btn btn-warning p-2 mt-3 fw-semibold">
                                                        Edit
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-danger btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $film->id_film ?>">
                                    Hapus
                                </a>
                                <div class="modal fade" id="hapusModal<?= $film->id_film ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Yakin mau dihapus?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Pilih "Hapus" jika kamu yakin untuk menghapus film "<?= $film->judul ?>".</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                <a class="btn btn-dark" href="../proses_film.php?aksi=hapus&id_film=<?= $film->id_film ?>">Hapus</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah film</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden"  name="aksi" value="tambah">
                    <form class="user d-flex flex-column gap-2" action="../proses_film.php" method="post">
                        <input type="hidden" name="aksi" value="tambah">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="id_kategori" name="id_kategori" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="judul" name="judul" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="sutradara" name="sutradara" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="penerbit" name="penerbit" required>
                        </div>
                        <textarea id="sinopsis" rows="5" placeholder="sinopsis" name="sinopsis" required> </textarea>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="kuota_langganan" name="kuota_langganan" required>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-warning p-2 mt-3 fw-semibold">
                            tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <footer class="mt-5 bg-warning ">
    <div class="d-flex justify-content-around pt-5">
        <div class="col-4">
            <h1>FilmKu</h1>
            <p>
                adalah tempat nonton film digital yang menyediakan akses mudah ke berbagai koleksi film, dan daya lainnya secara online. Nikmati kebebasan menonton di mana saja, kapan saja.
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