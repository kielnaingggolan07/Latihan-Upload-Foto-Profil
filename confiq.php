<?php
    $server = "localhost";
    $user = "id19796399_siswa";
    $password = "Suryaphpsql1.";
    $database = "id19796399_pendaftaran_siswa";

    $db = mysqli_connect($server, $user, $password, $database);

    if(!$db) {
        die("Failed to connect to database: " . mysqli_connect_error());
    }
?>