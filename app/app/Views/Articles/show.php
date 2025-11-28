<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?><?= esc($article->title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1><?= esc($article->title) ?></h1>

<?php if (session()->get("messages")) : ?>
    <div style="color: green;">
        <?= esc(session()->get("messages")) ?>
    </div>
<?php endif; ?>

<p><?= esc($article->content) ?></p>

<a href="<?= url_to('Articles::edit', $article->id) ?>">Edit Article</a>

<?= $this->endSection() ?>