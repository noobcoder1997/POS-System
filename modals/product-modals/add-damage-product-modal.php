<!--Add CATEGORY Modal -->
<div class="modal fade" id="damageProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Damage Product</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body"> 
                <form id="-add-damage-product-form">
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
                                            No Supplier found...
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
                            <select class="form-select" id="inputProductName" type="text" placeholder="Enter Product name">
                                <?php 
                                    $products = selectAll("products");
                                    if(mysqli_num_rows($products) > 0) {
                                        foreach($products as $product):
                                    ?>
                                        <option value="<?php echo $product['id']; ?>">
                                            <?php echo $product['product_name']; ?>
                                        </option>
                                    <?php
                                        endforeach;
                                    }
                                    else { 
                                    ?>
                                        <option value="">
                                            No Product found...
                                        </option>
                                    <?php
                                    }
                                ?>
                            </select>
                            <label for="inputProductName">Product name</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputProductQty" type="number" placeholder="Enter Quantity" value="1" step="1" min='1' oninput="if(this.value < 1){ this.value = 1 }" onkeydown="return event.key !== '.' && event.key !== ','" required/>
                            <label for="inputProductQty">Quantity</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <select class="form-select" id="inputProductName" type="text" placeholder="Enter Product name">
                                <option value="1">Defective</option>
                                <option value="2">Expired</option>
                                <option value="3">Damaged</option>
                            </select>
                            <label for="inputProductImg">Status</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="mb-3 mb-md-0 justify-content-between text-align-center" style="border: 1px solid lightgrey; border-style: solid; border-radius: 5px">
                            <p id="scan-status">Scan Barcode:</p>
                            <p id="_scan-status">
                            <span id="_scan" class="badge"></span>
                                <input type="text" id="_barcode" value="" onkeypress="onkeyDown(event)" style="position: absolute; left: -9999px;" tabindex="0"/>
                                <a class="badge btn btn-warning" onclick="$('#_barcode').focus().val('');"> 
                                    <span class="fa fa-refresh"></span>
                                </a>
                            </p>
                        </div>
                    </div>
                <br>
                <input id="_inputBarcodeData" type="hidden" disabled/>
                <span id="damage-product-message"></span> 
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>