<!--Edit Admin Modal -->
<div class="modal fade" id="editCustomer<?php echo $customer['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Customer</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <form onsubmit="return edit_customer_form(<?php echo $customer['id']; ?>)">
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="name<?php echo $customer['id']; ?>" type="text" placeholder="Enter Name" value="<?php echo $customer['name']; ?>" required/>
                            <label for="name<?php echo $customer['id']; ?>">Name</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="contact<?php echo $customer['id']; ?>" type="text" placeholder="Enter Contact number" value="<?php echo $customer['contact']; ?>"/>
                            <label for="contact<?php echo $customer['id']; ?>">Contact Number</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="email<?php echo $customer['id']; ?>" type="text" placeholder="Enter last name" value="<?php echo $customer['email']; ?>" required/>
                            <label for="email<?php echo $customer['id']; ?>">Email</label>
                        </div>
                    </div>
                <br>
                <span id="edit-customer-message<?php echo $customer['id']; ?>"></span>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Admin Modal-->
<div class="modal fade" id="deleteCustomer<?php echo $customer['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Customer</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this customer?</p>
                <br>
                <strong>This action cannot be undone.</strong>
            </div>
            <br>
            <span id="delete-customer-message"></span>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCustomerConfirm" onclick="delete_customer_btn(<?php echo $customer['id']; ?>)">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteCustomerConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Administrator</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <p>Deletion Successful:</p>
                <br>
                <strong>Customer have been deleted successfully!</strong>
            </div>
            <br>
            <span id="delete-customer-message"></span>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>