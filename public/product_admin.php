<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include '../connection.php';

// Proses form input
if(isset($_POST['submit'])) {
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
    
    // Upload foto
    $foto_name = $_FILES['input_foto']['name'];
    $foto_tmp_name = $_FILES['input_foto']['tmp_name'];
    $foto_dest = 'foto_mobil/' . $foto_name;
    move_uploaded_file($foto_tmp_name, $foto_dest);

    $query = "INSERT INTO product (brand_mobil, type_mobil, harga_mobil, kilometer, transmisi, lokasi_mobil, bahan_bakar, jumlah_kursi, kepemilikan, warna_mobil, tahun_mobil, foto_mobil) VALUES ('$brand_mobil', '$tipe_mobil', '$harga_mobil', '$kilometer', '$transmisi', '$lokasi_mobil', '$bahan_bakar', '$jumlah_kursi', '$kepemilikan', '$warna_mobil', '$tahun_mobil', '$foto_dest')";
    $result = mysqli_query($conn, $query);

    if($result) {
        echo '<script>alert("Data berhasil disimpan");</script>';
        header("Location: product_admin.php");
        exit();
    } else {
        echo '<script>alert("Data gagal disimpan");</script>';
    }
}

// Proses penghapusan data
if(isset($_GET['id'])) {
    $delete_id = $_GET['id'];
    $query = "DELETE FROM product WHERE id = $delete_id";
    $result = mysqli_query($conn, $query);

    if($result) {
        echo '<script>alert("Data berhasil dihapus");</script>';
        echo '<script>window.location.href="product_admin.php";</script>';
    } else {
        echo '<script>alert("Data gagal dihapus");</script>';
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
            <a class="navbar-brand" href="/wheelscape_1/index.php">
                <img src="/wheelscape_1/assets/icon/Logo1.svg" alt="Wheelscape" width="150">
            </a>
            <ul class="nav justify-content-end grid gap-5">
                <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="product_admin.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="aboutus.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <?php if(isset($_SESSION['nama'])): ?>
                        <a class="btn btn-primary dropdown-toggle rounded-3" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="width: 142px; height: 43px; background-color: #829FEB; color: #000000;">
                            <?php echo htmlspecialchars($_SESSION['nama']); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-primary rounded-3" style="width: 142px; height: 43px; background-color: #829FEB; color: #000000;">Login</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </nav>
    <hr>

    <div class="container">
        <h3>Masukkan Data</h3>
        <br>
        <form method="post" class="container" enctype="multipart/form-data">
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputBrandMobil" class="col-sm-2 col-form-label">Brand Mobil</label>
                <div class="col-sm-10"> 
                    <input name="brand_mobil" type="text" class="form-control" placeholder="Masukkan Brand Mobil" style="background-color:#F4EDED">
                </div>
            </div>
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputTipeMobil" class="col-sm-2 col-form-label">Tipe Mobil</label>
                <div class="col-sm-10"> 
                    <input name="tipe_mobil" type="text" class="form-control" placeholder="Masukkan Tipe Mobil" style="background-color:#F4EDED">
                </div>
            </div>
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputHargaMobil" class="col-sm-2 col-form-label">Harga Mobil</label>
                <div class="col-sm-10"> 
                    <input name="harga_mobil" type="text" class="form-control" placeholder="Masukkan Harga Mobil" style="background-color:#F4EDED">
                </div>
            </div>
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputKilometer" class="col-sm-2 col-form-label">Jumlah Kilometer</label>
                <div class="col-sm-10"> 
                    <input name="km_mobil" type="text" class="form-control" placeholder="Masukkan Kilometer Mobil" style="background-color:#F4EDED">
                </div>
            </div>
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputTransmisi" class="col-sm-2 col-form-label">Transmisi</label>
                <div class="col-sm-10"> 
                    <input name="transmisi_mobil" type="text" class="form-control" placeholder="Masukkan Transmisi Mobil" style="background-color:#F4EDED">
                </div>
            </div>
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputLokasiMobil" class="col-sm-2 col-form-label">Lokasi</label>
                <div class="col-sm-10"> 
                    <input name="lokasi_mobil" type="text" class="form-control" placeholder="Masukkan Lokasi Mobil" style="background-color:#F4EDED">
                </div>
            </div>
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputBahanBakar" class="col-sm-2 col-form-label">Bahan Bakar</label>
                <div class="col-sm-10"> 
                    <input name="bahan_bakar" type="text" class="form-control" placeholder="Masukkan Bahan Bakar Mobil" style="background-color:#F4EDED">
                </div>
            </div>
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputJumlahKursi" class="col-sm-2 col-form-label">Jumlah Kursi</label>
                <div class="col-sm-10"> 
                    <input name="jumlah_kursi" type="text" class="form-control" placeholder="Masukkan Jumlah Kursi Mobil" style="background-color:#F4EDED">
                </div>
            </div>
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputKepemilikan" class="col-sm-2 col-form-label">Kepemilikan</label>
                <div class="col-sm-10"> 
                    <input name="kepemilikan" type="text" class="form-control" placeholder="Masukkan Kepemilikan" style="background-color:#F4EDED">
                </div>
            </div>
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputWarnaMobil" class="col-sm-2 col-form-label">Warna Mobil</label>
                <div class="col-sm-10"> 
                    <input name="warna_mobil" type="text" class="form-control" placeholder="Masukkan Warna Mobil" style="background-color:#F4EDED">
                </div>
            </div>
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputTahunMobil" class="col-sm-2 col-form-label">Tahun Mobil</label>
                <div class="col-sm-10"> 
                    <input name="tahun_mobil" type="text" class="form-control" placeholder="Masukkan Tahun Mobil" style="background-color:#F4EDED">
                </div>
            </div>
            <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
            <div class="row ms-5" style="margin-bottom: 50px;">
                <label for="formFile" class="form-label">Masukkan Foto</label>
                <input name="input_foto" class="form-control" type="file" id="formFile">
            </div>
            <div class="position-relative">
                <button type="submit" name="submit" class="btn btn-success position-absolute end-0">
                    Simpan
                </button>
            </div>
            <br>
        </form>
    </div>
    <br>
    <hr>
    <br>
    <div class="container">
        <h3>Product</h3>
        <br>
        <div class="row gap-5 d-flex justify-content-center">
            <?php
                $query = "SELECT * FROM product";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card" style="width: 18rem;">';
                    echo '<img src="' . $row['foto_mobil'] . '" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['brand_mobil'] . '</h5>';
                    echo '<p class="card-text">' . $row['type_mobil'] . '</p>';
                    echo '<p class="card-text">Rp ' . $row['harga_mobil'] . '</p>';
                    echo '<div class="col gap-2 d-flex justify-content-center">';
                    echo '<a href="update_form.php?id=' . $row['id'] . '" class="btn btn-outline-primary" style="width: 150px">Edit</a>';
                    echo '<a href="?id=' . $row['id'] . '" onclick="return confirm(\'Anda yakin ingin menghapus data ini?\')" class="btn btn-outline-danger" style="width: 150px">Delete</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
        <br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>