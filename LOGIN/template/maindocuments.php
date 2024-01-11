<main>
    <?php
        echo "<a href=\"?logged/connected\">BACK</a>";
        if(isset($resultProces) && count($resultProces) !== 0){
            foreach($resultProces as $proces){
                echo "<h2>".$proces["nom"]."</h2>";
                echo "<h3>Objectiu</h3>";
            echo "<p class=\"text\">".$proces["objectiu"]."</p>";
            if(isset($data) && count($data) !== 0){
                echo "<table>";
                echo "<tr>";
                echo "<th>nom</th>";
                echo "<th>link</th>";
                echo "</tr>";
                foreach($data as $document){
                    echo "<tr>";
                    echo "<td>".$document["nom"]."</td>";
                    echo "<td><a href=\"\">".$document["link"]."</a></td>";
                    echo "</tr>";
                }
                echo  "</table>";
            }else{
                echo "<p>there is no documents</p>";
            }
            echo "<p><b>Author:</b> ".$proces["usuari_email"]."</p>";
            }
        }
    ?>
</main>