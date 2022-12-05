<?php 
    
    include("config.php");
    
      if (isset($_POST["daftar"])) {

        $nis = $_POST['nis'];
        $nama = $_POST["nama"];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        $fotobaru = date('dmYHis').$foto;
        $path = "images/".$fotobaru;

        if(move_uploaded_file($tmp, $path)) {

            // Proses simpan ke Database
            $query = "INSERT INTO siswa (nis, nama, jenis_kelamin, telp, alamat, foto) VALUE ('$nis', '$nama', '$jenis_kelamin', '$telp', '$alamat', '$fotobaru')";

            $result = mysqli_query($db, $query);
            
            if ($result) {
                header("Location: ./index.php");
            } 
            else {
                echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                echo "<br><a href=\"./form-daftar.php\">Kembali Ke Form</a>";
            }
        } 
        else {

            echo "Maaf, Gambar gagal untuk diupload.";
            echo "<br><a href=\"./form-daftar.php\">Kembali Ke Form</a>";
        }
      }
    else {
        header("HTTP/1.0 403 Forbidden");
    }
?>