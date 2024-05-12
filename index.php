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
</head>
<body class="doppio-one-regular">
    <?php
        include 'connection.php';
    ?>   
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
                        <a href="https://www.pornhub.com/" type="button" class="btn btn-primary rounded-3" style="width: 142px; height: 43px; background-color: #829FEB; color: #000000;">Login</a>
                    </li>
                    </ul>
            </div>
        </nav>
        <hr>
        <div class="container">
            <h3>Masukkan Data</h3>
            <br>
            <form method="post" action="registerHandling.php" class="container" enctype="multipart/form-data">
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
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <div class="row ms-5" style="margin-bottom: 50px;">
                    <label for="formFile" class="form-label">Masukkan Foto</label>
                    <input name="input_foto" class="form-control" type="file" id="formFile">
                </div>
                <div class="position-relative">
                <button type="submit" class="btn btn-success position-absolute end-0">
                    Simpan
                </button>
            </div>
            <br>
            </form>
        </div>
        <br>
        <hr>
        <div class="container">
            <h3>Produk</h3>
            <br>
            <div class="row gap-5 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <img src="./foto_mobil/eqb_available-models_554-x-369.webp" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mercedes Benz</h5>
                    <p class="card-text">EQB Models</p>
                    <p class="card-text">Rp 1.550.000.000</p>
                    <div class="col gap-2 d-flex justify-content-center">
                        <a type="button" class="btn btn-outline-primary" style="width: 150px">Update</a>
                        <a type="button" class="btn btn-outline-danger" style="width: 150px">Delete</a>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="./foto_mobil/eqb_available-models_554-x-369.webp" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mercedes Benz</h5>
                    <p class="card-text">EQB Models</p>
                    <p class="card-text">Rp 1.550.000.000</p>
                    <div class="col gap-2 d-flex justify-content-center">
                        <a type="button" class="btn btn-outline-primary" style="width: 150px">Update</a>
                        <a type="button" class="btn btn-outline-danger" style="width: 150px">Delete</a>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="./kucing.JPEG" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mercedes Benz</h5>
                    <p class="card-text">EQB Models</p>
                    <p class="card-text">Rp 1.550.000.000</p>
                    <div class="col gap-2 d-flex justify-content-center">
                        <a type="button" class="btn btn-outline-primary" style="width: 150px">Update</a>
                        <a type="button" class="btn btn-outline-danger" style="width: 150px">Delete</a>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="./foto_mobil/eqb_available-models_554-x-369.webp" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mercedes Benz</h5>
                    <p class="card-text">EQB Models</p>
                    <p class="card-text">Rp 1.550.000.000</p>
                    <div class="col gap-2 d-flex justify-content-center">
                        <a type="button" class="btn btn-outline-primary" style="width: 150px">Update</a>
                        <a type="button" class="btn btn-outline-danger" style="width: 150px">Delete</a>
                    </div>
                </div>
            </div>
            </div>
            <br>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>