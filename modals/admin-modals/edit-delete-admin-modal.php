<!--Edit Admin Modal -->
<div class="modal fade" id="editAdmin<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Administrator</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <form onsubmit="return edit_admin_form(<?php echo $user['id']; ?>)">
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputFirstName<?php echo $user['id']; ?>" type="text" placeholder="Enter first name" value="<?php echo $user['first_name']; ?>" required/>
                            <label for="inputFirstName<?php echo $user['id']; ?>">First name</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputMiddleName<?php echo $user['id']; ?>" type="text" placeholder="Enter middle name" value="<?php echo $user['middle_name']; ?>"/>
                            <label for="inputMiddleName<?php echo $user['id']; ?>">Middle name</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputLastName<?php echo $user['id']; ?>" type="text" placeholder="Enter last name" value="<?php echo $user['last_name']; ?>" required/>
                            <label for="inputLastName<?php echo $user['id']; ?>">Last name</label>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputEmail<?php echo $user['id']; ?>" type="email" placeholder="Enter Username" value="<?php echo $user['email']; ?>" required/>
                            <label for="inputEmail<?php echo $user['id']; ?>">Email address</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputPassword<?php echo $user['id']; ?>" type="password" placeholder="Enter Password" />
                            <label for="inputPassword<?php echo $user['id']; ?>">Password</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputConfirmPassword<?php echo $user['id']; ?>" type="password" placeholder="Confirm Password" />
                            <label for="inputConfirmPassword<?php echo $user['id']; ?>">Confirm Password</label>
                        </div>
                    </div>
                <br>
                <span id="edit-admin-message<?php echo $user['id']; ?>"></span>
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
<div class="modal fade" id="deleteAdmin<?php echo $user['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Administrator</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this admin?</p>
                <br>
                <strong>This action cannot be undone.</strong>
            </div>
            <br>
            <span id="delete-admin-message"></span>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAdminConfirm" onclick="delete_admin_btn(<?php echo $user['id']; ?>)">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteAdminConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Administrator</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <p>Deletion Successful:</p>
                <br>
                <strong>Admin have been deleted successfully!</strong>
            </div>
            <br>
            <span id="delete-admin-message"></span>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>