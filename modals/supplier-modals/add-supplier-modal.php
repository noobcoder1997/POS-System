<!--Add Supplier Modal -->
<div class="modal fade" id="addSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Supplier</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body"> 
                <form id="-add-supplier-form">
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputSupplierName" type="text" placeholder="Enter Category name" required/>
                            <label for="inputSupplierName">Supplier Name</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputContactPerson" type="text" placeholder="Enter Category name" required/>
                            <label for="inputContactPerson">Contact Person</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputSupplierContactNumber" type="text" placeholder="Enter Category name" required/>
                            <label for="inputSupplierContactNumber">Contact Number</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputSupplierEmail" type="email" placeholder="Enter Category name" required/>
                            <label for="inputSupplierEmail">Email (optional)</label>
                        </div>
                    </div>
                <br>
                <span id="add-supplier-message"></span>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>