<?php
    session_start();
    include '../connection.php';
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
    <link rel="stylesheet" href="../style.css">
    <style>
        .carousel-item img {
            border-radius: 8px; /* Membuat gambar menjadi bulat */
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* Menambahkan shadow pada navbar */
        }
    </style>
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
                <a class="nav-link text-dark" href="#">About</a>
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
    <div id="carouselExampleInterval" class="carousel slide container" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000" id="component">
                <img src="https://firebasestorage.googleapis.com/v0/b/prakgabungan.appspot.com/o/main%2FOrange%20Black%20and%20White%20Photo%20Cars%20For%20Men%20Instagram%20Post%20(1296%20x%20502%20px).png?alt=media&token=5d3efbae-5417-4c37-9091-367332ebc1f5" class="d-block w-100" alt="First slide">
            </div>
            <div class="carousel-item" data-bs-interval="10000">
                <img src="https://firebasestorage.googleapis.com/v0/b/prakgabungan.appspot.com/o/main%2FWhite%20and%20Yellow%20Modern%20Car%20Sale%20Facebook%20Ad%20(1296%20x%20502%20px).png?alt=media&token=3d853cf4-973a-4dfc-ac72-00f66a541aad" class="d-block w-100" alt="Second slide">
            </div>
            <div class="carousel-item" data-bs-interval="10000">
                <img src="https://firebasestorage.googleapis.com/v0/b/prakgabungan.appspot.com/o/main%2Fwhite%20grey%20car%20sale%20promotion%20facebook%20cover%20(1296%20x%20502%20px).png?alt=media&token=d7ee68df-371c-4c57-ae65-0c67be643619" class="d-block w-100" alt="Third slide">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    <div class="container">
        <h3>Produk</h3>
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
                    echo '<a href="detail.php?id=' . $row['id'] . '" class="btn btn-outline-primary" style="width: 150px">Detail</a>';
                    // echo '<a href="?id=' . $row['id'] . '" onclick="return confirm(\'Anda yakin ingin menghapus data ini?\')" class="btn btn-outline-danger" style="width: 150px">Hubungi</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
        <br>
    </div>
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="a35190ae-c8f5-47b3-8927-3772ccd19abe";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

