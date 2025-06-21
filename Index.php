<?php
session_start();
include('config.php');

// Semak login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Senarai Buku Tambah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
        }
        body {
            background-color: #ffffff;
        }
        .container {
            margin-top: 40px;
        }
        table td, table th {
            vertical-align: middle;
            text-align: center;
            padding: 20px !important;
        }
    </style>
</head>
<body>

<div class="container">
    <header class="d-flex justify-content-between my-4">
        <h1>Senarai Buku</h1>
        <div>
            <span class="me-3">Selamat datang, <strong><?php echo $_SESSION["username"]; ?></strong></span>
            <a href="logout.php" class="btn btn-danger">Logout</a>
            <a href="create.php" class="btn btn-primary ms-2">Tambah Buku</a>
        </div>
    </header>

    <?php if (isset($_SESSION["create"])) { ?>
        <div class="alert alert-success"><?php echo $_SESSION["create"]; unset($_SESSION["create"]); ?></div>
    <?php } ?>

    <?php if (isset($_SESSION["update"])) { ?>
        <div class="alert alert-success"><?php echo $_SESSION["update"]; unset($_SESSION["update"]); ?></div>
    <?php } ?>

    <?php if (isset($_SESSION["delete"])) { ?>
        <div class="alert alert-success"><?php echo $_SESSION["delete"]; unset($_SESSION["delete"]); ?></div>
    <?php } ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Bil</th>
                <th>Tajuk Buku</th>
                <th>Nama Pengarang</th>
                <th>Jenis Buku</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Guna ORDER BY id ASC untuk susunan menaik (1, 2, 3...)
        $sqlSelect = "SELECT * FROM rekod_buku ORDER BY id ASC";
        $result = mysqli_query($conn, $sqlSelect);
        $bil = 1;

        if ($result && mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $bil++; ?></td>
                <td><?php echo htmlspecialchars($data['tajukbuku']); ?></td>
                <td><?php echo htmlspecialchars($data['pengarang']); ?></td>
                <td><?php echo htmlspecialchars($data['jenisbuku']); ?></td>
                <td>
                    <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-info btn-sm">Lebih lanjut</a>
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm">Kemas</a>
                    <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda pasti mahu buang buku ini?');">Buang</a>
                </td>
            </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="5" class="text-center">Tiada buku dijumpai.</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
