<main>
    <?php
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
    ?>
</main>