<?php
require_once 'koneksi.php';

// // jika tombol daftar ditekan, ambil data dari form dan simpan ke database
if (isset($_POST['submit'])) {
    // mengambil data yang diinputkan pada form pendaftaran
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $semester = $_POST['semester'];
    $ipk = $_POST['ipk'];
    $beasiswa = $_POST['beasiswa'];
    $berkas = $_FILES['berkas'];
    $status_ajuan = "belum di verifikasi";
 

    //folder tujuan upload file
    $target_dir = "data/";

    // nama file yang diupload beserta path-nya
    $target_file = $target_dir . basename($_FILES["berkas"]);

    // ekstensi file yang diupload
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //  simpan file ke folder tujuan upload
    move_uploaded_file($_FILES["berkas"], $target_file);

    //  query untuk memasukkan data ke database
    $query = "INSERT INTO mahasiswa (nama, email, nohp, semester, ipk, beasiswa, berkas, status_ajuan) 
	          VALUES ('$nama', '$email', '$nohp', $semester, $ipk, '$beasiswa', '$berkas', '$status_ajuan')";

    //jalankan query dan simpan hasilnya
    $result = mysqli_query($sat, $query);

    // cek apakah query berhasil dijalankan atau tidak
    if ($result) {
        echo "<script>alert('Pendaftaran berhasil!');</script>";
    } else {
        echo "<script>alert('Pendaftaran gagal!');</script>";
    }
}

// menutup koneksi database
mysqli_close($sat);
?>
