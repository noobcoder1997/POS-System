
<div class="modal fade" id="inXLSXModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">INS Report XLSX</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <form id="-make-in-xlsx-report-form" action="report/xlsx/total-in-inventory-report-xlsx.php" method="post">
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <select name="in-inputXLSXFrom" id="in-inputXLSXFrom" class="form-select" placeholder="Enter first name">
                                <option value=""></option>
                            <?php
                                for ($m = 1; $m <= 12; $m++) {
                                    $monthName = date('F', mktime(0, 0, 0, $m, 1));
                                    echo "<option value='$m'>$monthName</option>";
                                }
                            ?>
                            </select>
                            <label for="in-inputXLSXFrom">From</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <select name="in-inputXLSXTo" id="in-inputXLSXTo" class="form-select" placeholder="Enter first name">
                                <option value=""></option>
                            <?php
                                for ($m = 1; $m <= 12; $m++) {
                                    $monthName = date('F', mktime(0, 0, 0, $m, 1));
                                    echo "<option value='$m'>$monthName</option>";
                                }
                            ?>
                            </select>                            
                            <label for="in-inputXLSXTo">To</label>
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