<footer>
    <?php
        if(isset($apartats) && count($apartats) !== 0){
            foreach($apartats as $apartat){
                echo "
                <div>
                    <a href=\"".$apartat->link."\" target=\"_blank\"><img src=\"".$apartat->icona."\" alt=\"".$apartat->nom."\" /></a>
                    <p>".$apartat->nom."</p>
                </div>";
            }
        }else{
            echo "<p>2023-2024</p>";
        }
    ?>
</footer>