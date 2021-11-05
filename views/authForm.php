<div class="container">
    <div class="formContainer">
        <form action="index.php?controller=AuthController&action=authUser" method="post" class="authForm"> 
            <h2>Sign in</h2>
            <input type="text" name="login" placeholder="Login" class="authInput"><br>
            <input type="password" name="password" placeholder="Password" class="authInput"><br>
            <button type="submit" name="AuthController" class="authBtn">Sign in</button><br>
        </form>
    </div>
    <p><?php echo trim(strip_tags($_GET['error']))?></p>
</div>