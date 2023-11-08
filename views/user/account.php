<div class="user-form">
    <?php $my_account = $account->fetch_object(); ?>

    <div id="new-publication-display" class="display-controller radius-close"><span
            id="new-publication-display-span">+</span><span id="new-publication-display-title">New Publication<span>
    </div>
    <div id="new-publication-display-displayed" class="display-none">
        <?php require_once 'views/publication/add.php' ?>
    </div>
    <div id="my-publications-display" class="display-controller radius-close"><span
            id="my-publications-display-span">+</span><span id="my-publications-display-title">My Publications<span>
    </div>
    <div id="my-publications-display-displayed" class="display-none">
        <div class="display-block" style="margin: 0 auto;">
            <?php while($pub = $users_publications->fetch_object()): ?>
            <p><a href="<?=base_url?>publication/detail&id=<?=$pub->id?>"><?=$pub->title?></a></p>
            <?php endwhile; ?>
        </div>
    </div>
    <div id="edit-account-display" class="display-controller radius-close"><span
            id="edit-account-display-span">+</span><span id="edit-account-display-title">Edit Account Info<span></div>

    <form id="edit-account-display-displayed" class="display-none" method="POST" action="<?=base_url?>user/update"
        enctype="multipart/form-data">
        <div>
            <?php if(isset($my_account->profile_image)): ?>
            <img src="<?=base_url?>uploads/profile/<?=$my_account->profile_image?>" alt="profile image"
                class="profile_img_1" />
            <?php endif; ?>
            <div class="center">
                <label for="profile-img">Profile Image: </label>
                <input type="file" name="profile-img" id="profile-img" class="profile-image" />
            </div>
        </div>

        <label for="new-username">User Name: </label>
        <input type="text" name="new-username" id="new-username" value="<?=$my_account->username?>" />

        <label for="location">Country / Location: </label>
        <input type="text" name="location" id="location" value="<?=$my_account->userslocation?>" />

        <label for="hiring-info">Hiring Info: </label>
        <input type="text" name="hiring-info" id="hiring-info" value="<?=$my_account->hiring_info?>" />

        <div>
            <p>Your current status is: <?=$my_account->user_type?></p>
            <p id="make-professional" class="underline">Make a Profesional Account</p>
        </div>

        <input class="submit" type="submit" value="Update">
    </form>

</div>