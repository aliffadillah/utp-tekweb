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
            border-radius: 8px; 
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* Add shadow to navbar */
        }
        .doppio-one-regular {
            font-family: 'Doppio One', sans-serif;
        }
    </style>
</head>
<body class="doppio-one-regular">
    <?php
        include '../connection.php';
        session_start();
    ?>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/wheelscape_1/assets/icon/Logo1.svg" alt="Wheelscape" width="150">
            </a>
            <ul class="nav justify-content-end grid gap-5">
                <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="/wheelscape_1/index.php">Home</a>
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
            <div class="carousel-item active" id="component">
                <img src="https://firebasestorage.googleapis.com/v0/b/prakgabungan.appspot.com/o/main%2FRed%20and%20Blue%20Modern%20Car%20Sale.png?alt=media&token=a5189b10-994c-41fa-94b2-f64102cf3db2" class="d-block w-100" alt="About Us">
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <h2 class="text-center">Tentang Kami</h2>
    <br>
    <div class="column gap-5 d-flex justify-content-center">
        <div class="card" style="width: 500px;">
            <div class="card-body">
                <h5 class="card-title">Tentang Wheelscape</h5>
                <p class="card-text">Wheelscape adalah showroom mobil terkemuka yang menyediakan berbagai pilihan mobil berkualitas dari berbagai merek ternama. Didirikan pada tahun 2024, kami berkomitmen untuk memberikan pengalaman terbaik dalam membeli mobil impian Anda.</p>
            </div>
        </div>
        <div class="card" style="width: 500px;">
            <div class="card-body">
                <h5 class="card-title">Visi Wheelscape</h5>
                <p class="card-text">Menjadi showroom mobil terpercaya yang memberikan solusi transportasi terbaik bagi setiap pelanggan.</p>
            </div>
        </div>
        <div class="card" style="width: 500px;">
            <div class="card-body">
                <h5 class="card-title">Misi Wheelscape</h5>
                <p class="card-text">1. Menyediakan berbagai pilihan mobil berkualitas dengan harga kompetitif. </p>
                <p class="card-text">2. Memberikan pelayanan pelanggan yang unggul dan personal.</p>
                <p class="card-text">3. Meningkatkan kepuasan pelanggan melalui inovasi dan perbaikan berkelanjutan.</p>
                <p class="card-text">4. Mendukung mobilitas masyarakat dengan menyediakan layanan purna jual yang handal.</p>
            </div>
        </div>
    </div>
    <br>
    </div>
</body>
</html>
