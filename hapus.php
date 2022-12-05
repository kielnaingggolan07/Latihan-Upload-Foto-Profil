<?php

    include("config.php");

    if( isset($_GET["id"]) ){

        $id = $_GET["id"];

        $query = "DELETE FROM siswa WHERE id=$id";
        $result = mysqli_query($db, $query);

        // apakah query hapus berhasil?
        if($result) {
            header("Location: ./list-siswa.php");
        } 
        else {
            die("gagal menghapus...");
        }
    } 
    else {
        header("HTTP/1.0 403 Forbidden");
    }
?>