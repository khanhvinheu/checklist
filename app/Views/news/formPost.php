<?php
?>
<div class="container">
    <form action="post " method="post" role="form">
        <legend><?=$title?></legend>

        <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" id="" placeholder="Input...">
            <label for="">Slug</label>
            <input type="text" class="form-control" name="slug" id="" placeholder="Input...">
            <label for="">Text</label>
            <textarea type="text" class="form-control" name="text" id="" placeholder="Input..."></textarea>
            <label for="">Category</label>
            <select name="category" id="inputID" class="form-control">
                <option value=""> -- Select One --</option>
                <?php if (! empty($category) && is_array($category)) {?>

                    <?php foreach ($category as $news_item): ?>
                        <option value="<?=$news_item['id']?>"><?= esc($news_item['category']); ?></option>
                    <?php endforeach; ?>

                <?php } ?>

                ?>
            </select>
            <label for="">Author</label>
            <select name="author" id="inputID" class="form-control">
                <option value=""> -- Select One --</option>
                <?php if (! empty($author) && is_array($author)) {?>

                    <?php foreach ($author as $news_item): ?>
                        <option value="<?=$news_item['id']?>"><?= esc($news_item['name']); ?></option>
                    <?php endforeach; ?>

                <?php } ?>

                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
    </form>
</div>
