<?php
require_once 'koneksi.php';

// jika tombol daftar ditekan, ambil data dari form dan simpan ke database
if (isset($_POST['submit'])) {
    // mengambil data yang diinputkan pada form pendaftaran
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $semester = $_POST['semester'];
    $ipk = $_POST['ipk'];
    $beasiswa = $_POST['beasiswa'];
    $berkas = $_FILES['berkas']['name']; // ambil nama file

    //folder tujuan upload file
    $target_dir = "data/";

    // nama file yang diupload beserta path-nya
    $target_file = $target_dir . basename($_FILES["berkas"]["name"]);

    // ekstensi file yang diupload
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //  simpan file ke folder tujuan upload
    if (move_uploaded_file($_FILES["berkas"]["tmp_name"], $target_file)) {

        //  query untuk memasukkan data ke database
        $query = "INSERT INTO mahasiswa (nama, email, nohp, semester, ipk, beasiswa, berkas, status_ajuan) 
                  VALUES ('$nama', '$email', '$nohp', $semester, $ipk, '$beasiswa', '$target_file', 'belum di verifikasi')";

        //jalankan query dan simpan hasilnya
        $result = mysqli_query($sat, $query);

        // cek apakah query berhasil dijalankan atau tidak
        if ($result) {
            echo "<script>alert('Pendaftaran berhasil!');</script>";
            header("Location: hasil.php");
        } else {
            echo "<script>alert('Pendaftaran gagal!');</script>";
        }
    } else {
        echo "<script>alert('Upload file gagal!');</script>";
    }
}

// menutup koneksi database
mysqli_close($sat);
?>
