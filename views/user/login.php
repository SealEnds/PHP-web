<div id="login-main">
    <div id="login">
        <h2>Log In</h2>
        <span id="close-login-window"><a href="<?=$_SESSION['url']?>">x</a></span>
        <div style="clear:both"></div>

        <?php $result = Utils::checkSession('login'); ?>
        <?php if($result['error'] == false): ?>
            <p class="success-message">
            <?php elseif($result['error'] == true): ?>
            <p class="fail-message">
        <?php endif; ?>
        <?=$result['message']?></p>
        
        <form action="<?=base_url?>user/logged" method="POST">
            <label for="email">Your email</label>
            <input type="email" name="email" id="email" required />
            <label for="password">Password<span class="password-visibility">Hidden</span></label>
            <input type="password" name="password" id="password" required />
            <input type="submit" value="Log In" id="form-signin-submit" />
        </form>
    </div>
</div>


