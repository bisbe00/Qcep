<main class="proces">
    <?php
    $docId = 0; //inicializa the document id
    ?>

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
            <div class="col-xl-3">
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
            <div class="col-xl-9">
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
                                echo "</tr>";
                            }


                            foreach ($documents as $document) {
                                $docId = $document->__get('id');
                                echo '<tr><td class="text-body ms-2">' . $document->__get('nom') . '</td>';
                                echo '<td><a class="ms-2" href="' . $document->__get('link') . '" target="_blank" rel="noopener noreferrer">' . $document->__get('nom') . '</a></td>';

                                if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                                    echo '<td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#editModal_'.$docId.'"
                                            class="text-success me-2">
                                            <i class="bi bi-pencil h4"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal_'.$docId.'"
                                            class="text-danger ms-2">
                                            <i class="bi bi-trash h4"></i>
                                        </a>
                                    </div>
                                    </td>';
                                }

                                echo '</tr>';

                                echo '<div class="modal fade" id="deleteModal_'.$docId.'" tabindex="-1"
                                aria-labelledby="deleteModal'.$docId.'Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="?document/delete" method="post">
                                                <input type="hidden" name="doc_id" value="'.$docId.'" />
                                                <input type="hidden" name="proces_id" value="'.$proces->__get('id').'" />
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteModal'.$docId.'Label">Delete Document</h1>
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
            if (isset($clients)) {
                echo '<div class="col-md-6 col-xl-3">
                    <div class="card"><div class="card-body">
                    <div class="d-flex justify-content-between border-bottom border-danger pb-1">
                        <h4 class="fs-2">Clients</h4>
                        <a href="#" class="btn btn-success"><i class="bi bi-plus text-light fs-5"></i></a>
                    </div>';

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

        <!-- modals -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Document</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form autocomplete="off" class="needs-validation createorder-form" id="createorder-form"
                        novalidate="">

                        <!-- modal body -->
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" class="form-control" value="12">
                                    <?php
                                    foreach ($document as $key => $value) {
                                        echo '<div class="mb-3">';
                                        echo '<label for="' . $key . '" class="form-label">' . $key . '</label>';
                                        echo '<input type="text" id="' . $key . '" name="' . $key . '" class="form-control"
                                            placeholder="Document name" value="' . $value . '">';
                                        echo '</div>';
                                    }
                                    ?>
                                    <!-- <div class="mb-3">
                                        <label for="nom" class="form-label">Document Name</label>
                                        <input type="text" id="nom" name="nom" class="form-control"
                                            placeholder="Document name" value="">
                                        <div class="invalid-feedback">Please enter a name.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="link" class="form-label">Document Link</label>
                                        <input type="text" id="link" name="link" class="form-control"
                                            placeholder="Document link" val>
                                        <div class="invalid-feedback">Please enter amount.</div>
                                    </div> -->
                                </div>
                            </div>


                        </div>
                        <!-- end modal body -->

                        <!-- modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                        <!-- end modal footer -->

                    </form>

                </div>
                <!-- end modal-content -->
            </div>
            <!-- end modal-dialog -->
        </div>

        <!-- modals -->
    </div>
</main>