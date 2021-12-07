<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h1><?= $judul ?></h1>
    <form action="/dashboard/proses" method="POST">
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
</div>
<?= $this->endSection(); ?>