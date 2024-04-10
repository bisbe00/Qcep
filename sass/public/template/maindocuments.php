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
                                                    placeholder="" aria-controls="order-list"></label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table
                                            class="table align-middle table-nowrap dt-responsive nowrap w-100 table-check dataTable no-footer dtr-inline"
                                            id="order-list" aria-describedby="order-list_info" style="width: 1502px;">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width: 24px;" class="align-middle sorting" tabindex="0"
                                                        aria-controls="order-list" rowspan="1" colspan="1" aria-label="
                                                            
                                                                
                                                                
                                                            
                                                        : activate to sort column ascending">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="checkAll">
                                                            <label class="form-check-label" for="checkAll"></label>
                                                        </div>
                                                    </th>
                                                    <th class="align-middle sorting sorting_desc" tabindex="0"
                                                        aria-controls="order-list" rowspan="1" colspan="1"
                                                        style="width: 113px;" aria-sort="descending"
                                                        aria-label="Order ID: activate to sort column ascending">Order
                                                        ID</th>
                                                    <th class="align-middle sorting" tabindex="0"
                                                        aria-controls="order-list" rowspan="1" colspan="1"
                                                        style="width: 168px;"
                                                        aria-label="Billing Name: activate to sort column ascending">
                                                        Billing Name</th>
                                                    <th class="align-middle sorting" tabindex="0"
                                                        aria-controls="order-list" rowspan="1" colspan="1"
                                                        style="width: 137px;"
                                                        aria-label="Date: activate to sort column ascending">Date</th>
                                                    <th class="align-middle sorting" tabindex="0"
                                                        aria-controls="order-list" rowspan="1" colspan="1"
                                                        style="width: 79px;"
                                                        aria-label="Total: activate to sort column ascending">Total</th>
                                                    <th class="align-middle sorting" tabindex="0"
                                                        aria-controls="order-list" rowspan="1" colspan="1"
                                                        style="width: 198px;"
                                                        aria-label="Payment Status: activate to sort column ascending">
                                                        Payment Status</th>
                                                    <th class="align-middle sorting" tabindex="0"
                                                        aria-controls="order-list" rowspan="1" colspan="1"
                                                        style="width: 211px;"
                                                        aria-label="Payment Method: activate to sort column ascending">
                                                        Payment Method</th>
                                                    <th class="align-middle sorting_disabled" rowspan="1" colspan="1"
                                                        style="width: 157px;" aria-label="View Details">View Details
                                                    </th>
                                                    <th class="align-middle sorting_disabled" rowspan="1" colspan="1"
                                                        style="width: 101px;" aria-label="Action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td class="dtr-control">
                                                        <div class="form-check font-size-16"> <input
                                                                class="form-check-input" type="checkbox"
                                                                id="orderlistIdCheck-12"> <label
                                                                class="form-check-label"
                                                                for="orderlistIdCheck-12"></label> </div>
                                                    </td>
                                                    <td class="sorting_1"><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK12</a></td>
                                                    <td>
                                                        <div class="customerlist-name">Valerie Keys</div>
                                                    </td>
                                                    <td>25 Sept, 2019</td>
                                                    <td>$345</td>
                                                    <td><span
                                                            class="badge rounded-pill badge-soft-warning font-size-12">Refund</span>
                                                    </td>
                                                    <td>
                                                        <div><i class="fab fa-cc-visa me-1"></i>Visa</div>
                                                    </td>
                                                    <td><button type="button"
                                                            class="btn btn-primary btn-sm btn-rounded viewdetail-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".orderdetailsModal">View Details</button>
                                                    </td>
                                                    <td>
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
                                                    <td class="dtr-control">
                                                        <div class="form-check font-size-16"> <input
                                                                class="form-check-input" type="checkbox"
                                                                id="orderlistIdCheck-11"> <label
                                                                class="form-check-label"
                                                                for="orderlistIdCheck-11"></label> </div>
                                                    </td>
                                                    <td class="sorting_1"><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK11</a></td>
                                                    <td>
                                                        <div class="customerlist-name">David Crawford</div>
                                                    </td>
                                                    <td>26 Sept, 2019</td>
                                                    <td>$350</td>
                                                    <td><span
                                                            class="badge rounded-pill badge-soft-success font-size-12">Paid</span>
                                                    </td>
                                                    <td>
                                                        <div><i class="fab fa-cc-mastercard me-1"></i>Mastercard</div>
                                                    </td>
                                                    <td><button type="button"
                                                            class="btn btn-primary btn-sm btn-rounded viewdetail-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".orderdetailsModal">View Details</button>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3"> <a href="#newOrderModal"
                                                                data-bs-toggle="modal" class="text-success edit-list"
                                                                data-edit-id="11"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a> <a
                                                                href="#removeItemModal" data-bs-toggle="modal"
                                                                class="text-danger remove-list" data-remove-id="11"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a> </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="dtr-control" tabindex="0">
                                                        <div class="form-check font-size-16"> <input
                                                                class="form-check-input" type="checkbox"
                                                                id="orderlistIdCheck-10"> <label
                                                                class="form-check-label"
                                                                for="orderlistIdCheck-10"></label> </div>
                                                    </td>
                                                    <td class="sorting_1"><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK10</a></td>
                                                    <td>
                                                        <div class="customerlist-name">Jessie Jones</div>
                                                    </td>
                                                    <td>26 Sept, 2019</td>
                                                    <td>$374</td>
                                                    <td><span
                                                            class="badge rounded-pill badge-soft-success font-size-12">Paid</span>
                                                    </td>
                                                    <td>
                                                        <div><i class="fas fa-money-bill-alt me-1"></i>COD</div>
                                                    </td>
                                                    <td><button type="button"
                                                            class="btn btn-primary btn-sm btn-rounded viewdetail-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".orderdetailsModal">View Details</button>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3"> <a href="#newOrderModal"
                                                                data-bs-toggle="modal" class="text-success edit-list"
                                                                data-edit-id="10"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a> <a
                                                                href="#removeItemModal" data-bs-toggle="modal"
                                                                class="text-danger remove-list" data-remove-id="10"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a> </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="dtr-control" tabindex="0">
                                                        <div class="form-check font-size-16"> <input
                                                                class="form-check-input" type="checkbox"
                                                                id="orderlistIdCheck-09"> <label
                                                                class="form-check-label"
                                                                for="orderlistIdCheck-09"></label> </div>
                                                    </td>
                                                    <td class="sorting_1"><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK09</a></td>
                                                    <td>
                                                        <div class="customerlist-name">Clark Benson</div>
                                                    </td>
                                                    <td>01 Oct, 2019</td>
                                                    <td>$345</td>
                                                    <td><span
                                                            class="badge rounded-pill badge-soft-warning font-size-12">Refund</span>
                                                    </td>
                                                    <td>
                                                        <div><i class="fab fa-cc-visa me-1"></i>Visa</div>
                                                    </td>
                                                    <td><button type="button"
                                                            class="btn btn-primary btn-sm btn-rounded viewdetail-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".orderdetailsModal">View Details</button>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3"> <a href="#newOrderModal"
                                                                data-bs-toggle="modal" class="text-success edit-list"
                                                                data-edit-id="09"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a> <a
                                                                href="#removeItemModal" data-bs-toggle="modal"
                                                                class="text-danger remove-list" data-remove-id="09"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a> </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="dtr-control" tabindex="0">
                                                        <div class="form-check font-size-16"> <input
                                                                class="form-check-input" type="checkbox"
                                                                id="orderlistIdCheck-08"> <label
                                                                class="form-check-label"
                                                                for="orderlistIdCheck-08"></label> </div>
                                                    </td>
                                                    <td class="sorting_1"><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK08</a></td>
                                                    <td>
                                                        <div class="customerlist-name">Dustin Moser</div>
                                                    </td>
                                                    <td>02 Oct, 2019</td>
                                                    <td>$350</td>
                                                    <td><span
                                                            class="badge rounded-pill badge-soft-success font-size-12">Paid</span>
                                                    </td>
                                                    <td>
                                                        <div><i class="fab fa-cc-mastercard me-1"></i>Mastercard</div>
                                                    </td>
                                                    <td><button type="button"
                                                            class="btn btn-primary btn-sm btn-rounded viewdetail-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".orderdetailsModal">View Details</button>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3"> <a href="#newOrderModal"
                                                                data-bs-toggle="modal" class="text-success edit-list"
                                                                data-edit-id="08"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a> <a
                                                                href="#removeItemModal" data-bs-toggle="modal"
                                                                class="text-danger remove-list" data-remove-id="08"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a> </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="dtr-control" tabindex="0">
                                                        <div class="form-check font-size-16"> <input
                                                                class="form-check-input" type="checkbox"
                                                                id="orderlistIdCheck-07"> <label
                                                                class="form-check-label"
                                                                for="orderlistIdCheck-07"></label> </div>
                                                    </td>
                                                    <td class="sorting_1"><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK07</a></td>
                                                    <td>
                                                        <div class="customerlist-name">William Cruz</div>
                                                    </td>
                                                    <td>03 Oct, 2019</td>
                                                    <td>$374</td>
                                                    <td><span
                                                            class="badge rounded-pill badge-soft-success font-size-12">Paid</span>
                                                    </td>
                                                    <td>
                                                        <div><i class="fas fa-money-bill-alt me-1"></i>COD</div>
                                                    </td>
                                                    <td><button type="button"
                                                            class="btn btn-primary btn-sm btn-rounded viewdetail-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".orderdetailsModal">View Details</button>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3"> <a href="#newOrderModal"
                                                                data-bs-toggle="modal" class="text-success edit-list"
                                                                data-edit-id="07"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a> <a
                                                                href="#removeItemModal" data-bs-toggle="modal"
                                                                class="text-danger remove-list" data-remove-id="07"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a> </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="dtr-control" tabindex="0">
                                                        <div class="form-check font-size-16"> <input
                                                                class="form-check-input" type="checkbox"
                                                                id="orderlistIdCheck-06"> <label
                                                                class="form-check-label"
                                                                for="orderlistIdCheck-06"></label> </div>
                                                    </td>
                                                    <td class="sorting_1"><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK06</a></td>
                                                    <td>
                                                        <div class="customerlist-name">Jacob Hunter</div>
                                                    </td>
                                                    <td>04 Oct, 2019</td>
                                                    <td>$392</td>
                                                    <td><span
                                                            class="badge rounded-pill badge-soft-success font-size-12">Paid</span>
                                                    </td>
                                                    <td>
                                                        <div><i class="fab fa-cc-paypal me-1"></i>Paypal</div>
                                                    </td>
                                                    <td><button type="button"
                                                            class="btn btn-primary btn-sm btn-rounded viewdetail-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".orderdetailsModal">View Details</button>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3"> <a href="#newOrderModal"
                                                                data-bs-toggle="modal" class="text-success edit-list"
                                                                data-edit-id="06"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a> <a
                                                                href="#removeItemModal" data-bs-toggle="modal"
                                                                class="text-danger remove-list" data-remove-id="06"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a> </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="dtr-control" tabindex="0">
                                                        <div class="form-check font-size-16"> <input
                                                                class="form-check-input" type="checkbox"
                                                                id="orderlistIdCheck-05"> <label
                                                                class="form-check-label"
                                                                for="orderlistIdCheck-05"></label> </div>
                                                    </td>
                                                    <td class="sorting_1"><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK05</a></td>
                                                    <td>
                                                        <div class="customerlist-name">Ronald Taylor</div>
                                                    </td>
                                                    <td>04 Oct, 2019</td>
                                                    <td>$404</td>
                                                    <td><span
                                                            class="badge rounded-pill badge-soft-warning font-size-12">Refund</span>
                                                    </td>
                                                    <td>
                                                        <div><i class="fab fa-cc-visa me-1"></i>Visa</div>
                                                    </td>
                                                    <td><button type="button"
                                                            class="btn btn-primary btn-sm btn-rounded viewdetail-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".orderdetailsModal">View Details</button>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3"> <a href="#newOrderModal"
                                                                data-bs-toggle="modal" class="text-success edit-list"
                                                                data-edit-id="05"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a> <a
                                                                href="#removeItemModal" data-bs-toggle="modal"
                                                                class="text-danger remove-list" data-remove-id="05"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a> </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="dtr-control" tabindex="0">
                                                        <div class="form-check font-size-16"> <input
                                                                class="form-check-input" type="checkbox"
                                                                id="orderlistIdCheck-04"> <label
                                                                class="form-check-label"
                                                                for="orderlistIdCheck-04"></label> </div>
                                                    </td>
                                                    <td class="sorting_1"><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK04</a></td>
                                                    <td>
                                                        <div class="customerlist-name">Barry Dick</div>
                                                    </td>
                                                    <td>05 Oct, 2019</td>
                                                    <td>$412</td>
                                                    <td><span
                                                            class="badge rounded-pill badge-soft-success font-size-12">Paid</span>
                                                    </td>
                                                    <td>
                                                        <div><i class="fab fa-cc-mastercard me-1"></i>Mastercard</div>
                                                    </td>
                                                    <td><button type="button"
                                                            class="btn btn-primary btn-sm btn-rounded viewdetail-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".orderdetailsModal">View Details</button>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3"> <a href="#newOrderModal"
                                                                data-bs-toggle="modal" class="text-success edit-list"
                                                                data-edit-id="04"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a> <a
                                                                href="#removeItemModal" data-bs-toggle="modal"
                                                                class="text-danger remove-list" data-remove-id="04"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a> </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="dtr-control" tabindex="0">
                                                        <div class="form-check font-size-16"> <input
                                                                class="form-check-input" type="checkbox"
                                                                id="orderlistIdCheck-03"> <label
                                                                class="form-check-label"
                                                                for="orderlistIdCheck-03"></label> </div>
                                                    </td>
                                                    <td class="sorting_1"><a href="javascript: void(0);"
                                                            class="text-body orderlist-id fw-bold">#SK03</a></td>
                                                    <td>
                                                        <div class="customerlist-name">Juan Mitchell</div>
                                                    </td>
                                                    <td>06 Oct, 2019</td>
                                                    <td>$384</td>
                                                    <td><span
                                                            class="badge rounded-pill badge-soft-success font-size-12">Paid</span>
                                                    </td>
                                                    <td>
                                                        <div><i class="fab fa-cc-paypal me-1"></i>Paypal</div>
                                                    </td>
                                                    <td><button type="button"
                                                            class="btn btn-primary btn-sm btn-rounded viewdetail-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".orderdetailsModal">View Details</button>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3"> <a href="#newOrderModal"
                                                                data-bs-toggle="modal" class="text-success edit-list"
                                                                data-edit-id="03"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a> <a
                                                                href="#removeItemModal" data-bs-toggle="modal"
                                                                class="text-danger remove-list" data-remove-id="03"><i
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
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="order-list_info" role="status"
                                            aria-live="polite">Showing 1 to 10 of 12 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers pagination-rounded"
                                            id="order-list_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="order-list_previous"><a aria-controls="order-list"
                                                        aria-disabled="true" role="link" data-dt-idx="previous"
                                                        tabindex="-1" class="page-link"><i
                                                            class="mdi mdi-chevron-left"></i></a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="order-list" role="link" aria-current="page"
                                                        data-dt-idx="0" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="order-list" role="link" data-dt-idx="1"
                                                        tabindex="0" class="page-link">2</a></li>
                                                <li class="paginate_button page-item next" id="order-list_next"><a
                                                        href="#" aria-controls="order-list" role="link"
                                                        data-dt-idx="next" tabindex="0" class="page-link"><i
                                                            class="mdi mdi-chevron-right"></i></a></li>
                                            </ul>
                                        </div>
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
                        <h4 class="card-title mb-4">Team Members</h4>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    <tr>
                                        <td style="width: 50px;"><img src="assets/images/users/avatar-2.jpg"
                                                class="rounded-circle avatar-xs" alt=""></td>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                    class="text-dark">Daniel Canales</a></h5>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="javascript: void(0);"
                                                    class="badge bg-primary-subtle text-primary font-size-11">Frontend</a>
                                                <a href="javascript: void(0);"
                                                    class="badge bg-primary-subtle text-primary font-size-11">UI</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs"
                                                alt=""></td>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                    class="text-dark">Jennifer Walker</a></h5>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="javascript: void(0);"
                                                    class="badge bg-primary-subtle text-primary font-size-11">UI /
                                                    UX</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="avatar-xs">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                    C
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                    class="text-dark">Carl Mackay</a></h5>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="javascript: void(0);"
                                                    class="badge bg-primary-subtle text-primary font-size-11">Backend</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs"
                                                alt=""></td>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                    class="text-dark">Janice Cole</a></h5>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="javascript: void(0);"
                                                    class="badge bg-primary-subtle text-primary font-size-11">Frontend</a>
                                                <a href="javascript: void(0);"
                                                    class="badge bg-primary-subtle text-primary font-size-11">UI</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="avatar-xs">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                    T
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                    class="text-dark">Tony Brafford</a></h5>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="javascript: void(0);"
                                                    class="badge bg-primary-subtle text-primary font-size-11">Backend</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- proces user admin -->

        </div>

</main>