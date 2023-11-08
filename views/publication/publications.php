
<h1>Publications Results</h1>
<?php foreach($search_results as $table => $value): ?>
    <?php if($value->num_rows > 0): ?>
        <h2><?=$table?></h2>
        <?php while($result = $value -> fetch_object()): ?>
            <?php if($table == "users"): ?>
                <h3><a href="<?=base_url?>user/showPublic&=<?=$result->id?>"><?=$result->username?></a></h3>
            <?php elseif($table == "categories"): ?>
                <h3><a href="<?=base_url?>category/show&id=<?=$result->id?>"><?=$result->category_name?></a></h3>
            <?php elseif($table == "publications"): ?>
                <h3><a href="<?=base_url?>publication/detail&id=<?=$result->id?>"><?=$result->title?></a></h3>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
<?php endforeach; ?>