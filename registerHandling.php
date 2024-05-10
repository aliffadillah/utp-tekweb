<?php
    $uploadfile = __DIR__ . '\\foto_mobil\\' . basename($_FILES['input_foto']['name']);
    var_dump($uploadfile);
    if (move_uploaded_file($_FILES['input_foto']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }