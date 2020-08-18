<div class="container">
    <h2><?= esc($title); ?></h2>
     <select name="customers" onchange="showCustomer(this.value)" class="form-control" >
         <option value=""> -- Select Author --</option>
         <option value="0" selected="selected">All</option>
         <?php if (! empty($author) && is_array($author)) {?>

             <?php foreach ($author as $news_item): ?>
                 <option value="<?=$news_item['id']?>"><?= esc($news_item['name']); ?></option>
             <?php endforeach; ?>

         <?php } ?>

         ?>
     </select>
    <div id="txtHint"><div class="container">
            <?php if (! empty($news) && is_array($news)) : ?>

                <?php foreach ($news as $news_item): ?>

                    <h3><?= esc($news_item['title']); ?></h3>

                    <div class="main">
                        <?= esc($news_item['author']); ?>
                    </div>
                    <p><a href="/news/<?= esc($news_item['slug'], 'url'); ?>">View article</a></p>

                <?php endforeach; ?>

            <?php else : ?>

                <h3>No News</h3>

                <p>Unable to find any news for you.</p>

            <?php endif ?>
        </div></div>

</div>
<script>
    function showCustomer(str) {
        var xhttp;
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "filter?author="+str, true);
        xhttp.send();
    }
</script>

