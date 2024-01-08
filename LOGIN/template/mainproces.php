<main>
    <?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        echo "<div class=\"cards\">";
        
        $context = [];
        $context = $_SESSION['table'];
        foreach($context as $card){
            echo "<div class=\"card\" href=\"?doc/documents\">";
                echo "<h2>".$card["nom"]."<h2>";
                echo "<p>".$card["tipus"]."</p>";
                echo "<p>".$card["usuari_email"]."</p>";
            echo "</div>";
        }
        echo "</div>";
    ?>
<main>