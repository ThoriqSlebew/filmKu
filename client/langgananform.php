<?php
error_reporting(1);
include 'Client.php';

$id_film = $_GET['id'];
$film = $abc->tampil_film($id_film);

$judul = !empty($film->judul) ? $film->judul : 'Judul Tidak Tersedia';

$data_pengguna = $abc->tampil_semua_pengguna();

$no =0;

$data_langganan = $abc->tampil_langganan($id_film);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>langganan film <?= $judul ?></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/bootstrap-icons/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom sticky-top">
        <div class="container py-1">
            <a class="navbar-brand" href="index.php">FilmKu</a>
            
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

    <main class="container w-50 mt-10">
        <legend class="mt-10">Silahkan Isi Form Berikut untuk langganan film <strong><?= $judul ?></strong></legend>
        <form action="konfirmasi-langganan.php" method="POST">
            <fieldset>
                <input type="hidden" class="form-control" name="id_film" value="<?= $id_film?>">

                <label for="form-label">pilih pengguna</label>
                <select class="w-100 mt-2 mb-3 p-3 justify-content-between align-items-center fw-semibold" name="id_pengguna">
                    <option value="">pilih pengguna</option>
                    <?
                    $data_pengguna =$abc -> tampil_semua_pengguna();
                    foreach($data_pengguna as $pengguna) :
                    ?>
                    <option value="<?= $pengguna->id_pengguna ?>"><?= $pengguna->username ?></option>
                    <?php endforeach ?>
                </select>
                
                <table class="table">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Masukan tanggal" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Masukan jumlah" name="jumlah" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="masukan alamat" name="alamat" required>
                    </div> 
                <button type="submit" class="btn d-flex w-100 mt-4 p-3 justify-content-between align-items-center fw-semibold " style="background-color: orange;" onclick="lanjutkan()">Langganan</button>
                </table>
            </fieldset>
        </form>
        
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

    

    <script>
        function lanjutkan() {
            document.querySelector("form").submit();
        }
    </script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>

