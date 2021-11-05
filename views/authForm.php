<div class="container">
    <div class="form-container">
        <form action="index.php?controller=AuthController&action=authUser" method="post"> 
            <h2>Sign in</h2>
            <input type="text" name="login" placeholder="Login"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit" name="AuthController">Sign in</button><br>
        </form>
    </div>
    <p><?php echo trim(strip_tags($_GET['error']))?></p>
</div>