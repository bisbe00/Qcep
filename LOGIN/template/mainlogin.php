<main>
    <span style="display:flex;justify-content:center;color:red;"><?php if (isset($error["log"])) { echo $error["log"]; } ?></span>
    <form action="" method="post">
        <input type="email" placeholder="name@example.com" id="email" name="email" value="<?php if(isset($data['email'])) { echo $data['email'];} ?>" >
        <br>
       <span><?php if (isset($error["email"])) { echo $error["email"]; } ?></span>
       <br>
        <input type="password" placeholder="password" id="password" name="password" value="<?php if(isset($data['password'])) { echo $data['password'];} ?>">
        <br>
        <span><?php  if (isset($error["password"])) { echo $error["password"]; }?></span>
        <br>
        <input type="submit" id="login" name="login" value="Login">
        <br>
    </form>
   <p style="display:flex;justify-content:center;">No account?<a href="#" style="color:blue;margin-left:5px;">Sign In</a></p>
    
        <!-- // if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }

        // $context = [];
        // $context = $_SESSION['table'];
        // echo '<pre>';
        // var_dump($context);
        // echo '</pre>'; -->

</main>