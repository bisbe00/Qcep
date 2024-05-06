<footer>
    <?php
    if (isset($_SESSION['online']) && $_SESSION['online'] == true) {

        $apartatModel = new ApartatModel();
        $apartats = $apartatModel->getTable();
        foreach ($apartats as $apartat) {
            echo "
                <div>
                    <a href=\"" . $apartat->__get('link') . "\" target=\"_blank\"><img src=\"" . $apartat->__get('icona') . "\" alt=\"" . $apartat->__get('nom') . "\" /></a>
                    <p>" . $apartat->__get('nom') . "</p>
                </div>";
        }

    } else {
        echo "<p>@Company Qcep Enterprise 2023-2025</p>";
    }

    ?>
</footer>