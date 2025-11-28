<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Articles<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Articles</h1>


<ul>
    <?php foreach ($tables as $table): ?>
        <li><?= esc($table) ?></li>
    <?php endforeach; ?>
</ul>
<?= $this->endSection() ?>