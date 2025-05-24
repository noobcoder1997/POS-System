<div class="modal fade" id="add-customer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="-add-customer-form">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="customer_name" placeholder="Enter name">
                    <label for="customer_name">Customer Full Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="customer_contact" placeholder="Enter name">
                    <label for="customer_contact">Customer Contact Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="customer_email" placeholder="Enter name">
                    <label for="customer_email">Customer Email (optional)</label>
                </div>
                <br>
                
                <span id="customer-alert"></span>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary">Add Customer</button>
                </form>
            </div>
        </div>
    </div>
</div>
