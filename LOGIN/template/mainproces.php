<main>
    <?php

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        echo "<div class=\"cards\">";
        $context = [];
        $context = $_SESSION['table'];
        foreach($context as $card){
            echo "<div class=\"card\">";
                echo "<h2>".$card["nom"]."<h2>";
                echo "<p>".$card["tipus"]."</p>";
                echo "<p>".$card["usuari_email"]."</p>";
            echo "</div>";
        }
        echo "</div>";
    ?>
<main>