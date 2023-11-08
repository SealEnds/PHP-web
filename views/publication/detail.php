<?php if(isset($pub)): ?>
    <h2 id="detail-title"><?=$pub->title?></h2>

    <div id="detail-main">
        <div id="detail-img">
            <?php if(!empty($pub->img)): ?>
                <?php 
                    $images = json_decode($pub->img, true);
                    foreach($images as $image):
                ?>
                    <div>
                        <p><?=$image['filename']?></p>
                        <img class="image-expand" src="<?=base_url?>/uploads/publications/<?=$pub->id?>/<?=$image['filename']?>" alt="<?=$image['filename']?>" style="width:30%;" />
                    </div>
                    <?php endforeach; ?>
            <?php endif; ?> 
        </div>

        <div id="detail-info">
            <p><span>Author: <?=$pub->users_id?></span></p>
            <p><span><?=$pub->publication_date?></span></p>
            <p><span>Category: <?=$pub->category_id?></span><span>Views: <?=$pub->views?></span></p>
            <p id="detail-content"><?=$pub->content?></p>
        </div>
    </div>

    <div id="comments-div">
        <h2><i class="fa fa-comments color-icon"></i> Comments</h2>
        <h3>Add a comment</h3>
        <?php $_SESSION['seeing-pub'] = $pub->id; ?>
        <form action="<?=base_url?>/comment/save" method="POST" >
            <textarea name="comment-content" class="big-text"></textarea><br>
            <input type="submit" value="Send" id="send-comment" class="button" />
        </form>
        
        <?php while($comm = $comments -> fetch_object()): ?>
            <div class="comment">
                <div style="display: flex; flex-flow: row wrap; justify-content: space-between;">
                    <span><?=$comm->username?> <?=$comm->surname?></span>
                    <span><?=$comm->comment_date?></span>
                    <span></span>
                </div>
                <div>
                    <p><?=$comm->content?></p>
                    <p style="text-align: right;"><a href="<?=base_url?>comment/delete&id=<?=$comm->id?>" class="button" style="color:red;">Delete</a></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <?php else: ?>
    <h2>The publication you are looking for does no exist</h2>
<?php endif; ?>