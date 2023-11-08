
<?php if(isset($category)): ?>
<h2><?=$category->category_name?></h2>
    <?php if($publications->num_rows == 0): ?>
        <p>Publications are yet to be uploaded in this category</p>
    <?php else: ?>
        <?php while($publication = $publications -> fetch_object()): ?>
            <a class="no-link" href="<?=base_url?>publication/detail&id=<?=$publication->id?>">
                <h3><?=$publication->title?></h3>
                <p><span>Author: <?=$publication->users_id?></span><span><?=$publication->publication_date?></span></p>
                <p><span>Category: <?=$publication->category_id?></span><span>Views: <?=$publication->views?></span></p>
            </a>    
        <?php endwhile; ?>
    <?php endif; ?>
<?php else: ?>
    <h2>That category does not exist</h2>
<?php endif; ?>