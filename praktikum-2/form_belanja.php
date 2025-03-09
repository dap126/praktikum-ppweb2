<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @media (max-width: 767px) {
            #container {
                display: flex;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5" id="container">
        <div class="col-12 col-md-4" style="float: right;" id="card-container">
            <div class="card">
                <div class="card-header bg-primary text-white">Daftar Harga</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-light">TV : Rp. 4.200.000</li>
                    <li class="list-group-item bg-light">Kulkas : Rp. 3.100.000</li>
                    <li class="list-group-item bg-light">Mesin Cuci : Rp. 3.800.000</li>
                </ul>
            </div>
            <div class="card-footer bg-primary text-white">Harga Dapat Berubah Setiap Saat</div>
        </div>

        <div class="col-8">
            <h3>Belanja Online</h3>
            <hr />
        </div>
        <div class="col-12 col-md-8 align-middle">
            <form method="GET" action="form_belanja.php">
                <div class="form-group row text-end mt-3">
                    <label for="nama" class="col-4 col-form-label font-weight-bold text-right">Nama Customer</label>
                    <div class="col-6">
                        <input id="nama" name="nama" type="text" class="form-control" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="produk" class="col-4 text-end font-weight-bold text-right">Pilih Produk</label>
                    <div class="col-8">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="produk" id="produk1" type="radio" class="custom-control-input" value="Televisi" required>
                            <label for="produk1" class="custom-control-label">TV</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="produk" id="produk2" type="radio" class="custom-control-input" value="Kulkas" required>
                            <label for="produk2" class="custom-control-label">Kulkas</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="produk" id="produk3" type="radio" class="custom-control-input" value="Mesin Cuci" required>
                            <label for="produk3" class="custom-control-label">Mesin Cuci</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row text-end mt-3">
                    <label for="jumlah" class="col-4 col-form-label font-weight-bold text-right">Jumlah</label>
                    <div class="col-4">
                        <input id="jumlah" name="jumlah" type="number" class="form-control" required min="1">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="proses" type="submit" value="Submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <hr />
    </div>

    <?php
    // MENANGKAP DATA YANG DI-INPUT
        $proses = isset($_GET['proses']) ? $_GET['proses']: "" ;
        $nama = isset($_GET['nama']) ? $_GET['nama']: "" ;
        $produk = isset($_GET['produk'])? $_GET['produk']: "" ;
        $jumlah = isset($_GET['jumlah'])? $_GET['jumlah']: "" ;
        $total_belanja = 0;
    // MENGHITUNG TOTAL BELANJA MENGGUNAKAN IF ELSE ATAU SWITCH
        if ($proses == "Submit") {
            if ($produk == "Televisi") {
                $total_belanja = 4200000 * $jumlah;
            } elseif ($produk == "Kulkas") {
                $total_belanja = 3100000 * $jumlah;
            } elseif ($produk == "Mesin Cuci") {
                $total_belanja = 3800000 * $jumlah;
            }
        }
        // MENCETAK HASIL
            echo '<hr />';
            echo '<h3>Hasil Belanja</h3>';
            echo '<p>Nama Customer : '. $nama. '</p>';
            echo '<p>Produk : '. $produk. '</p>';
            echo '<p>Jumlah : '. $jumlah. '</p>';
            echo '<p>Total Belanja : Rp. '. number_format($total_belanja, 0, ',', '.'). '</p>';
    ?>

    </div>
</body>

</html>