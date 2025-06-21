<?php
include('connect.php');

if (isset($_POST["create"])) {
    $tajukbuku = mysqli_real_escape_string($conn, $_POST["tajukbuku"]);
    $jenisbuku = mysqli_real_escape_string($conn, $_POST["jenisBuku"]);
    $pengarang = mysqli_real_escape_string($conn, $_POST["pengarang"]);
    $keterangan = mysqli_real_escape_string($conn, $_POST["keterangan"]);

    $sqlInsert = "INSERT INTO rekod_buku (tajukbuku, pengarang, jenisbuku, keterangan) 
                  VALUES ('$tajukbuku', '$pengarang', '$jenisbuku', '$keterangan')";

    if (mysqli_query($conn, $sqlInsert)) {
        session_start();
        $_SESSION["create"] = "Buku berjaya ditambah!";
        header("Location: index.php");
        exit;
    } else {
        die("Terdapat masalah semasa tambah buku: " . mysqli_error($conn));
    }
}

if (isset($_POST["edit"])) {
    $tajukbuku = mysqli_real_escape_string($conn, $_POST["tajukbuku"]);
    $jenisbuku = mysqli_real_escape_string($conn, $_POST["jenisBuku"]);
    $pengarang = mysqli_real_escape_string($conn, $_POST["pengarang"]);
    $keterangan = mysqli_real_escape_string($conn, $_POST["keterangan"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);

    $sqlUpdate = "UPDATE rekod_buku 
                  SET tajukbuku = '$tajukbuku', 
                      jenisbuku = '$jenisbuku', 
                      pengarang = '$pengarang', 
                      keterangan = '$keterangan' 
                  WHERE id = '$id'";

    if (mysqli_query($conn, $sqlUpdate)) {
        session_start();
        $_SESSION["update"] = "Buku berjaya dikemas kini!";
        header("Location: index.php");
        exit;
    } else {
        die("Terdapat masalah semasa kemas kini buku: " . mysqli_error($conn));
    }
}
?>
