<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Articles<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Articles</h1>

<a href="<?= url_to('Articles::new') ?>">Create New Article</a>

<ul>
    <?php foreach ($articles as $article): ?>
        <li>
            <h1><a href="<?= site_url('articles/' . $article['id']) ?>"><?= esc($article['title']) ?></a></h1>
            <p><?= esc($article['content']) ?></p>
        </li>
    <?php endforeach; ?>
</ul>
<?= $this->endSection() ?>