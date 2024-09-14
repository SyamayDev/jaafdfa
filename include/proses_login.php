<?php
session_start();


$nyambung =  new mysqli_connect("localhost","root","","kasir");


if ($nyambung->connect_error) {
    die("koneksi terputus: " . $nyambung->connect_error);
}


$username = $_POST['username'];
$password = $_POST['password'];




$sql = "SELECT * FROM users WHERE username='$username' 
AND $password='$password'";
$hasil = $nyambung->query($sql);

if ($hasil->num_rows > 0) {

    $_SESSION['username'] = $usename;
    header("Location: ../publicdashboard.php");

    exit();
}else{

    echo "<script>alert('password atau username salah!');
        window.location='../index.php'</script>";
}
$nyambung->close();
?>