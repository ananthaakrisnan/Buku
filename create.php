<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Tambah Buku Baru</title>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Tambah Buku Baru</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
        </header>

        <form action="process.php" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="tajukbuku" placeholder="Tajuk buku:" required>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="pengarang" placeholder="Nama pengarang:" required>
            </div>
            <div class="form-element my-4">
                <select name="jenisBuku" id="jenisBuku" class="form-control" required>
                    <option value="">Pilih Jenis Buku:</option>
                    <option value="Pendidikan Islam">Pendidikan Islam</option>
                    <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                    <option value="Pengembaraan">Pengembaraan</option>
                    <option value="Fiksyen">Fiksyen</option>
                </select>
            </div>
            <div class="form-element my-4">
                <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan buku:"></textarea>
            </div>
            <div class="form-element my-4">
                <input type="submit" name="create" value="Tambah Buku" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>
