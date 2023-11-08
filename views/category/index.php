<div id="categories-control">
    <h2>Añadir Categorías</h2>

    <form id="add-category-form" method="POST" action="<?=base_url?>category/save">
        <?php $result = Utils::checkSession('create-category'); ?>
        <?php if($result['error'] == false): ?>
        <p class="success-message">
            <?php elseif($result['error'] == true): ?>
        <p class="fail-message">
            <?php endif; ?>
            <?=$result['message']?></p>
        <label for="category-name">Category Title</label>
        <input type="text" name="category-name" id="category-name" />
        <label for="category-description">Category Description</label>
        <textarea name="category-description" id="category-description" cols="100" rows="10"></textarea>
        <input class="submit" type="submit" value="Guardar">
    </form>

    <h2>Ver y Editar Categorías</h2>
    <?php $result = Utils::checkSession('delete-category'); ?>
    <?php if($result['error'] == false): ?>
        <p class="success-message">
        <?php elseif($result['error'] == true): ?>
        <p class="fail-message">
    <?php endif; ?>
    <?=$result['message']?></p>
    <div id="admin-view-categories">
        <?php while($cat = $categories -> fetch_object()): ?>
        <div>
            <h3><a class="no-link" href="<?=base_url?>category/show&id=<?=$cat->id?>"><?=$cat->category_name?></a></h3>
            <p><?=$cat->category_description?></p>
            <a class="button" href="<?=base_url?>category/edit&id=<?=$cat->id?>">EDIT</a>
            <a class="button" href="<?=base_url?>category/delete&id=<?=$cat->id?>">DELETE</a>
            <!-- 3er parámetro GET, se usa & y no ?-->
        </div>
        <?php endwhile; ?>
    </div>

</div>