<footer>
    <?php
    if (isset($_SESSION['online']) && $_SESSION['online'] == true) {

        $apartatModel = new ApartatModel();
        $apartats = $apartatModel->getTable();
        echo '<div class="container-fluid"><div class="row">';
        echo '<div class="col-sm-6 d-flex flex-row">@Company Qcep</div><div class="col-sm-6 d-flex flex-row-reverse p-0">';
        foreach ($apartats as $apartat) {
            echo "
                <div>
                    <a href=\"" . $apartat->__get('link') . "\" target=\"_blank\"><img class='rounded-circle h-auto' src=\"" . $apartat->__get('icona') . "\" alt=\"" . $apartat->__get('nom') . "\" /></a>
                    <p>" . $apartat->__get('nom') . "</p>
                </div>";
        }
        echo '</div></div></div>';

    } else {
        echo "<p>@Company Qcep Enterprise 2023-2025</p>";
    }

    ?>
</footer>