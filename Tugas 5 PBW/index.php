<?php
$kedatangan = array(
    "Soekarno Hatta (CGK)" => 65000,
    "Husein Sastranegara (BDO)" => 50000,
    "Abdul Rachman Saleh (MLG)" => 40000,
    "Juanda (SUB)" => 30000
);
$keberangkatan = array(
    "Ngurah Rai (DPS)" => 85000,
    "Hasanuddin (UPG)" => 70000,
    "Inanwatan (INX)" => 90000,
    "Sultan Iskandar Muda (PKN)" => 60000
);

function getPajakDatang($kedatangan, $tujuan)
{
    $pjk = $kedatangan[$tujuan];
    return $pjk;
}
function getPajakBerangkat($keberangkatan, $tujuan)
{
    $pjk = $keberangkatan[$tujuan];
    return $pjk;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Fly Far</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info text-white">
        <div class="container justify-content-center">
            <a class="navbar-brand" href="#s">
                <img src="assets/pesawat.png" alt="" width="60" height="50" />
                <h3>Fly Far</h3>
            </a> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <section class="form">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Pendaftaran Penerbangan</h1>
                </div>
            </div>
            <div class="container">
                <div class="formpendaftaran">
                <div class="row d-flex justify-content-center box-bg">
                    <div class="col-md-6">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="mkp" class="form-label">Maskapai</label>
                                <input type="text" class="form-control" id="mkp" name="mkp">
                            </div>
                            <label for="berangkat" class="form-label">Keberangkatan</label>
                            <select class="form-select mb-3" name="berangkat" id="berangkat">
                                <option selected>Pilih Bandara</option>
                                <?php foreach ($keberangkatan as $bdr => $pjk) : ?>
                                    <option value="<?= $bdr ?>"><?= $bdr; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="datang" class="form-label">Kedatangan</label>
                            <select class="form-select mb-3" name="datang" id="datang">
                                <option selected>Pilih Bandara</option>
                                <?php foreach ($kedatangan as $bdr => $pjk) : ?>
                                    <option value="<?= $bdr ?>"><?= $bdr; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Tiket</label>
                                <input type="text" class="form-control" name="harga" id="harga">
                            </div>
                            <button class="btn btn-info text-white" name="submit">Simpan Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <?php
        $file = 'data.json';
        $data_mkp = array();

        $file_json = file_get_contents($file);

        $data_mkp = json_decode($file_json, true);

        if (isset($_POST['submit'])) {
            $pjk = getPajakDatang($kedatangan, $_POST['datang']) + getPajakBerangkat($keberangkatan, $_POST['berangkat']);
            $total = $pjk + $_POST['harga'];

            $inputUser = array(
                "Maskapai" => $_POST['mkp'],
                "Asal_penerbangan" => $_POST['berangkat'],
                "tujuan_penerbangan" => $_POST['datang'],
                "Harga_tiket" => $_POST['harga'],
                "Pajak" => $pjk,
                "Total_harga" => $total
            );

            array_push($data_mkp, $inputUser);

            $data_json = json_encode($data_mkp, JSON_PRETTY_PRINT);
            file_put_contents($file, $data_json);
        }

        ?>
        <div class="container tabel">
        <div class="row">
            <table class="table">
                <thead>
                    <tr> 
                        <th scope="col">Maskapai</th>
                        <th scope="col">Keberangkatan</th>
                        <th scope="col">Kedatangan</th>
                        <th scope="col">Harga Tiket</th>
                        <th scope="col">Pajak</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_mkp as $data => $value) : ?>
                        <tr>
                            <td><?= $data_mkp[$data]['Maskapai']; ?></td>
                            <td><?= $data_mkp[$data]['Asal_penerbangan']; ?></td>
                            <td><?= $data_mkp[$data]['tujuan_penerbangan']; ?></td>
                            <td><?= $data_mkp[$data]['Harga_tiket']; ?></td>
                            <td><?= $data_mkp[$data]['Pajak']; ?></td>
                            <td><?= $data_mkp[$data]['Total_harga']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
