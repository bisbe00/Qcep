<?php

class LoginController extends Controlador
{

    public function __construct()
    {
        parent::__construct();
    }

    public function load()
    {
        $error = [];
        $data = new Usuari(null, null, null, null);

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
            $email = $this->sanitize($_POST['email']);

            if (empty($email)) {
                $error["email"] = "fill the section";
                unset($email);
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error["email"] = "write the correct form of the email";
                unset($email);
            } else {
                $data->setEmail($email);
            }

            if (empty($error)) {
                $user = new Usuari(null, $email, null, null);
                $results = $user->read();

                if (count($results) > 0) {
                    header("Location: ?logged/connected");
                } else {
                    $error['log'] = "the email does not exist or is wrong written";
                }

            }
        }

        $main = $this->generateMain($data, $error);

        $login = new LoginView();
        $login->show($main);
    }

    public function logOut()
    {
        unset($_SESSION['admin']);
        unset($_SESSION['online']);
        header("Location: index.php");
    }

    public function generateMain($data, $error)
    {

        $html = '';

        if (isset($error["log"])) {
            $html .= "<span>" . $error["log"] . "</span><br>";
        }

        $html .= '<form action="?login/load" method="post">
        <input class="form-control" type="email" placeholder="name@example.com" id="email" name="email" value="' . $data->getEmail() . '">
        <br>';

        if (isset($error["email"])) {
            $html .= "<span>" . $error["email"] . "</span><br>";
        }

        $html .= '<input class="btn btn-primary" type="submit" id="login" name="login" value="Login">
        <br>
        </form>
        <p>No account?<a href="#">Sign Up</a></p>';

        return $html;
    }

}
