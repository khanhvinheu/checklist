<div class="container">
    <?php if ($status=='success'){?>
        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> This alert box could indicate a successful or positive action.
        </div>
    <?php  }elseif($status=='error'){ ?>
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Danger!</strong> This alert box could indicate a dangerous or potentially negative action.
        </div>
    <?php } ?>
    <?php
    ?>
    <form action="/update_post/<?php echo $post[0]['id']?>" id="form_post" method="post" role="form">
        <h1><?=$title?></h1>

        <div class="form-group">
            <label for="">Title:</label>
            <input type="text" class="form-control" value="<?php echo $post[0]['title']?>" name="title" id="title" placeholder="title..." required>
            <label for="">Slug:</label>
            <input type="text" class="form-control" value="<?php echo $post[0]['slug']?>" name="slug" id="text" placeholder="slug:abc-def...">
            <label for="">Category:</label>
            <select name="category" id="category" class="form-control">
                <option value=""> -- Select Category --</option>
                <?php if (! empty($category) && is_array($category)) {?>

                    <?php foreach ($category as $news_item): ?>
                        <option value="<?=$news_item['id']?>" selected="<?php echo $post[0]['category_id']?>"><?= esc($news_item['category']); ?></option>
                    <?php endforeach; ?>

                <?php } ?>

                ?>
            </select>
            <label for="">Author:</label>
            <select name="author"  id="author" class="form-control">
                <option value=""> -- Select Author --</option>
                <?php if (! empty($author) && is_array($author)) {?>

                    <?php foreach ($author as $news_item): ?>
                        <option value="<?=$news_item['id']?>" selected="<?php echo $post[0]['author_id']?>"><?= esc($news_item['name']); ?></option>
                    <?php endforeach; ?>

                <?php } ?>

                ?>
            </select>
            <label for="">Text:</label>
            <textarea type="text" class="form-control" name="text"  id="" placeholder="Content is max length: 500 characters..." rows="22" required><?php echo $post[0]['text']?></textarea>

        </div>
        <div class="button_post" style=" float: right;padding-bottom: 10px;">
            <button type="submit" class="btn btn-primary">Post</button>
            <button type="button" class="btn btn-danger">Reset</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#form_post").validate({
            rules: {
                title: {
                    required: true,
                    maxlength: 100
                },
                text: {
                    required: true,
                    maxlength: 500
                },
                category:{
                    required:true
                },
                author: {
                    required:true
                }
            },
            messages: {
                title: {
                    required: "Title not null",
                    maxlength: "Title is max length : 100 words"
                },
                text: {
                    required: "Content not null",
                    maxLength: " Content is max length: 500 characters"
                },
                category:{
                    required: "Category not null"
                },
                author: {
                    required: "Author not null"
                }

            }
        });
    });
</script>
