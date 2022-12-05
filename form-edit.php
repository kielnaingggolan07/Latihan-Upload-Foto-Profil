<?php

    include("config.php");

    if(!isset($_GET["id"])){
        header("Location: ./list-siswa.php");
    }

    $id = $_GET["id"];

    $query = "SELECT * FROM siswa WHERE id=$id";
    $result = mysqli_query($db, $query);
    $siswa = mysqli_fetch_assoc($result);
    
    if(mysqli_num_rows($result) < 1 ) {
        die("data tidak ditemukan...");
    }
    else {
        $jenis_kelamin = $siswa["jenis_kelamin"];
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Formulir Edit Mahasiswa | Universitas Cambrige</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./bootstrap/bootstrap.css">
    </head>

    <body>
        <div class="container " style="height: 100vh;">
            <div class="row align-items-center h-100 d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="row">
                        <form action="./proses-edit.php" method="POST" enctype="multipart/form-data">
                            <p class="fs-3 fw-bold mx-0 my-2">Formulir Edit Siswa</p>
                            <input type="hidden" name="id" value="<?php echo $siswa["id"] ?>">
                            
                            <div class="form-group row d-flex my-1">
                                <label class="col-md-2 col-form-label fs-5">NIS</label>
                                <div class="col-md-10 my-auto">
                                    <input type="text" class="form-control border-dark rounded-1" name="nis" placeholder="NIS" value="<?php echo $siswa["nis"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row d-flex my-1">
                                <label class="col-md-2 col-form-label fs-5">Nama</label>
                                <div class="col-md-10 my-auto">
                                    <input type="text" class="form-control border-dark rounded-1" name="nama" placeholder="nama" value="<?php echo $siswa["nama"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row d-flex my-1">
                                <label for="input-alamat" class="col-md-4 col-form-label fs-5">Jenis Kelamin</label>
                                <div class="col-md-8 my-auto d-flex">
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="radio-kelamin-lakilaki" value="laki-laki" 
                                            <?php 
                                                echo ($jenis_kelamin == "laki-laki") ? "checked" : ""
                                            ?>
                                        >
                                        <label class="form-check-label" for="radio-kelamin-lakilaki">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="radio-kelamin-perempuan" value="perempuan"
                                            <?php 
                                                echo ($jenis_kelamin == "perempuan") ? "checked" : ""
                                            ?>
                                        >
                                        <label class="form-check-label" for="radio-kelamin-perempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex my-1">
                                <label class="col-md-2 col-form-label fs-5">Telepon</label>
                                <div class="col-md-10 my-auto">
                                    <input type="text" class="form-control border-dark rounded-1" name="telp" placeholder="telepon" value="<?php echo $siswa["telp"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row d-flex my-1">
                                <label class="col-md-2 col-form-label fs-5">Alamat</label>
                                <div class="col-md-10 my-auto">
                                    <textarea class="form-control border-dark rounded-1" name="alamat" rows="3" cols="50" placeholder="alamat empat tinggal" ><?php echo $siswa["alamat"]; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row d-flex my-1">
                                <label class="col-md-2 col-form-label fs-5">Foto</label>
                                <div class="col-md-10 my-auto">
                                    <input type="file" class="form-control border-dark rounded-1" accept=".png, .jpg, .jpeg, .PNG" name="foto">
                                </div>
                            </div>
                            <input type="submit" class="mt-3 col-md-3 border-dark rounded-1 fw-bold" name="simpan" value="Simpan">
                            <a href="./list-siswa.php"><input type="button" class="mt-3 col-md-3 border-dark rounded-1 fw-bold" value="Batal"></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>