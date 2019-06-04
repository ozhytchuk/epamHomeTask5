<form action="<?=\core\router\generate('login')?>" role="form" method="post">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <label for="pass">Password</label>
        <input type="password" class="form-control" name="pass" placeholder="Enter your password">
    </div>
    <button type="submit" class="btn btn-success">Login</button>
</form>