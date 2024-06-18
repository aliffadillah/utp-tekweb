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
    <link rel="stylesheet" href="style.css">

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
    <?php
        include 'connection.php';

        // Proses form input
        if(isset($_POST['submit'])) {
            $brand_mobil = $_POST['brand_mobil'];
            $tipe_mobil = $_POST['tipe_mobil'];
            $harga_mobil = $_POST['harga_mobil'];
            
            // Upload foto
            $foto_name = $_FILES['input_foto']['name'];
            $foto_tmp_name = $_FILES['input_foto']['tmp_name'];
            $foto_dest = 'foto_mobil/' . $foto_name;
            move_uploaded_file($foto_tmp_name, $foto_dest);

            $query = "INSERT INTO product (brand_mobil, type_mobil, harga_mobil, foto_mobil) VALUES ('$brand_mobil', '$tipe_mobil', '$harga_mobil', '$foto_dest')";
            $result = mysqli_query($conn, $query);

            if($result) {
                echo '<script>alert("Data berhasil disimpan");</script>';
                header("Location: product.php");
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
                echo '<script>window.location.href="product.php";</script>';
            } else {
                echo '<script>alert("Data gagal dihapus");</script>';
            }
        }
    ?>   

    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="Logo1.png" alt="Wheelscape" width="150">
            </a>
            <ul class="nav justify-content-end grid gap-5">
                <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="main.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="product.php">Product</a>
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
    <br>
    <div id="carouselExampleInterval" class="carousel slide container" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000" id="component">
                <img src="https://firebasestorage.googleapis.com/v0/b/prakgabungan.appspot.com/o/main%2Fioniq6-banner.png?alt=media&token=a024bec6-8583-4839-8eed-9a5cd6cd6422" class="d-block w-100" alt="First slide">
            </div>
            <div class="carousel-item" data-bs-interval="10000">
                <img src="https://firebasestorage.googleapis.com/v0/b/prakgabungan.appspot.com/o/main%2Fioniqbatik-banner.jpg?alt=media&token=c573e1e1-64e3-49da-9008-0db5dc34c16e" class="d-block w-100" alt="Second slide">
            </div>
            <div class="carousel-item" data-bs-interval="10000">
                <img src="https://firebasestorage.googleapis.com/v0/b/prakgabungan.appspot.com/o/main%2Fpalisade-banner.jpg?alt=media&token=cf317e5e-2b48-4b6d-bdbb-4cf940b2800b" class="d-block w-100" alt="Third slide">
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
