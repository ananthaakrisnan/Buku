<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Terperinci Pengenai Buku</title>
    <style>
        .book-details {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Keterangan Buku</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
        </header>

        <div class="book-details p-5 my-4">
            <?php
            include("connect.php");

            // Get the ID from the URL
            $id = $_GET['id'];
            
            // Check if the ID exists
            if ($id) {
                // Fetch the book details from the database
                $sql = "SELECT * FROM rekod_buku WHERE id = $id";
                $result = mysqli_query($conn, $sql);

                // If the query returns a result, display the details
                if ($row = mysqli_fetch_array($result)) {
                    ?>
                    <h3>Tajuk Buku:</h3>
                    <p><?php echo $row["tajukbuku"]; ?></p> 

                    <h3>Keterangan:</h3>
                    <p><?php echo $row["keterangan"]; ?></p> 

                    <h3>Nama Pengarang:</h3>
                    <p><?php echo $row["pengarang"]; ?></p>

                    <h3>Jenis Buku:</h3>
                    <p><?php echo $row["jenisbuku"]; ?></p>
                    <?php
                } else {
                    echo "<h3>Tiada buku dijumpai.</h3>";
                }
            } else {
                echo "<h3>ID buku tidak sah.</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
