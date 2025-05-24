<!-------------------------------------------------SUPPLIER MODAL ------------------------------------------------->
<!-------------------------------------------------SUPPLIER MODAL ------------------------------------------------->
<!-------------------------------------------------SUPPLIER MODAL ------------------------------------------------->

<!--Edit Product Modal -->
    <div class="modal fade" id="editSupplier<?php echo $supplier['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Supplier Information</h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <form id="-edit-Product-form" onsubmit="return edit_supplier_form(<?php echo $supplier['id']; ?>)">
                        <div class="col-sm-12 mb-3">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputSupplierName<?php echo $supplier['id']; ?>" type="text" placeholder="Enter Product name" value="<?php echo $supplier['supplier_name']; ?>" required/>
                                <label for="inputSupplierName<?php echo $supplier['id']; ?>">Product name</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputContactPerson<?php echo $supplier['id']; ?>" type="text" placeholder="Enter Description" value="<?php echo $supplier['contact_person']; ?>" required/>
                                <label for="inputContactPerson<?php echo $supplier['id']; ?>">Contact Person</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputSupplierPhone<?php echo $supplier['id']; ?>" type="text" placeholder="Enter Price" value="<?php echo $supplier['phone']; ?>" required/>
                                <label for="inputSupplierPhone<?php echo $supplier['id']; ?>">Contact Number</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputsupplierEmail<?php echo $supplier['id']; ?>" type="email" placeholder="Enter Quantity" value="<?php echo $supplier['email']; ?>" />
                                <label for="inputsupplierEmail<?php echo $supplier['id']; ?>">Email (optional)</label>
                            </div>
                        </div>
                    <br>
                    <span id="edit-supplier-message<?php echo $supplier['id']; ?>"></span>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<!-- Delete Product Modal-->
    <div class="modal fade" id="deleteSupplier<?php echo $supplier['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Supplier Information</h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Supplier?</p>
                    <br>
                    <strong>This action cannot be undone.</strong>
                </div>
                <br>
                <span id="delete-Product-message"></span>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSupplierConfirm" onclick="delete_Supplier_btn(<?php echo $supplier['id']; ?>)">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteSupplierConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <p>Deletion Successful:</p>
                    <br>
                    <strong>Supplier have been deleted successfully!</strong>
                </div>
                <br>
                <span id="delete-supplier-message"></span>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <?php //include 'query/supplier-query/edit-delete-supplier-script.php'; ?> 

<!-- View Supplier -->
<div class="modal fade" id="viewSupplier<?php echo $supplier['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">View Supplier Information</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 mb-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputProductName<?php echo $supplier['id']; ?>" type="text" placeholder="Enter Product name" value="<?php echo $supplier['supplier_name']; ?>" disabled/>
                        <label for="inputProductName<?php echo $supplier['id']; ?>">Supplier Name</label>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputProductName<?php echo $supplier['id']; ?>" type="text" placeholder="Enter Product name" value="<?php echo $supplier['contact_person']; ?>" disabled/>
                        <label for="inputProductName<?php echo $supplier['id']; ?>">Contact Person</label>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputProductDescription<?php echo $supplier['id']; ?>" type="text" placeholder="Enter Description" value="<?php echo $supplier['phone']; ?>" disabled/>
                        <label for="inputProductDescription<?php echo $supplier['id']; ?>">Phone Number</label>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputProductPrice<?php echo $supplier['id']; ?>" type="text" placeholder="Enter Price" value="<?php echo $supplier['email']; ?>" disabled/>
                        <label for="inputProductPrice<?php echo $supplier['id']; ?>">Email</label>
                    </div>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </div>
        </div>
    </div>
</div>
<!--========================================= END SUPPLIER MODAL =========================================-->
<!--========================================= END SUPPLIER MODAL =========================================-->
<!--========================================= END SUPPLIER MODAL =========================================-->