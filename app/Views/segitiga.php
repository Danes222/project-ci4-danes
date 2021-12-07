<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segitiga Danes</title>
    <style>
        body {
            color: white;
            background-color: dodgerblue;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <h1><?= $judul ?></h1>
    <small>Rumus : 1/2 * alas * tingi</small>
    <form action="/segitiga/proses" method="POST">
        <?= csrf_field(); ?>
        <p>
            1/2*
            <input type="text" name="alas" value="<?= $alas ?>">*
            <input type="text" name="tinggi" value="<?= $tinggi ?>">
            <br>
        </p>
        <h2>
            = <?= $hasil ?>
        </h2>
        <p><button type="submit">Hitung</button></p>
    </form>
</body>
</html>