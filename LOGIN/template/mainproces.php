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
        foreach ($context as $card) {
            echo "<div class=\"card\">
                     <h2><a href='?doc/documents&proces={$card["nom"]}'>{$card["nom"]}</a></h2>
                 </div>";
        }
        
        echo "</div>";
    ?>
</main>