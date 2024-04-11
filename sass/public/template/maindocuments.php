<main class="proces">
    <!-- <?php
    // echo $main; //is in classes/controller/doccontroller/generateMain ?> -->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Project Overview</h4>
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
                            <div class="flex-shrink-0 me-4">
                                <img src="assets/images/companies/img-1.png" alt="" class="avatar-sm">
                            </div>

                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="text-truncate font-size-15">Skote Dashboard UI</h5>
                                <p class="text-muted">Separate existence is a myth. For science, music, sport, etc.</p>
                            </div>
                        </div>

                        <h5 class="font-size-15 mt-4">Project Details :</h5>

                        <p class="text-muted">To an English person, it will seem like simplified English, as a skeptical
                            Cambridge friend of mine told me what Occidental is. The European languages are members of
                            the same family. Their separate existence is a myth. For science, music, sport, etc,</p>

                        <div class="text-muted mt-4">
                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> To achieve this, it would be
                                necessary</p>
                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Separate existence is a myth.</p>
                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> If several languages coalesce</p>
                        </div>

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

                <!-- document table -->
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" autocomplete="off" id="searchTableList"
                                            placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#newOrderModal"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 addOrder-modal"><i
                                            class="mdi mdi-plus me-1"></i> Add New Order</button>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <div id="order-list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="order-list_filter" class="dataTables_filter" style="display: none;">
                                            <label>Search:<input type="search" class="form-control form-control-sm"
                                                    placeholder="" aria-controls="order-list"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table
                                            class="table align-middle table-nowrap dt-responsive nowrap w-100 table-check dataTable no-footer dtr-inline collapsed"
                                            id="order-list" aria-describedby="order-list_info" style="width: 948px;">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Billing Name</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK12</a>
                                                    </td>
                                                    <td>
                                                        <div class="customerlist-name">Valerie Keys</div>
                                                    </td>
                                                    <td>$345</td>
                                                    <td class="dtr-hidden" style="display: none;">
                                                        <div class="d-flex gap-3"> <a href="#newOrderModal"
                                                                data-bs-toggle="modal" class="text-success edit-list"
                                                                data-edit-id="12"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a> <a
                                                                href="#removeItemModal" data-bs-toggle="modal"
                                                                class="text-danger remove-list" data-remove-id="12"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a> </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK11</a>
                                                    </td>
                                                    <td>
                                                        <div class="customerlist-name">David Crawford</div>
                                                    </td>
                                                    <td>$350</td>
                                                    <td class="dtr-hidden" style="display: none;">
                                                        <div class="d-flex gap-3"> <a href="#newOrderModal"
                                                                data-bs-toggle="modal" class="text-success edit-list"
                                                                data-edit-id="12"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a> <a
                                                                href="#removeItemModal" data-bs-toggle="modal"
                                                                class="text-danger remove-list" data-remove-id="12"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a> </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK10</a></td>
                                                    <td>
                                                        <div class="customerlist-name">Jessie Jones</div>
                                                    </td>
                                                    <td>$374</td>
                                                    <td class="dtr-hidden" style="display: none;">
                                                        <div class="d-flex gap-3"> <a href="#newOrderModal"
                                                                data-bs-toggle="modal" class="text-success edit-list"
                                                                data-edit-id="12"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a> <a
                                                                href="#removeItemModal" data-bs-toggle="modal"
                                                                class="text-danger remove-list" data-remove-id="12"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a> </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK09</a>
                                                    </td>
                                                    <td>
                                                        <div class="customerlist-name">Clark Benson</div>
                                                    </td>
                                                    <td>$345</td>
                                                    <td class="dtr-hidden" style="display: none;">
                                                        <div class="d-flex gap-3"> <a href="#newOrderModal"
                                                                data-bs-toggle="modal" class="text-success edit-list"
                                                                data-edit-id="12"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a> <a
                                                                href="#removeItemModal" data-bs-toggle="modal"
                                                                class="text-danger remove-list" data-remove-id="12"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a> </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div style="width: 20px;"></div>
                                        <div style="width: 20px;"></div>
                                        <div style="width: 20px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end table responsive -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- document table -->
            </div>
            <!-- end of proces introduction -->

            <!-- proces user admin -->
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Owner Member</h4>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                    class="text-dark">Daniel Canales</a></h5>
                                        </td>
                                        <td>Author</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                    class="text-dark">Jennifer Walker</a></h5>
                                        </td>
                                        <td>Email</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                    class="text-dark">Carl Mackay</a></h5>
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

        <!-- modals -->

        <div class="modal fade orderdetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderdetailsModalLabel">Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="orderlist-overview">
                            <p class="mb-2">Product id: <span class="list-id text-primary">#SK2540</span></p>
                            <p class="mb-4">Billing Name: <span class="orderlist-customer text-primary">Neal
                                    Matthews</span></p>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <div>
                                                    <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                                </div>
                                            </th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">Wireless Headphone (Black)
                                                    </h5>
                                                    <p class="text-muted mb-0">$ 225 x 1</p>
                                                </div>
                                            </td>
                                            <td>$ 255</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div>
                                                    <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                                </div>
                                            </th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">Hoodie (Blue)</h5>
                                                    <p class="text-muted mb-0">$ 145 x 1</p>
                                                </div>
                                            </td>
                                            <td>$ 145</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Sub Total:</h6>
                                            </td>
                                            <td>
                                                $ 400
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Shipping:</h6>
                                            </td>
                                            <td>
                                                Free
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Total:</h6>
                                            </td>
                                            <td>
                                                $ 400
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- modals -->

        <!-- JAVASCRIPT -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/simplebar.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/js/dataTables.responsive.min.js"></script>
        <script src="assets/js/responsive.bootstrap4.min.js"></script>
        <script src="assets/js/ecommerce-order-list.init.js"></script>

        <script src="assets/js/app.js"></script>

</main>