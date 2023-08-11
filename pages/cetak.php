<?php
include'../includes/connection.php';
?><?php
$host      = "localhost";
$user      = "root";
$pass      = "";
$db        = "scms";

$koneksi   = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("tidak bisa terkoneksi ke database");
}

$nama_aplikasi          ="";
$nama              = "";
$gitlink           = "";
$penanggung_jawab  = "";
$deskripsi         = "";
$progress          ="";
$sukses            = "";
$error             = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}


if (isset($_POST['simpan'])) {
    $nama_aplikasi              = $_POST['nama_aplikasi'];
    $gitlink           = $_POST['gitlink'];
    $penanggung_jawab  = $_POST['penanggung_jawab'];
    $deskripsi         = $_POST['deskripsi'];

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan Aplikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>

        <!-- untuk mengeluarkan data--> 
        <div class="mx-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Aplikasi</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Gitlink</th>
                                <th scope="col">Penanggung jawab</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Progress</th>


                            </tr>
                        <tbody>
                            <?php
                            $sql2  = "select * from input_aplikasi order by id desc";
                            $q2   = mysqli_query($koneksi, $sql2);
                            $urut  = 1;
                            while ($r2 = mysqli_fetch_array($q2)) {
                                $id     = $r2['id'];
                                $nama_aplikasi   = $r2['nama_aplikasi'];
                                $gitlink = $r2['gitlink'];
                                $penanggung_jawab = $r2['penanggung_jawab'];
                                $deskripsi = $r2['deskripsi'];

                            }
                            ?>

<?php
                            $sql2  = "select * from data_aplikasi order by id desc";
                            $q2   = mysqli_query($koneksi, $sql2);
                            $urut  = 1;
                            while ($r2 = mysqli_fetch_array($q2)) {
                                $nama_aplikasi = $r2['nama_aplikasi'];
                                $nama    = $r2['nama'];
                                $progress = $r2['progress'];


                            ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $urut++ ?>
                                    </th>
                                    <td scope="row">
                                        <?php echo $nama_aplikasi ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $nama ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $gitlink ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $penanggung_jawab ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $deskripsi ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $progress ?>
                                    </td>
                                </tr>
                            <?php


                            }
                            ?>
                        </tbody>

                        </thead>
                    </table>
                    <script>
                        window.print();
                        </script>
                </div>
                <form action="" method="POST">
                </form>
            </div>
        </div>
    </div>
</body>

</html>