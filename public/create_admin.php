<?php
include '../connection.php';

// Check if the admin already exists
$check_query = "SELECT * FROM users WHERE email = 'alif@admin.com'";
$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) == 0) {
    // Password admin hash
    $admin_password = password_hash('alifadmin', PASSWORD_DEFAULT);

    $query = "INSERT INTO users (nama, email, password, role) VALUES ('alif admin', 'alif@admin.com', '$admin_password', 'admin')";
    if (mysqli_query($conn, $query)) {
        echo "Admin account created successfully.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Admin account already exists.";
}
?>
