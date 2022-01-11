<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h2 align="center">CRUD Employe</h2>
    <table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Gender</th>
            <th>Gaji</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach ($employe as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['gender']; ?></td>
                <td><?= $row['gaji']; ?></td>
                <td><a href="/dashboard/edit/<?= $row['id']; ?>">Edit</a>
                    | <a href="/dashboard/destroy/<?= $row['id']; ?>" onclick="
                    if (confirm('Apakah anda yakin ingin menghapus data '+'<?= $row['nama']; ?>'+' ?') == true) {
                        return true;
                    } else {
                        return false;
                    }
                    ">Delete</a></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>
<div class="content content2">
    <h3>Tambah Data</h3>
    <form action="/dashboard/save" method="POST">
        <?= csrf_field(); ?>
        <table>
            <tr>
                <td><input type="text" placeholder="Nama" name="nama"></td>
            </tr>
            <tr>
                <td><input type="text" placeholder="Alamat" name="alamat"></td>
            </tr>
            <tr>
                <td>
                    <select name="gender" id="gender" style="width: 100%;" required>
                        <option value="" disabled selected hidden>Gender</option>
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="text" placeholder="Gaji" name="gaji"></td>
            </tr>
        </table>

        <button type="submit">Submit</button>
    </form><br>
</div>
<?= $this->endSection(); ?>