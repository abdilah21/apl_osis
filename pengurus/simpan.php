<?php
    include '../app/config/config.php';
    include '../app/config/variabel.php';
    // menyimpan data kedalam variabel
    date_default_timezone_set('Asia/Jakarta');
    $nis   = $_POST['TxtNis'];
    $nama     = $_POST['TxtNama'];
    $jenisKelamin    = $_POST['TxtJenisKelamin'];
    $jabatan   = $_POST['TxtJabatan'];
    $kelas   = $_POST['TxtKelas'];
	
    // query SQL untuk insert data
    $query="INSERT INTO pengurus SET nis='$nis',nama='$nama',jenisKelamin='$jenisKelamin',jabatan='$jabatan',kelas='$kelas'";
    mysqli_query($koneksi, $query)or die(mysqli_error($koneksi)); 
    //mengalihkan ke halaman index.php
    echo '<script>alert("Data Berhasil Disimpan!")</script>';
    header("Location:" . base_url . "/pengurus");
?>