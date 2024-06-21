<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include '../connection.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM product WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $brand_mobil = $_POST['brand_mobil'];
    $tipe_mobil = $_POST['tipe_mobil'];
    $harga_mobil = $_POST['harga_mobil'];
    $kilometer = $_POST['km_mobil'];
    $transmisi = $_POST['transmisi_mobil'];
    $lokasi_mobil = $_POST['lokasi_mobil'];
    $bahan_bakar = $_POST['bahan_bakar'];
    $jumlah_kursi = $_POST['jumlah_kursi'];
    $kepemilikan = $_POST['kepemilikan'];
    $warna_mobil = $_POST['warna_mobil'];
    $tahun_mobil = $_POST['tahun_mobil'];

    $foto_dest = $row['foto_mobil'];
    if(isset($_FILES['input_foto']) && $_FILES['input_foto']['size'] > 0) {
        $foto_name = $_FILES['input_foto']['name'];
        $foto_tmp_name = $_FILES['input_foto']['tmp_name'];
        $foto_dest = 'foto_mobil/' . $foto_name;
        move_uploaded_file($foto_tmp_name, $foto_dest);
    }

    $query = "UPDATE product SET brand_mobil='$brand_mobil', type_mobil='$tipe_mobil', harga_mobil='$harga_mobil', kilometer='$kilometer', transmisi='$transmisi', lokasi_mobil='$lokasi_mobil', bahan_bakar='$bahan_bakar', jumlah_kursi='$jumlah_kursi', kepemilikan='$kepemilikan', warna_mobil='$warna_mobil', tahun_mobil='$tahun_mobil', foto_mobil='$foto_dest' WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if($result) {
        echo '<script>alert("Data berhasil diperbarui");</script>';
        header("Location: product_admin.php");
        exit();
    } else {
        echo '<script>alert("Gagal memperbarui data");</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheelscape</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Doppio+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/wheelscape_1/style.css">
</head>
<body class="doppio-one-regular">
<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/wheelscape_1/assets/icon/Logo1.svg" alt="Wheelscape" width="150">
        </a>
        <ul class="nav justify-content-end grid gap-5">
            <li class="nav-item">
                <a class="nav-link text-dark" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">About</a>
            </li>
            <li class="nav-item">
                <a href="#" type="button" class="btn btn-primary rounded-3" style="width: 142px; height: 43px; background-color: #829FEB; color: #000000;">Login</a>
            </li>
        </ul>
    </div>
</nav>
<hr>
<div class="container">
    <h3>Update Data</h3>
    <br>
    <form method="post" class="container" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <!-- Brand Mobil -->
        <div class="row ms-5" style="margin-bottom: 10px;">
            <label for="inputBrandMobil" class="col-sm-2 col-form-label">Brand Mobil</label>
            <div class="col-sm-10"> 
                <input name="brand_mobil" type="text" class="form-control" placeholder="Masukkan Brand Mobil" style="background-color:#F4EDED" value="<?php echo htmlspecialchars($row['brand_mobil']); ?>">
            </div>
        </div>
        <!-- Tipe Mobil -->
        <div class="row ms-5" style="margin-bottom: 10px;">
            <label for="inputTipeMobil" class="col-sm-2 col-form-label">Tipe Mobil</label>
            <div class="col-sm-10"> 
                <input name="tipe_mobil" type="text" class="form-control" placeholder="Masukkan Tipe Mobil" style="background-color:#F4EDED" value="<?php echo htmlspecialchars($row['type_mobil']); ?>">
            </div>
        </div>
        <!-- Harga Mobil -->
        <div class="row ms-5" style="margin-bottom: 10px;">
            <label for="inputHargaMobil" class="col-sm-2 col-form-label">Harga Mobil</label>
            <div class="col-sm-10"> 
                <input name="harga_mobil" type="text" class="form-control" placeholder="Masukkan Harga Mobil" style="background-color:#F4EDED" value="<?php echo htmlspecialchars($row['harga_mobil']); ?>">
            </div>
        </div>
        <!-- Kilometer -->
        <div class="row ms-5" style="margin-bottom: 10px;">
            <label for="inputKilometer" class="col-sm-2 col-form-label">Jumlah Kilometer</label>
            <div class="col-sm-10"> 
                <input name="km_mobil" type="text" class="form-control" placeholder="Masukkan Kilometer Mobil" style="background-color:#F4EDED" value="<?php echo htmlspecialchars($row['kilometer']); ?>">
            </div>
        </div>
        <!-- Transmisi -->
        <div class="row ms-5" style="margin-bottom: 10px;">
            <label for="inputTransmisi" class="col-sm-2 col-form-label">Transmisi</label>
            <div class="col-sm-10"> 
                <input name="transmisi_mobil" type="text" class="form-control" placeholder="Masukkan Transmisi Mobil" style="background-color:#F4EDED" value="<?php echo htmlspecialchars($row['transmisi']); ?>">
            </div>
        </div>
        <!-- Lokasi -->
        <div class="row ms-5" style="margin-bottom: 10px;">
            <label for="inputLokasiMobil" class="col-sm-2 col-form-label">Lokasi</label>
            <div class="col-sm-10"> 
                <input name="lokasi_mobil" type="text" class="form-control" placeholder="Masukkan Lokasi Mobil" style="background-color:#F4EDED" value="<?php echo htmlspecialchars($row['lokasi_mobil']); ?>">
            </div>
        </div>
        <!-- Bahan Bakar -->
        <div class="row ms-5" style="margin-bottom: 10px;">
            <label for="inputBahanBakar" class="col-sm-2 col-form-label">Bahan Bakar</label>
            <div class="col-sm-10"> 
                <input name="bahan_bakar" type="text" class="form-control" placeholder="Masukkan Bahan Bakar Mobil" style="background-color:#F4EDED" value="<?php echo htmlspecialchars($row['bahan_bakar']); ?>">
            </div>
        </div>
        <!-- Jumlah Kursi -->
        <div class="row ms-5" style="margin-bottom: 10px;">
            <label for="inputJumlahKursi" class="col-sm-2 col-form-label">Jumlah Kursi</label>
            <div class="col-sm-10"> 
                <input name="jumlah_kursi" type="text" class="form-control" placeholder="Masukkan Jumlah Kursi Mobil" style="background-color:#F4EDED" value="<?php echo htmlspecialchars($row['jumlah_kursi']); ?>">
            </div>
        </div>
        <!-- Kepemilikan -->
        <div class="row ms-5" style="margin-bottom: 10px;">
            <label for="inputKepemilikan" class="col-sm-2 col-form-label">Kepemilikan</label>
            <div class="col-sm-10"> 
                <input name="kepemilikan" type="text" class="form-control" placeholder="Masukkan Kepemilikan Mobil" style="background-color:#F4EDED" value="<?php echo htmlspecialchars($row['kepemilikan']); ?>">
            </div>
        </div>
        <!-- Warna -->
        <div class="row ms-5" style="margin-bottom: 10px;">
            <label for="inputWarnaMobil" class="col-sm-2 col-form-label">Warna</label>
            <div class="col-sm-10"> 
                <input name="warna_mobil" type="text" class="form-control" placeholder="Masukkan Warna Mobil" style="background-color:#F4EDED" value="<?php echo htmlspecialchars($row['warna_mobil']); ?>">
            </div>
        </div>
        <!-- Tahun -->
        <div class="row ms-5" style="margin-bottom: 10px;">
            <label for="inputTahunMobil" class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-10"> 
                <input name="tahun_mobil" type="text" class="form-control" placeholder="Masukkan Tahun Mobil" style="background-color:#F4EDED" value="<?php echo htmlspecialchars($row['tahun_mobil']); ?>">
            </div>
        </div>
        <!-- Foto Mobil -->
        <div class="row ms-5" style="margin-bottom: 10px;">
            <label for="inputFoto" class="col-sm-2 col-form-label">Foto Mobil</label>
            <div class="col-sm-10"> 
                <input type="file" name="input_foto" class="form-control" style="background-color:#F4EDED">
                <?php if($row['foto_mobil']) { ?>
                <img src="<?php echo $row['foto_mobil']; ?>" alt="Foto Mobil" width="150">
                <?php } ?>
            </div>
        </div>
        <!-- Submit Button -->
        <div class="row ms-5">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" name="update" class="btn btn-primary">Update Data</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
