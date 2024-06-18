<?php
    include 'connection.php';

    
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

        $query = "UPDATE product SET brand_mobil='$brand_mobil', type_mobil='$tipe_mobil', harga_mobil='$harga_mobil' WHERE id=$id";
        $result = mysqli_query($conn, $query);

        if($result) {
            echo '<script>alert("Data berhasil diperbarui");</script>';
            header("Location: product.php");
            exit();
        } else {
            echo '<script>alert("Gagal memperbarui data");</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheelscape</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Doppio+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
</head>
<body class="doppio-one-regular">
<nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./Wheelscape.png" alt="Wheelscape" width="150">
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
        <form method="post" class="container">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <!-- Brand Mobil -->
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputBrandMobil" class="col-sm-2 col-form-label">Brand Mobil</label>
                <div class="col-sm-10"> 
                    <input name="brand_mobil" type="text" class="form-control" placeholder="Masukkan Brand Mobil" style="background-color:#F4EDED" value="<?php echo $row['brand_mobil']; ?>">
                </div>
            </div>
            <!-- Tipe Mobil -->
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputTipeMobil" class="col-sm-2 col-form-label">Tipe Mobil</label>
                <div class="col-sm-10"> 
                    <input name="tipe_mobil" type="text" class="form-control" placeholder="Masukkan Tipe Mobil" style="background-color:#F4EDED" value="<?php echo $row['type_mobil']; ?>">
                </div>
            </div>
            <!-- Harga Mobil -->
            <div class="row ms-5" style="margin-bottom: 10px;">
                <label for="inputHargaMobil" class="col-sm-2 col-form-label">Harga Mobil</label>
                <div class="col-sm-10"> 
                    <input name="harga_mobil" type="text" class="form-control" placeholder="Masukkan Harga Mobil" style="background-color:#F4EDED" value="<?php echo $row['harga_mobil']; ?>">
                </div>
            </div>
            <br>
            <div class="position-relative">
                <button type="submit" name="update" class="btn btn-success position-absolute end-0">
                    Update
                </button>
            </div>
            <br>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
