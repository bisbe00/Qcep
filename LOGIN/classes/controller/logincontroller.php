<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// By using session_status() to check if a session is already active, 
// you can avoid calling session_start() redundantly.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class LoginController extends Controlador
{

    public function __construct()
    {
        parent::__construct();
    }

    public function load()
    {
        if (isset($_COOKIE["lang"])) {
            $lang = $_COOKIE["lang"];
        } else {
            $lang = "en";
        }

        $translator = "languages/{$lang}_translate.php";

        $error = [];
        $data = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
            $email = $this->sanitize($_POST['email']);

            if (empty($email)) {
                $error["email"] = "fill the section";
                unset($email);
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error["email"] = "write the correct form of the email";
                unset($email);
            } else {
                $data["email"] = $email;
            }

            if (empty($error)) {
                $user = new User($email);
                if ($user->read()) {
                    $error['log'] = "OK, you are currently online";
                    header("Location: ?logged/connected");
                } else {
                    $error['log'] = "the email does not exist or is wrong written";
                }
            }
        }
        
        $footer = $this->generateFooter();

        $login = new LoginView();
        $login->show($lang, $translator, $error, $data, $footer);
    }

    public function logOut()
    {
        unset($_SESSION['user']);
        header("Location: index.php");
    }

    public function generateFooter()
    {
        $html = "<p>2023-2024</p>";
        return $html;
    }
}

?>