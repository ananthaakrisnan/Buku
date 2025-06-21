<?php
if (isset($_GET['id'])) {
    include("connect.php");
    $id = $_GET['id'];


    $id = mysqli_real_escape_string($conn, $id);


    $sql = "DELETE FROM rekod_buku WHERE id=$id";


    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["delete"] = "Rekod buku berjaya dibuang!";
        header("Location: index.php");
        exit(); 
    } else {
        die("Terdapat masalah: " . mysqli_error($conn));
    }
} else {
    echo "Buku tidak wujud.";
}
?>
