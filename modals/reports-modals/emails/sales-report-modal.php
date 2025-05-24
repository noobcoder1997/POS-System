<div class="modal fade" id="salesEMAILModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Sales Report EMAIL</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <form id="-make-sales-email-report-form" action="report/emails/total-sales-report-email.php?email=<?php echo base64_encode($_SESSION['user_details']['email']); ?>" method="post">
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <select name="in-inputEMAILFrom" id="in-inputEMAILFrom" class="form-select" placeholder="Enter first name">
                                <option value=""></option>
                            <?php
                                for ($m = 1; $m <= 12; $m++) {
                                    $monthName = date('F', mktime(0, 0, 0, $m, 1));
                                    echo "<option value='$m'>$monthName</option>";
                                }
                            ?>
                            </select>
                            <label for="in-inputEMAILFrom">From</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <select name="in-inputEMAILTo" id="in-inputEMAILTo" class="form-select" placeholder="Enter first name">
                                <option value=""></option>
                            <?php
                                for ($m = 1; $m <= 12; $m++) {
                                    $monthName = date('F', mktime(0, 0, 0, $m, 1));
                                    echo "<option value='$m'>$monthName</option>";
                                }
                            ?>
                            </select>                            
                            <label for="in-inputEMAILTo">To</label>
                        </div>
                    </div>
                <br>
                <span id="in-pdf-message"></span>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>