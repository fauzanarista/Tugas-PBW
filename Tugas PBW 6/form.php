<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Tag Input -->
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <title>Praktikum 7 | Form Input</title>
  </head>
<body>


        <!-- form input data -->
        <div class="container">
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-6">
                    <h3 class="text-center">Form Input Data</h3>
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <label for="npm">npm</label>
                            <input type="text" class="form-control" id="npm" name="npm">
                        </div>
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">jurusan</label>
                            <select class="form-select" id="jurusan" name="jurusan">
                                    <option value="1">teknik informatika</option>
                                    <option value="2">sistem operasi</option>
                            </select>
                        </div>
                       <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
</body>
</html>