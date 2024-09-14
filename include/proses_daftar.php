<?php
//mulai session
session_start();

//koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "kasir";


$koneksi = new mysqli($host,$user,$password,$database);


if ($koneksi->connect_error) {
    die("koneksi gagal: " . $koneksi->connect_error);
}


$user = $_POST['username'];
$pass = $_POST['password'];
$confir = $_POST['konfir_password'];


if (empty($user) || empty($pass) || empty($confir)) {

    echo "semua kolom harus diisi !";
    exit();
}

if ($pass !== $confir) {

    echo "password dan konfir password tidak cocok, harap diisi dengan sesuai!";

    exit();
}


$sql = "INSERT INTO users(username,password) 
    VALUES ('$user','$pass')";

    if ($koneksi->query($sql) === TRUE){

    echo "<script>alert('pengguna sukses ditambahkan');
    window.location='../index.php'</script>";
    }else{
        echo "Error: " . $sql . "<br>" .$koneksi->error;

    }


    $koneksi->close();

?>