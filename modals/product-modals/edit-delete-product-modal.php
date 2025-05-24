<!-------------------------------------------------PRODUCT MODAL ------------------------------------------------->
<!-------------------------------------------------PRODUCT MODAL ------------------------------------------------->
<!-------------------------------------------------PRODUCT MODAL ------------------------------------------------->

<!--Edit Product Modal -->
    <div class="modal fade" id="editProduct<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Product</h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <form id="-edit-Product-form" onsubmit="return edit_product_form(<?php echo $product['id']; ?>)">
                        <input type="hidden" id="inputProductId<?php echo $product['id']; ?>" value="<?php echo $product['product_id']; ?>">
                        <div class="col-sm-12 mb-3">    
                            <center>
                                <img src="<?php echo $product['image']; ?>" style="width:100px;height:100px;border-radius:50%; box-shadow:0 0 15px 0;object-fit:contain;" alt="product image"
                                onclick="$('#inputProductImg<?php echo $product['id']; ?>').click()" id="img-content<?php echo $product['id']; ?>">
                            </center>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="form-floating mb-3 mb-md-0">
                                <select class="form-select" id="inputProductCategoryName<?php echo $product['id']; ?>" type="text" placeholder="Enter Product name" disabled>
                                    <option value="<?php echo $product['category_id']; ?>"><?php echo $product['category_name']; ?></option>
                                </select>
                                <label for="inputProductCategoryName<?php echo $product['id']; ?>">Category Name</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="form-floating mb-3 mb-md-0">
                                <select class="form-select" id="inputProductSupplier<?php echo $product['id']; ?>" type="text" placeholder="Enter Product name" value="<?php echo $product['supplier_name']; ?>" disabled>
                                    <option value="<?php echo $product['supplier_id']; ?>"><?php echo $product['supplier_name']; ?></option>
                                </select>
                                <label for="inputProductSupplier<?php echo $product['id']; ?>">Product name</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputProductName<?php echo $product['id']; ?>" type="text" placeholder="Enter Product name" value="<?php echo $product['product_name']; ?>" required/>
                                <label for="inputProductName<?php echo $product['id']; ?>">Product name</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputProductDescription<?php echo $product['id']; ?>" type="text" placeholder="Enter Description" value="<?php echo $product['description']; ?>" required/>
                                <label for="inputProductDescription<?php echo $product['id']; ?>">Description</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputProductPrice<?php echo $product['id']; ?>" type="text" placeholder="Enter Price" value="<?php echo $product['price']; ?>" required/>
                                <label for="inputProductPrice<?php echo $product['id']; ?>">Price</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputProductQty<?php echo $product['id']; ?>" type="text" placeholder="Enter Quantity" value="<?php echo $product['quantity_in_stock']; ?>" required disabled/>
                                <label for="inputProductQty<?php echo $product['id']; ?>">Qty</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3" style="display:none">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control mb-3" id="inputProductImg<?php echo $product['id']; ?>" type="file" placeholder="Enter Image" value="<?php echo $product['image']; ?>"
                                style="padding-top:30px;" accept="image/png, image/gif, image/jpeg"/>
                                <label for="inputProductImg<?php echo $product['id']; ?>">Product Image</label>
                            </div>
                        </div>
                        <!-- <div class="col-sm-12 mb-3">
                            <div class="mb-3 mb-md-0" style="border: 1px solid lightgrey; border-style: solid; border-radius: 5px">
                                <p id="" name="status<?php //echo $product['id']; ?>">Status</p>
                                <?php 
                                    // if($product['status'] <> 1){
                                        ?>
                                            <input id="inputProductStatus<?php //echo $product['id']; ?>" type="checkbox" checked/>
                                        <?php
                                    // }
                                    // else{
                                        ?>
                                            <input id="inputProductStatus<?php //echo $product['id']; ?>" type="checkbox"/>
                                        <?php
                                    // }
                                ?>
                            </div>
                        </div> -->
                        <div class="col-sm-12 mb-3">
                            <div class="form-floating mb-3 mb-md-0" style="border: 1px solid lightgrey; border-style: solid; border-radius: 5px">
                                <p id="scan-status<?php echo $product['id']; ?>">Scan Barcode:
                                </p>
                                <p id="scan-status1<?php echo $product['id']; ?>">
                                <span id="scan<?php echo $product['id']; ?>" class=" badge"></span>
                                    
                                <input type="text" id="barcode<?php echo $product['id']; ?>" value="" onkeypress="onkeyDown<?php echo $product['id']; ?>(event)" style="position: absolute; left: -9999px;" tabindex="0"/>

                                    <a class="btn btn-warning badge" onclick="$('#barcode<?php echo $product['id']; ?>').focus().val('');">
                                        <span class="fa fa-refresh"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    <br>
                    <?php include 'query/product-query/edit-delete-product-script.php';?>
                    <input id="inputbBarcodeData<?php echo $product['id']; ?>" value=
                    "<?php echo $product['barcode']; ?>" style="position: absolute; left: -9999px;" tabindex="0" disabled/>
                    <span id="edit-product-message<?php echo $product['id']; ?>"></span>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<!-- Delete Product Modal-->
    <div class="modal fade" id="deleteProduct<?php echo $product['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Product?</p>
                    <br>
                    <strong>This action cannot be undone.</strong>
                </div>
                <br>
                <span id="delete-Product-message"></span>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProductConfirm" onclick="delete_Product_btn(<?php echo $product['id']; ?>, <?php echo $product['product_id']; ?>)">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteProductConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <p>Deletion Successful:</p>
                    <br>
                    <strong>Product have been deleted successfully!</strong>
                </div>
                <br>
                <span id="delete-Product-message"></span>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'query/product-query/edit-delete-product-script.php'; ?>

<!--Re stock Modal -->
    <div class="modal fade" id="restockProduct<?php echo $product['batch_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Re-Stock Product</h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body"> 
                    <form id="-restock-product-form" onsubmit="return reStockProduct(<?php echo $product['batch_id']; ?>)">
                        <div class="col-sm-12 mb-3">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control"  type="text" placeholder="product name" value="<?php echo $product['product_name']; ?>" disabled/>
                                <label>Product Name</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputProductRestockQty<?php echo $product['batch_id']; ?>" type="text" placeholder="Enter quantity"/>
                                <label for="inputProductRestockQty<?php echo $product['batch_id']; ?>">Quantity</label>
                            </div>
                        </div>
                    <br>
                    <span id="restock-product-message<?php echo $product['batch_id']; ?>"></span> 
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>  
<!--========================================= END PRODUCT MODAL =========================================-->
<!--========================================= END PRODUCT MODAL =========================================-->
<!--========================================= END PRODUCT MODAL =========================================-->