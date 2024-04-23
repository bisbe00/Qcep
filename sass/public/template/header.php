<header>
    <h1>Qcep</h1>

    <?php
    // Check if a user is logged in
    if (isset($_SESSION['user'])) {
        // Display the user image with a link to the logout function
        echo '<a href="?login/logOut">
                <img src="uploads/foundation.jpeg" alt="User Image"
                    style="width: 60px;height: 60px;border-radius: 30%;"
                >
            </a>';
    }
    ?>

    <nav>
        <ul>
            <li><a href="?home/show"><?= $translate["Home"] ?></a></li>

            <li><a href="?login/load"><?= $translate["Login"] ?></a></li>
            <li class="idioma"><?= $translate["Language"] ?>
                <ul>
                    <li><a href="?lang/set/en"><?= $translate["English"] ?></a></li>
                    <li><a href="?lang/set/es"><?= $translate["Spanish"] ?></a></li>
                    <li><a href="?lang/set/fr"><?= $translate["French"] ?></a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>