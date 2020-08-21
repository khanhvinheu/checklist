<div class="container">
    <?php if (!empty($news) && is_array($news)) : ?>
        <?php foreach ($news as $news_item): ?>

            <h3><?= esc($news_item['title']); ?></h3>

            <div class="main">
                <?= esc($news_item['author']); ?>
            </div>
            <p><a href="/news/<?= esc($news_item['slug'], 'url'); ?>">View </a></p>
            <p><a href="/delete/<?= esc($news_item['id'], 'url'); ?>">Delete</a></p>
            <p><a href="/update/<?= esc($news_item['id'], 'url'); ?>">Edit</a></p>
        <?php endforeach; ?>

    <?php else : ?>

        <h3>No Post</h3>

        <p>Unable to find any post.</p>

    <?php endif ?>
</div>


