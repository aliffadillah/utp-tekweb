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
    <link rel="stylesheet" href="https://firebasestorage.googleapis.com/v0/b/prakgabungan.appspot.com/o/style%2Fstyle.css?alt=media&token=e2f87f67-9543-4496-85be-cb0830057fce">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            font-family: 'Doppio One', sans-serif;
        }
        .video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        .video-container video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
        }
        .overlay-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }
    </style>
</head>
<body class="doppio-one-regular">
    <?php
        include './connection.php';
        session_start();
    ?>
    <nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="/wheelscape_1/index.php">
            <img src="/wheelscape_1/assets/icon/Logo2.svg" alt="Wheelscape" width="150">
        </a>
        <ul class="nav justify-content-end grid gap-5">
            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="/wheelscape_1/index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/wheelscape_1/public/product.php">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/wheelscape_1/public/aboutus.php">About</a>
            </li>
            <li class="nav-item dropdown">
                    <?php if(isset($_SESSION['nama'])): ?>
                        <a class="btn btn-primary dropdown-toggle rounded-3" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="width: 142px; height: 43px; background-color: #829FEB; color: #000000;">
                            <?php echo htmlspecialchars($_SESSION['nama']); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="\wheelscape_1\public\logout.php">Logout</a></li>
                        </ul>
                    <?php else: ?>
                        <a href="public/login.php" class="btn btn-primary rounded-3" style="width: 142px; height: 43px; background-color: #829FEB; color: #000000;">Login</a>
                    <?php endif; ?>
                    </li>
        </ul>
    </div>
</nav>
    <div class="video-container">
        <video autoplay loop muted>
            <source src="./video/videoplayback.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="overlay-content">
        <h1>Welcome to Wheelscape</h1>
        <p>Your ultimate destination for the latest car models.</p>
        <a href="/wheelscape_1/public/product.php" class="btn btn-primary rounded-3" style="background-color: #829FEB; color: #000000;">Explore Now</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
