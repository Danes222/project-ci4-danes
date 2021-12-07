<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Danes</title>
    <style>
        body {
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
    <form action="/hitung/proses" method="POST">
        <?= csrf_field(); ?>
        <p>
            <input type="text" name="angka1" value="<?= $angka1 ?>">*
            <input type="text" name="angka2" value="<?= $angka2 ?>">
            <br>
        </p>
        <h2>
            = <?= $hasil ?>
        </h2>
        <p><button type="submit">Hitung</button></p>
    </form>
</body>
</html>