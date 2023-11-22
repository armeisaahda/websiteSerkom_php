<?php
require_once 'koneksi.php'; // mengimpor konfigurasi koneksi database

$query = "SELECT * FROM mahasiswa"; // menyimpan query untuk mengambil seluruh data pendaftar
$result = mysqli_query($sat, $query); // mengeksekusi query dan menyimpan hasilnya pada variabel $result
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="sUTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--CDN CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Armeisa - Hasil</title>
</head>

<body>
  <!--nav section start-->
  <nav class="navbar navbar-expand-lg navbar-light bg-black fixed-top">
    <div class="container">
      <a class="navbar-brand font-weight-bold text-white" href="#">Beasiswa Pintar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item" style="margin-left: 40px;">
            <a class="nav-link active text-white" aria-current="page" href="index.php">Pilihan Beasiswa</a>
          </li>
          <li class="nav-item" style="margin-left: 40px;">
            <a class="nav-link text-white" href="daftar.php">Daftar</a>
          </li>
          <li class="nav-item" style="margin-left: 40px;">
            <a class="nav-link text-white" href="hasil.php">Hasil</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--nav section end-->

  <div class="container">
        <h1 class="text-center mt-5 mb-5 text-black">Tabel Hasil Pendaftaran</h1>
        <table class="table border-white-700 bg-[#FDA9A5] text-black">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Semester</th>
                    <th>IPK</th>
                    <th>Jenis Beasiswa</th>
                    <th>Berkas</th>
                    <th>Status Ajuan</th>
                </tr>
            </thead>

            <tbody>

                <!-- mengambil data secara berulang dari variabel $result hingga data yang tersedia habis. -->
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                    <!-- akan ditampilkan data dalam bentuk tabel dengan menggunakan tag <tr> untuk setiap baris data, dan tag <td> untuk setiap kolom data yang diambil dari variabel $row sesuai dengan nama kolom di tabel database. 
                    Nilai dari setiap kolom data tersebut ditampilkan menggunakan fungsi echo untuk mencetak nilainya ke dalam HTML.
                     -->
                    <tr>
                        <td>
                            <?php echo $row['nama']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['nohp']; ?>
                        </td>
                        <td>
                            <?php echo $row['semester']; ?>
                        </td>
                        <td>
                            <?php echo $row['ipk']; ?>
                        </td>
                        <td>
                            <?php echo $row['beasiswa']; ?>
                        </td>
                        <td>
                            <?php echo $row['berkas']; ?>
                        </td>
                        <td>
                            <?php echo $row['status_ajuan']; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
  <!--CDN JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>

<?php
mysqli_close($sat);
?>

