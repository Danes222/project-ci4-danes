<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h2 align="center"><?= $judul ?></h2>
    <table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>Division</th>
            <th>Status</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach ($division as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['division']; ?></td>
                <td><?= $row['is_aktif']; ?></td>
                <td><?= $row['created_at']; ?></td>
                <td><?= $row['updated_at']; ?></td>
                <td><a href="/division/edit/<?= $row['div_id']; ?>">Edit</a>
                    | <a href="/division/destroy/<?= $row['div_id']; ?>" onclick="
                    if (confirm('Apakah anda yakin ingin menghapus data '+'<?= $row['division']; ?>'+' ?') == true) {
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
<div class="content content2" style="background-color: white;">
    <h3>Tambah Data</h3>
    <form action="/division/save" method="POST">
        <?= csrf_field(); ?>
        <table>
            <tr>
                <td><input type="text" placeholder="Division" name="division"></td>
            </tr>
            <tr>
                <td><input type="text" placeholder="Status" name="is_aktif"></td>
            </tr>
        </table>

        <button type="submit">Submit</button>
    </form><br>
</div>
<?= $this->endSection(); ?>