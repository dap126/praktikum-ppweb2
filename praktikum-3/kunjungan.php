<?php 
require_once ("bukutamu.php");
session_start();

// Jika data belum diinput, maka kita akan arahkan ke halaman input data
if(!isset($_SESSION['bukutamu'])) {
    $_SESSION['bukutamu'] = [];
}

// Jika tombol simpan ditekan
 if(isset($_POST['submit'])) {
    $bukutamu = new Bukutamu();
    $bukutamu->timestamp = date('Y-m-d H:i:s');
    $bukutamu->fullname = $_POST['fullname'];
    $bukutamu->email = $_POST['email'];
    $bukutamu->msg = $_POST['msg'];

    array_push($_SESSION['bukutamu'], $bukutamu);
}
?>

<!DOCTYPE html>
<head>
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4">Daftar Kunjungan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['bukutamu'] as $entry) :?>
                    <tr>
                        <td>
                            <?php echo htmlspecialchars($entry->timestamp);?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($entry->fullname);?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($entry->email);?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($entry->msg);?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <a href="index.php">&lt;&lt;&lt; Kembali</a>
    </div>
</body>
</html>