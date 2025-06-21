<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Kemas kini buku</title>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Kemas kini buku</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
        </header>
        <form action="process.php" method="post">
            <?php

            if (isset($_GET['id'])) {
                include("connect.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM rekod_buku WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>

                <div class="form-elemnt my-4">
                    <input type="text" class="form-control" name="tajukbuku" placeholder="Tajuk buku:" value="<?php echo $row["tajukbuku"]; ?>">
                </div>
                <div class="form-elemnt my-4">
                    <input type="text" class="form-control" name="pengarang" placeholder="Nama pengarang:" value="<?php echo $row["pengarang"]; ?>">
                </div>
                <div class="form-elemnt my-4">
                    <select name="jenisBuku" id="" class="form-control">
                        <option value="">Pilih jenis buku:</option>
                        <option value="Pendidikan Islam" <?php if($row ["jenisbuku"]=="Pendidikan Islam"){echo"selected";} ?>>Pendidikan Islam</option>
                        <option value="Sains dan Teknologi" <?php if($row ["jenisbuku"]=="Sains dan Teknologi"){echo"selected";} ?>>Sains dan Teknologi</option>
                        <option value="Pengembaraan" <?php if($row ["jenisbuku"]=="Pengembaraan"){echo"selected";} ?>>Pengembaraan</option>
                        <option value="Fiksyen" <?php if($row ["jenisbuku"]=="Fiksyen"){echo"selected";} ?>>Fiksyen</option>
                </div>
                <div class="form-element my-4">
                    <textarea name="keterangan" id="" class="form-control" placeholder="Keterangan buku:"><?php echo $row["keterangan"]; ?></textarea>
                </div>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="form-element my-4">
                    <input type="submit" name="edit" value="Kemaskini buku" class="btn btn-primary">
                </div>
                <?php
            }
            else{
                echo "<h3>Buku tidak wujud</h3>";
            }
            ?>
    </div>
</body>
</html>