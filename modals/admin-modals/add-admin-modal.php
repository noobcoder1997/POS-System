<!--Add Admin Modal -->
<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Administrator</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <form id="-add-admin-form">
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputFirstName" type="text" placeholder="Enter first name" required/>
                            <label for="inputFirstName">First name</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputMiddleName" type="text" placeholder="Enter middle name"/>
                            <label for="inputMiddleName">Middle name</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputLastName" type="text" placeholder="Enter last name" required/>
                            <label for="inputLastName">Last name</label>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputEmail" type="email" placeholder="Enter Username" required/>
                            <label for="inputEmail">Email address</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputPassword" type="password" placeholder="Enter Password" required/>
                            <label for="inputPassword">Password</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputConfirmPassword" type="password" placeholder="Confirm Password" required/>
                            <label for="inputConfirmPassword">Confirm Password</label>
                        </div>
                    </div>
                <br>
                <span id="add-admin-message"></span>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>