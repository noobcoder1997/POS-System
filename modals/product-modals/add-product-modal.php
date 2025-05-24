<!--Add CATEGORY Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body"> 
                <form id="-add-product-form">
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <select name="" id="inputProductSupplierName" class="form-select" placeholder="Enter Product name" required>
                                <?php 
                                    $suppliers = selectAll("suppliers");
                                    if(mysqli_num_rows($suppliers) > 0) {
                                        foreach($suppliers as $supplier):
                                    ?>
                                        <option value="<?php echo $supplier['id']; ?>">
                                            <?php echo $supplier['supplier_name']; ?>
                                        </option>
                                    <?php
                                        endforeach;
                                    }
                                    else { 
                                    ?>
                                        <option value="">
                                            No Category found...
                                        </option>
                                    <?php
                                    }
                                ?>
                            </select>
                            <label for="inputProductSupplierName">Suppliers</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <select name="" id="inputProductCategoryName" class="form-select" placeholder="Enter Product name" required>
                                <?php 
                                    $categories = selectAll("categories");
                                    if(mysqli_num_rows($categories) > 0) {
                                        foreach($categories as $category):
                                    ?>
                                        <option value="<?php echo $category['id']; ?>">
                                            <?php echo $category['category_name']; ?>
                                        </option>
                                    <?php
                                        endforeach;
                                    }
                                    else { 
                                    ?>
                                        <option value="">
                                            No Category found...
                                        </option>
                                    <?php
                                    }
                                ?>
                            </select>
                            <label for="inputProductCategoryName">Categories</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputProductName" type="text" placeholder="Enter Product name" required/>
                            <label for="inputProductName">Product name</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <textarea class="form-control" id="inputProductDescription" type="text" placeholder="Enter Description" rows='5'></textarea>
                            <label for="inputProductDescription">Description</label>
                        </div> 
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputProductPrice" type="text" placeholder="Enter Price" required/>
                            <label for="inputProductPrice">Price</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputProductQty" type="text" placeholder="Enter Quantity" required/>
                            <label for="inputProductQty">Quantity</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control mb-3" id="inputProductImg" name="inputProductImg" type="file" placeholder="Enter Image" style="padding-top:30px;"/>
                            <label for="inputProductImg">Product Image</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="mb-3 mb-md-0" style="border: 1px solid lightgrey; border-style: solid; border-radius: 5px">
                            <p id="status">Visible</p>
                            <input id="inputProductStatus" type="checkbox"/>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="mb-3 mb-md-0 justify-content-between text-align-center" style="border: 1px solid lightgrey; border-style: solid; border-radius: 5px">
                            <p id="scan-status">Scan Barcode:</p>
                            <p id="scan-status1">
                            <span id="scan" class=" badge"></span>
                                <input type="text" id="barcode" value="" onkeypress="onkeyDown(event)" style="position: absolute; left: -9999px;" tabindex="0"/>
                                <a class="badge btn btn-warning" onclick="$('#barcode').focus().val('');"> 
                                    <span class="fa fa-refresh"></span>
                                </a>
                            </p>
                        </div>
                    </div>
                <br>
                <input id="inputBarcodeData" type="hidden" disabled/>
                <span id="add-product-message"></span> 
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>