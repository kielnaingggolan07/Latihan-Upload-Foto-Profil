<?php 
    include("./config.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>List Mahasiswa | Universitas Cambrige</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./bootstrap/bootstrap.css">
    </head>
    <body>
        <div class="container " style="height: 100vh;">
            <div class="row align-items-center h-100 d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="row">
                        <p class="fs-3 fw-bold mx-0 my-2">Mahasiswa yang sudah mendaftar</p>
                        <a href="./form-daftar.php" class="fs-5 fw-bold my-2">Tambah baru</a>
                        <table class="table my-4">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" scope="col">Foto</th>
                                    <th class="text-center align-middle" scope="col">NIS</th>
                                    <th class="text-center align-middle" scope="col">Nama</th>
                                    <th class="text-center align-middle" scope="col">Jenis Kelamin</th>
                                    <th class="text-center align-middle" scope="col">Telepon</th>
                                    <th class="text-center align-middle" scope="col">Alamat</th>
                                    <th class="text-center align-middle" scope="col" colspan="2">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM siswa";
                                    
                                    $result = mysqli_query($db, $query);
                                    
                                    while($siswa = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td><img src=\"./images/".$siswa['foto']."\" width='96' height='128'></td>";
                                        echo "<td>".$siswa["nis"]."</td>";
                                        echo "<td>".$siswa["nama"]."</td>";
                                        echo "<td>".$siswa["jenis_kelamin"]."</td>";
                                        echo "<td>".$siswa["telp"]."</td>";
                                        echo "<td>".$siswa["alamat"]."</td>";
                                        echo "<td><a href=\"./form-edit.php?id=" . $siswa["id"] . "\">Edit</a></td>";
                                        echo "<td><a href=\"./hapus.php?id=" . $siswa["id"] . "\">Hapus</a></td>";
                                        echo "<tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                        <p  class="fs-6 fw-bold m-0">Total: <?php echo mysqli_num_rows($result) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>