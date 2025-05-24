<div class="modal fade" id="add-customer-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="customer_name">
                    <label for="customer_name">Customer Full Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="customer_contact">
                    <label for="customer_contact">Customer Contact Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="customer_email">
                    <label for="customer_email">Customer Email</label>
                </div>
                <br>
                
                <span id="customer-alert"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add-customer">Add Customer</button>
            </div>
        </div>
    </div>
</div>
