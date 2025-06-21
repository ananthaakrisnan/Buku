    <?php
    $dbHost = "localhost"; 
    $dbUser = "root";     
    $dbPass = "";          
    $dbName = "buku";    

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if (!$conn) {
        die("Pangkalan data tidak dapat disambungkan: " . mysqli_connect_error());
    }
    ?>
