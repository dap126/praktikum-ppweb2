<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Form Nilai Siswa</title>

    <style>
        @media (min-width: 426px) {
            form {
                width: 65%;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Sistem Penilaian</a>
            </div>
        </nav>
    </header>

    <main role="main" class="container mt-3">
        <h3>Form Penilaian Siswa</h3>
        <hr />
        <form class="mx-auto" action="nilai_siswa_post.php" method="POST">
            <div class="form-group row">
                <label for="nama" class="col-5 col-form-label font-weight-bold text-right">Nama Lengkap</label>
                <div class="col-7">
                    <input name="nama" id="nama" value="" placeholder="Nama Lengkap" type="text" required="required" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="matkul" class="col-5 col-form-label font-weight-bold text-right">Mata Kuliah</label>
                <div class="col-7">
                    <select name="matkul" id="matkul" class="custom-select" required="required">
                        <option value="DDP">Dasar Dasar Pemrograman</option>
                        <option value="BDI">Basis Data I</option>
                        <option value="WEB1">Pemrograman Web 1</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai_uts" class="col-5 col-form-label font-weight-bold text-right">Nilai UTS</label>
                <div class="col-7">
                    <input name="nilai_uts" id="nilai_uts" placeholder="Nilai UTS" value="" type="number" class="form-control" required="required" min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai_uas" class="col-5 col-form-label font-weight-bold text-right">Nilai UAS</label>
                <div class="col-7">
                    <input name="nilai_uas" id="nilai_uas" placeholder="Nilai UAS" value="" type="number" class="form-control" required="required" min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai_tugas" class="col-5 col-form-label font-weight-bold text-right">Nilai Tugas/Praktikum</label>
                <div class="col-7">
                    <input name="nilai_tugas" id="nilai_tugas" placeholder="Nilai Tugas" value="" type="number" class="form-control" required="required" min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-5 col-7">
                    <button type="submit" value="Simpan" name="proses" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </main>
    <?php
        $proses = isset($_POST['proses']) ? $_POST['proses']: "" ;
        $nama = isset($_POST['nama']) ? $_POST['nama']: "" ;
        $matkul = isset($_POST['matkul']) ? $_POST['matkul']: "" ;
        $nilai_uts = isset($_POST['nilai_uts']) ? $_POST['nilai_uts']: "" ;
        $nilai_uas = isset($_POST['nilai_uas']) ? $_POST['nilai_uas']: "" ;
        $nilai_tugas = isset($_POST['nilai_tugas']) ? $_POST['nilai_tugas']: "" ;
        $nilai_akhir = isset($_POST['nilai_uts']) ? ($nilai_uts * 0.3 + $nilai_uas * 0.3 + $nilai_tugas * 0.3): "" ;
        $status = "";
        $grade = "";
        $predikat = "";

        /*
        - MENENTUKAN LULUS ATAU TIDAK MENGGUNAKAN IF ELSE
        - SISWA DINYATAKAN LULUS JIKA NILAI TOTAL dengan presentase 30% UTS, 35% UAS dan TUGAS 35% melebihi 55
        */
        if ($nilai_uts >= 0.3 && $nilai_uas >= 0.35 && $nilai_tugas >= 0.35 && $nilai_akhir >= 55) {
            $status = "Lulus";
        } else {
            $status = "Tidak Lulus";
        }
        // MENENTUKAN GRADE NILAI MENGGUNAKAN SYNTAX IF ELSEIF MULTIKONDISI
        /*
        - Grade E : Jika Nilai Akhir 0-35
        - Grade D : Jika Nilai Akhir 36-55
        - Grade C : Jika Nilai Akhir 56-69
        - Grade B : Jika Nilai Akhir 70-84
        - Grade A : Jika Nilai Akhir 85-100
        - Grade I : Jika Nilai Akhir < 0 atau Nilai Akhir > 100
        */
        if ($nilai_akhir >= 85 && $nilai_akhir <= 100) {
            $grade = "A";
        }
        elseif ($nilai_akhir >= 70 && $nilai_akhir < 85) {
            $grade = "B";
        }
        elseif ($nilai_akhir >= 60 && $nilai_akhir < 70) {
            $grade = "C";
        }
        elseif ($nilai_akhir >= 56 && $nilai_akhir < 60) {
            $grade = "D";
        }
        elseif ($nilai_akhir >= 36 && $nilai_akhir < 56) {
            $grade = "E";
        }
        else {
            $grade = "I";
        }
        // MENENTUKAN PREDIKAT NILAI MENGGUNAKAN SYNTAX SWITCH
        /*
        - Predikat Sangat Kurang : Jika Grade E
        - Predikat Kurang : Jika Grade D
        - Predikat Cukup : Jika Grade C
        - Predikat Memuaskan : Jika Grade B
        - Predikat Sangat Memuaskan : Jika Grade A
        - Predikat Tidak Ada : Jika Grade I
        */
        switch (true) {
            case ($grade == "A"):
                $predikat = "Sangat Memuaskan";
                break;
            case ($grade == "B"):
                $predikat = "Memuaskan";
                break;
            case ($grade == "C"):
                $predikat = "Cukup";
                break;
            case ($grade == "D"):
                $predikat = "Kurang";
                break;
            case ($grade == "E"):
                $predikat = "Sangat Kurang";
                break;
            default:
            $predikat = "Tidak Ada";
        }
            
        // MENCETAK HASIL
        echo 'Proses : ' . $proses;
        echo '<br/>Nama : ' . $nama;
        echo '<br/>Mata Kuliah : ' . $matkul;
        echo '<br/>Nilai UTS : ' . $nilai_uts;
        echo '<br/>Nilai UAS : ' . $nilai_uas;
        echo '<br/>Nilai Tugas Praktikum : ' . $nilai_tugas;
        // Mencetak Nilai Akhir, Status, Grade, dan Predikat
        echo '<br/>Nilai Akhir : ' . $nilai_akhir;
        echo '<br/>Status : ' . $status;
        echo '<br/>Grade : ' . $grade;
        echo '<br/>Predikat : ' . $predikat;
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>