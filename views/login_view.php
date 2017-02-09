<h1>Login Page</h1>
<div id="main">
    <h1>Login</h1>
    <form action="?controller=admin&action=login" method="post">
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>"/>
        <br />

        <label>Password:</label>
        <input type="password" name="password" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Login" name="login_submitted"/>
    </form>

    <p><?php echo $login_message; ?></p>

</div>
