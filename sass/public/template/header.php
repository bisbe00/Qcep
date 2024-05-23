<header class="navbar bg-body-tertiary">


    <div class="container-fluid d-flex flex-row p-2">
        <?php

            if (isset($_SESSION['online']) && $_SESSION['online'] == true) {

                $organitzacio = new Organitzacio(2, 'Thos i Codina', null, null, null);
                $organitzacioModel = new OrganitzacioModel();
                $organitzacions = $organitzacioModel->read($organitzacio);

                foreach ($organitzacions as $organitzacio) {
                    echo "
                    <div class=\"d-flex flex-row ms-5\">
                        <a href=\"" . $organitzacio->__get('web') . "\"><img class=\"logo rounded-circle\" src=\"" . $organitzacio->__get('logo') . "\" alt=\"" . $organitzacio->__get('nom') . "\"/></a>
                        <h2 class='ms-3 mt-3 mb-0'>" . $organitzacio->__get('nom') . "</h2>
                    </div>
                    <button type='button' class=\"btn btn-danger\"><a class='text-light nav-link' href=\"?login/logOut\">Log Out</a></button>";
                }

            } else {

                echo '
                <h1>Qcep</h1>
                <nav>
                    <ul>
                        <li><a href="?home/show">Home</a></li>
                        <li><a href="?login/load">Login</a></li>
                    </ul>
                </nav>';

            }

        ?>
    </div>

</header>