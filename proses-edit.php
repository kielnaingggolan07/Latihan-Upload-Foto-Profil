<?php 
    
    include("config.php");

    if (isset($_POST["simpan"])) {
        
        $id = $_POST['id'];
        $nis = $_POST['nis'];
        $nama = $_POST["nama"];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        $query = "";

        if (isset($_FILES['foto']) && file_exists($_FILES['foto']['tmp_name'])) {
            $foto = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];

            $fotobaru = date('dmYHis').$foto;
            $path = "images/".$fotobaru;

            $query = "UPDATE siswa AS sw SET sw.nis = '$nis', sw.nama = '$nama', sw.jenis_kelamin = '$jenis_kelamin', sw.telp = '$telp', sw.alamat = '$alamat', sw.foto = '$fotobaru' WHERE sw.id = $id";

            $old_photo_query = "SELECT foto FROM siswa AS sw WHERE sw.id = '$id'";
            $old_photo_result = mysqli_query($db, $old_photo_query);
            $old_photo = mysqli_fetch_assoc($old_photo_result);

            if (move_uploaded_file($tmp, $path)) {
                $result = mysqli_query($db, $query);
                if ($result) {
                    if ($old_photo_result) {
                        
                        if(is_file("images/".$old_photo['foto'])) {
                            unlink("images/".$old_photo['foto']);
                        }
                    }
                    header("Location: ./list-siswa.php");
                }
                else {
                    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                    echo "<br><a href=\"./form-edit.php\">Kembali Ke Form</a>";
                }
            }
            else {
                echo "Maaf, Gambar gagal untuk diupload.";
                echo "<br><a href=\"./form-edit.php\">Kembali Ke Form</a>";
            }
        }
        else {
            $query = "UPDATE siswa AS sw SET sw.nis = '$nis', sw.nama = '$nama', sw.jenis_kelamin = '$jenis_kelamin', sw.telp = '$telp', sw.alamat = '$alamat' WHERE sw.id = $id";
            $result = mysqli_query($db, $query);
            if ($result) {
                header("Location: ./list-siswa.php");
            }
            else {
                echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                echo "<br><a href=\"./form-edit.php\">Kembali Ke Form</a>";
            }
        }
    }
    else {
        header("HTTP/1.0 403 Forbidden");
    }
?>