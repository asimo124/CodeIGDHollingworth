<div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" required value="<?= esc(old('title', $article->title)) ?>">
</div>

<div>
    <label for="content">Content</label>
    <textarea name="content" id="content" required><?= esc(old('content', $article->content)) ?></textarea>
</div>

<div>
    <button type="submit">Update Article</button>
</div>