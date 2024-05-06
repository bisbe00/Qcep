<header>

    <?php

        if (isset($_SESSION['online']) && $_SESSION['online'] == true) {

            $organitzacio = new Organitzacio(2,'Thos i Codina',null,null,null);
            $organitzacioModel = new OrganitzacioModel();
            $organitzacions = $organitzacioModel->read($organitzacio);

            foreach($organitzacions as $organitzacio){
                echo "
                <div class=\"inc\">
                    <a href=\"".$organitzacio->__get('web')."\"><img class=\"logo\" src=\"".$organitzacio->__get('logo')."\" alt=\"".$organitzacio->__get('nom')."\"/></a>
                    <h2>".$organitzacio->__get('nom')."</h2>
                </div>
                <button class=\"logOut\"><a href=\"?login/logOut\">Log Out</a></button>";
            }

        }else{

            echo '<h1>Qcep</h1>
            <nav>
                <ul>
                    <li><a href="?home/show">'. $translate["Home"] .'</a></li>
                    <li><a href="?login/load">'. $translate["Login"] .'</a></li>
                    <li class="idioma">'. $translate["Language"] .'
                        <ul>
                            <li><a href="?lang/set/en">'. $translate["English"] .'</a></li>
                            <li><a href="?lang/set/es">'. $translate["Spanish"] .'</a></li>
                            <li><a href="?lang/set/fr">'. $translate["French"] .'</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>';

        }

    ?>
    
</header>