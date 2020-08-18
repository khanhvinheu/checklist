<div class="container">
    <h2><?= esc($news['title']); ?></h2>
    <hr>
    <?= esc($news['text']); ?>
    <hr>
    <p>Author: <?= esc($news['author'])?></p>
</div>
