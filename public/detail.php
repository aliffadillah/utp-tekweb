<?php
session_start();
include '../connection.php';

// Memeriksa apakah parameter ID tersedia dan valid
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    // Query untuk mengambil data produk berdasarkan ID
    $query = "SELECT * FROM product WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah hasil query mengembalikan baris data
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // Tindakan jika produk tidak ditemukan
        echo "Produk tidak ditemukan.";
        exit; // Hentikan eksekusi lebih lanjut jika produk tidak ditemukan
    }
} else {
    // Tindakan jika parameter ID tidak diberikan atau tidak valid
    echo "Parameter ID tidak valid.";
    exit; // Hentikan eksekusi lebih lanjut jika parameter ID tidak valid
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail - Wheelscape</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Doppio+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://firebasestorage.googleapis.com/v0/b/prakgabungan.appspot.com/o/style%2Fstyle.css?alt=media&token=27f48715-aa0b-470d-88f2-d7d558b5f50d">
    <!-- <style>
        .flex-container {
            display: flex;
            align-items: flex-start; /* Align items to the top of the flex container */
            gap: 20px; /* Adjust gap between image and text */
        }
        .flex-container img {
            border-radius: 8px;
            width: 750px;
            height: 500px;
            object-fit: cover; /* Ensures the image covers the specified dimensions */
        }
        .flex-container > div {
            flex: 1; /* Allow the text container to grow */
        }
        .flex-container h2,
        .flex-container p {
            text-align: left; /* Align text to the left */
            margin-top: 0; /* Remove default margin */
        }
        .card {
            height: 75px;
            width: 550px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .card p {
            margin: 0.5rem; /* Adjust margin for better spacing */
        }

        .btn-custom {
            color: black !important; /* Set text color to black */
        }
    </style> -->
</head>
<body class="doppio-one-regular">
<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/wheelscape_1/assets/icon/Logo1.svg" alt="Wheelscape" width="150">
        </a>
        <ul class="nav justify-content-end grid gap-5">
            <li class="nav-item">
                <a class="nav-link text-dark" aria-current="page" href="\wheelscape_1\index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="product.php">Product</a>
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
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                <?php else: ?>
                    <a href="login.php" class="btn btn-primary rounded-3" style="width: 142px; height: 43px; background-color: #829FEB; color: #000000;">Login</a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>
<br>
<div class="container flex-container">
    <img src="<?php echo $row['foto_mobil']; ?>" alt="...">
    <div>
        <br>
        <h2 style="text-align: left;"><?php echo $row['brand_mobil'] . ' - ' . $row['type_mobil']; ?></h2>
        <p style="text-align: left;"><?php echo $row['kilometer'] . ' KM | ' . $row['transmisi']; ?></p>
        <h4 style="text-align: left;">Rp. <?php echo $row['harga_mobil']; ?></h4>
        <hr>
        <div class="card">
            <p class="m-2">Car Location</p>
            <p class="m-2 text-secondary"><?php echo $row['lokasi_mobil']; ?></p>
        </div>
        <br>
        <p style="text-align: left;">Fuel Type : <?php echo $row['bahan_bakar']; ?></p>
        <p style="text-align: left;">Seat : <?php echo $row['jumlah_kursi']; ?></p>
        <p style="text-align: left;">Registration Type : <?php echo $row['kepemilikan']; ?></p>
        <p style="text-align: left;">Current Color : <?php echo $row['warna_mobil']; ?></p>
        <p style="text-align: left;">Registration Date : <?php echo $row['tahun_mobil']; ?></p>
        <br>
        <div class="container text-end">
            <button type="button" class="btn btn-outline-warning btn-custom">Hubungi Kami</button>
        </div>
    </div>
</div>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
