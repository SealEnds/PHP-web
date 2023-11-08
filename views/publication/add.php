<form action="<?=base_url?>publication/save" method="POST" enctype="multipart/form-data" >
    <div for="category">
        <span>Category:</span>
        <select name="category" id="category" size="">
            <?php $categories = Category::showCategories(); ?>
            <?php while($cat = $categories -> fetch_object()): ?>
                <option value="<?=$cat->id?>"><?=$cat->category_name?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <div for="title">
        <span>Title:</span>
        <input type="text" name="title" id="title" />
        <input type="file" name="pub-images[]" id="pub-image" class="profile-image" multiple />
    </div>
    <textarea name="content" id="content" cols="30" rows="10" placeholder="Write your text here..."></textarea>
    <div for="visibility">
        <span>Visibility:</span>
        <select name="visibility" id="visibility" >
            <option value="public">Public</option>
            <option value="private">Private</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Publish" class="button2" id="add-submit" />
    </div>
</form>