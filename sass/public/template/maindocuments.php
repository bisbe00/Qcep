<main class="proces">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-11">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-3 font-size-18">Project Overview</h4>
                </div>
            </div>
            <div class="col-1">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h5 class="mb-sm-3 font-size-16"><a href="?logged/connected"><i
                                class="bi bi-box-arrow-left h1"></i></a></h5>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- start of proces introduction -->
        <div class="row">

            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h1 class="fw-bold me-4">
                                <?php echo $proces->__get('id') . ". " . $proces->__get('nom'); ?>
                            </h1>
                        </div>

                        <h5 class="font-size-15 mt-4">Tipus: <?php echo $proces->__get('tipus'); ?></h5>

                        <p class="text-muted">
                            <?php echo $proces->__get('objectiu'); ?>
                        </p>

                        <div class="row task-dates">
                            <div class="col-sm-4 col-6">
                                <div class="mt-4">
                                    <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Start Date
                                    </h5>
                                    <p class="text-muted mb-0">08 Sept, 2019</p>
                                </div>
                            </div>

                            <div class="col-sm-4 col-6">
                                <div class="mt-4">
                                    <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Due
                                        Date</h5>
                                    <p class="text-muted mb-0">12 Oct, 2019</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of proces introduction -->

            <!-- proces user admin -->
            <div class="col-xl-3 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Owner Member</h4>

                        <?php
                        $usuari_id = $proces->__get('usuari_id');
                        $usuari = new Usuari($usuari_id, null, null, null);
                        $autor = $usuari->getUsernameByID($usuari_id);
                        ?>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6 class="m-0">
                                                <?php echo $autor->getUsername(); ?>
                                            </h6>
                                        </td>
                                        <td>Author</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="m-0">
                                                <?php echo $autor->getEmail(); ?>
                                            </h6>
                                        </td>
                                        <td>Email</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="m-0">
                                                <?php echo "12/10/2023"; ?>
                                            </h6>
                                        </td>
                                        <td>Updated</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- proces user admin -->
        </div>

        <div class="row">
            <!-- document table -->
            <?php 

                if(count($clients) == 0){
                    echo '<div class="col-xl-12">';
                }else{
                    echo '<div class="col-xl-9">';
                }

            ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <h3 class="card-title">Documents</h3>
                        <?php

                        if (isset($documents) && count($documents) !== 0) {
                            echo '<table class="table">
                            <thead>
                            <tr class="table-danger">
                            <th scope="col">Document</th>
                            <th scope="col">Link</th>';

                            if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                                echo '<th scope="col">Action</th>';
                            }

                            echo '</tr></head><tbody>';

                            if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                                echo "<tr>";
                                echo '<form action="?document/documents" method="post">';
                                echo '<input type="hidden" name="proces_id" id="proces_id" value="' . $proces->__get('id') . '">';
                                echo "<td><input class='form-control input-sm' type='text' name='nom' placeholder='New Document' required/>";
                                if (isset($error["nom"])) {
                                    echo "<br><span class='error'>" . $error["nom"] . "</span><br>";
                                }
                                echo "</td>";
                                echo "<td><input class='form-control input-sm' type='text' name='link' placeholder='Document link' required/>";
                                if (isset($error["link"])) {
                                    echo "<br><span class='error'>" . $error["link"] . "</span><br>";
                                }
                                echo "</td>";
                                echo "<td><button type='submit' name='create' class='btn btn-success'>Add</button></td>";
                                echo "</form>";
                                echo "</tr>";
                            }


                            foreach ($documents as $document) {
                                $docId = $document->__get('id');
                                echo '<tr><td class="text-body ms-2">' . $document->__get('nom') . '</td>';
                                echo '<td><a class="ms-2" href="' . $document->__get('link') . '" target="_blank" rel="noopener noreferrer">documents/' . $document->__get('nom') . '</a></td>';

                                if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                                    echo '<td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal' . $docId . '"
                                            class="text-danger ms-2">
                                            <i class="bi bi-trash h4"></i>
                                        </a>
                                    </div>
                                    </td>';
                                }

                                echo '</tr>';

                                // delete modal
                                echo '<div class="modal fade" id="deleteModal' . $docId . '" tabindex="-1"
                                    aria-labelledby="deleteModal_' . $docId . 'Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <form action="?document/documents" method="post">
                                                <input type="hidden" name="doc_id" value="' . $docId . '" />
                                                <input type="hidden" name="proces_id" value="' . $proces->__get('id') . '" />
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModal_' . $docId . 'Label">Delete Document</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this document?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>';
                            }

                            echo '</tbody></table>';

                        } else {

                            if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {

                                echo '<table class="table">
                                <thead>
                                    <tr class="table-danger">
                                        <th scope="col">Document</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </head><tbody><tr>';

                                echo '<form action="?document/documents" method="post">';

                                echo '<input type="hidden" name="proces_id" id="proces_id" value="' . $proces->__get('id') . '">';
                                echo "<td><input class='form-control input-sm' type='text' name='nom' placeholder='New Document'>";
                                if (isset($error["nom"]) && !empty($error["nom"])) {
                                    echo "<br><span class='error'>" . $error["nom"] . "</span><br>";
                                }
                                echo "</td>";
                                echo "<td><input class='form-control input-sm' type='text' name='link' placeholder='Document link'>";
                                if (isset($error["link"]) && !empty($error["link"])) {
                                    echo "<br><span class='error'>" . $error["link"] . "</span><br>";
                                }
                                echo "</td>";
                                echo "<td><button type='submit' name='create' class='btn btn-success'>Add</button></td>";

                                echo "</form>";

                                echo "</tr></tbody></table>";

                            } else {
                                echo '<p class="card-text fs-4">There are no documents</p>';
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
            <!-- document table -->

            <?php
            if (isset($clients) && count($clients) !== 0) {
                echo '<div class="col-md-6 col-xl-3">
                    <div class="card"><div class="card-body">
                    <p class="d-flex justify-content-between border-bottom border-danger fs-3 pb-1">
                       Clients
                    </p>';

                $grups = [];
                $grupInteresModel = new GrupInteresModel();
                foreach ($clients as $client) {
                    $grup_id = $client->__get('grupInteres_id');
                    $grupRegistrat = $grupInteresModel->getGrupByID($grup_id);
                    echo '<p class="border-bottom border-secondary-subtle m-3">' . $grupRegistrat->__get('nom') . '</p>';

                }

                echo '</div></div></div>';
            }
            ?>

        </div>

        <?php
                echo '<div class="row">
                <div class="card m-2">
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>Tipus</th>
                                <th>Nivell</th>
                                <th>Valoració</th>
                                <th>Planificació</th>
                                <th>Accions</th>
                                <th>Estrategia</th>';
                                
                                if (isset($_SESSION['admin']) && $_SESSION['admin'] === true){
                                    echo '<th>Edit</th>';
                                }
                           
                            echo '</tr>
                        </thead>
                        <tbody>';

                        if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                            echo "<tr>";
                            echo '<form action="?avaluacio/create" method="post">';
                            echo '<input type="hidden" name="proces_id" id="proces_id" value="' . $proces->__get('id') . '">';
                            echo "<td><input class='form-control input-sm' type='text' name='tipus' placeholder='Tipus' required/>";
                            if (isset($error["tipus"])) {
                                echo "<br><span class='error'>" . $error["tipus"] . "</span><br>";
                            }
                            echo "</td>";

                            echo "<td>
                            <select class='form-select' id='nivell' name='nivell'>
                            <option value='Baix'>Baix</option>
                            <option value='Mig'>Mig</option>
                            <option value='Alt'>Alt</option>
                            </select></td>";

                            echo "<td><input class='form-control input-sm' type='text' name='valoracio' placeholder='Valoracio' required/>";
                            if (isset($error["valoracio"])) {
                                echo "<br><span class='error'>" . $error["valoracio"] . "</span><br>";
                            }
                            echo "</td>";
                            echo "<td><input class='form-control input-sm' type='text' name='planificacio' placeholder='Planificacio' required/>";
                            if (isset($error["planificacio"])) {
                                echo "<br><span class='error'>" . $error["planificacio"] . "</span><br>";
                            }
                            echo "</td>";
                            echo "<td><input class='form-control input-sm' type='text' name='accions' placeholder='Accions' required/>";
                            if (isset($error["accions"])) {
                                echo "<br><span class='error'>" . $error["accions"] . "</span><br>";
                            }
                            echo "</td>";

                            echo "<td>
                            <select class='form-select' id='estrategia' name='estrategia'>
                            <option value='Preventiva'>Preventiva</option>
                            <option value='De millora'>De millora</option>
                            </select></td>";

                            echo "<td><button type='submit' name='create' class='btn btn-success'>Add</button></td>";
                            echo "</form>";
                            echo "</tr>";
                        }

                        foreach($avaluacions as $avaluacio){

                            echo '<tr>';
                            echo '<td class="border-bottom">'. $avaluacio->__get('tipus') .'</td>';
                            echo '<td class="border-bottom">'. $avaluacio->__get('nivell') .'</td>';
                            echo '<td class="border-bottom">'. $avaluacio->__get('valoracio') .'</td>';
                            echo '<td class="border-bottom">'. $avaluacio->__get('planificacio') .'</td>';
                            echo '<td class="border-bottom">'. $avaluacio->__get('accions') .'</td>';
                            echo '<td class="border-bottom">'. $avaluacio->__get('estrategia') .'</td>';
                        
                            if (isset($_SESSION['admin']) && $_SESSION['admin'] === true){
                                echo '<td class="border-bottom">
                                <div class="d-flex justify-content-start gap-1">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteAv' . $avaluacio->__get('id') . '"
                                        class="text-danger ms-2">
                                        <i class="bi bi-trash h4"></i>
                                    </a>
                                </div>
                                </td>';
                            }
                            
                            echo '</tr>';

                             // delete modal avaluacio
                             echo '<div class="modal fade" id="deleteAv' . $avaluacio->__get('id') . '" tabindex="-1"
                             aria-labelledby="deleteAv' . $avaluacio->__get('id') . 'Label" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-centered modal-lg">
                                 <div class="modal-content">
                                     <form action="?avaluacio/delete" method="post">
                                         <input type="hidden" name="id" value="' . $avaluacio->__get('id') . '" />
                                         <input type="hidden" name="proces_id" value="' . $proces->__get('id') . '" />
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="deleteAv' . $avaluacio->__get('id') . 'Label">Delete Avaluation</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <p>Are you sure you want to delete this avaluation?</p>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>';
                        }

                        echo '</tbody>
                        </table>
                    </div>
                </div> </div>';
        ?>
    </div>
</main>