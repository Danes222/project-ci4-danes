<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar CI 4 Danes</title>
    <style>
        body {
            flex-direction: column;
            background-color: dodgerblue;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
        }
        .table, th, td {
            border: 1px solid dodgerblue;
            background-color: white;
            color: dodgerblue; 
            border-collapse: collapse;
            padding: 10px;
            padding-right: 15px;
            padding-left: 15px;
        }
    </style>
</head>

<body>
    <h1>Belajar CI 4 <?= $nama ?></h1>
    <table class="table">
        <tr>
            <th colspan="2" style="padding: 5px;"><h2>Biodata Ku</h2></th>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= $nama ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?= $alamat ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?= $jk ?></td>
        </tr>
        <tr>
            <td>Asal Sekolah</td>
            <td><?= $as ?></td>
        </tr>
    </table>
</body>

</html>