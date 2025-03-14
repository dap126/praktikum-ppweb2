<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Selamat Datang di Perpustakaan STT-NF</h2>
        <p>Silahkan isi buku tamu dibawah ini!</p>
        <hr>
        <br>
        <form method="POST" action="kunjungan.php">
          <div class="form-group row">
            <label for="fullname" class="col-4 col-form-label">Nama Lengkap</label> 
            <div class="col-8">
              <input id="fullname" name="fullname" placeholder="Nama Lengkap" type="text" required="required" class="form-control" aria-describedby="fullnameHelpBlock"> 
              <span id="fullnameHelpBlock" class="form-text text-muted">Isi nama sesuai dengan KTP/Kartu Pelajar</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-4 col-form-label">Email</label> 
            <div class="col-8">
              <input id="email" name="email" placeholder="admin@gmail.com" type="text" aria-describedby="emailHelpBlock" required="required" class="form-control"> 
              <span id="emailHelpBlock" class="form-text text-muted">Isi dengan akun email aktif</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="msg" class="col-4 col-form-label">Keperluan</label> 
            <div class="col-8">
              <textarea id="msg" name="msg" cols="40" rows="2" class="form-control" required="required" aria-describedby="msgHelpBlock"></textarea> 
              <span id="msgHelpBlock" class="form-text text-muted">Tuliskan maksud dari keperluanmu</span>
            </div>
          </div> 
          <div class="form-group row">
            <div class="offset-4 col-8">
              <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
    </div>
</body>
</html>