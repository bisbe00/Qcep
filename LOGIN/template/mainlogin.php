<main class="login">
    <span><?php if (isset($error["log"])) { echo $error["log"]; } ?></span>
    <form action="?login/load" method="post">
        <input type="email" placeholder="name@example.com" id="email" name="email" value="<?php if(isset($data['email'])) { echo $data['email'];} ?>" >
        <br>
       <span><?php if (isset($error["email"])) { echo $error["email"]; } ?></span>
        <br>
        <input type="submit" id="login" name="login" value="Login">
        <br>
    </form>
   <p>No account?<a href="#">Sign In</a></p>
</main>