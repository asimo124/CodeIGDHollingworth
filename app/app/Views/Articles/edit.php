<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>New Article<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Edit Article</h1>

<?php if (session()->get("messages")) : ?>
    <div style="color: green;">
        <?= esc(session()->get("messages")) ?>
    </div>
<?php endif; ?>

<?php if (session()->get("errors")) : ?>
    <div style="color: red;">
        <ul>
            <?php foreach (session()->get("errors") as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?= form_open('articles/update/' . esc($article->id)) ?>

    <?= $this->include('Articles/form') ?>

<?= form_close() ?>

<?= $this->endSection() ?>