CREATE DATABASE pendaftaran_siswa;

CREATE TABLE pendaftaran_siswa.siswa (
    id INT NOT NULL AUTO_INCREMENT,
    nis VARCHAR(11) NOT NULL,
    nama VARCHAR(64) NOT NULL,
    jenis_kelamin VARCHAR(16) NOT NULL,
    telp VARCHAR(16) NOT NULL,
    alamat TEXT NOT NULL,
    foto VARCHAR(256) NOT NULL,

    PRIMARY KEY(id)
);
