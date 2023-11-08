<div id="register-main">
    <div id="register">
        <h2>Register</h2>
        <span id="close-register-window"><a href="<?=$_SESSION['url']?>">x</a></span>
        <div style="clear:both"></div>

        <?php $result = Utils::checkSession('register'); ?>
        <?php if($result['error'] == false): ?>
            <p class="success-message">
            <?php elseif($result['error'] == true): ?>
            <p class="fail-message">
        <?php endif; ?>
        <?=$result['message']?></p>
        
        <form action="<?=base_url?>user/save" method="POST">
            <label for="email">Your email</label>
            <input type="email" name="email" id="email" required />
            <label for="password">Password<span class="password-visibility">Hidden</span></label>
            <input type="password" name="password" id="password" required />
            <input type="submit" value="Register" id="form-signin-submit" />
        </form>
    </div>
</div>


