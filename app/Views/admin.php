<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h2 align="center"><?= $judul ?></h2>
    <table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach ($admin as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['password']; ?></td>
                <td><?= $row['created_at']; ?></td>
                <td><?= $row['updated_at']; ?></td>
                <td><a href="/admin/edit/<?= $row['id_admin']; ?>">Edit</a>
                    | <a href="/admin/destroy/<?= $row['id_admin']; ?>" onclick="
                    if (confirm('Apakah anda yakin ingin menghapus data '+'<?= $row['username']; ?>'+' ?') == true) {
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
    <form action="/admin/save" method="POST">
        <?= csrf_field(); ?>
        <table>
            <tr>
                <td><input type="email" placeholder="Username" name="username"></td>
            </tr>
            <tr>
                <td><input type="text" placeholder="Password" name="password"></td>
            </tr>
        </table>

        <button type="submit">Submit</button>
    </form><br>
</div>
<?= $this->endSection(); ?>