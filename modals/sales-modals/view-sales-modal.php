
<div class="modal fade" id="viewSales<?php echo $product['transaction_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">View Sales</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 mb-3">    
                    <center>
                        <img src="<?php echo $product['image']; ?>" style="width:100px;height:100px;border-radius:50%; box-shadow:0 0 15px 0;object-fit:contain;" alt="product image"
                        onclick="$('#inputProductImg<?php echo $product['transaction_id']; ?>').click()" id="img-content<?php echo $product['transaction_id']; ?>">
                    </center>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputProductName<?php echo $product['transaction_id']; ?>" type="text" placeholder="Enter Product name" value="<?php echo date('F d, Y', strtotime($product['date'])); ?>" disabled/>
                        <label for="inputProductName<?php echo $product['transaction_id']; ?>">Date of Purchase</label>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputProductName<?php echo $product['transaction_id']; ?>" type="text" placeholder="Enter Product name" value="<?php echo $product['product_name']; ?>" disabled/>
                        <label for="inputProductName<?php echo $product['transaction_id']; ?>">Product name</label>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputProductDescription<?php echo $product['transaction_id']; ?>" type="text" placeholder="Enter Description" value="<?php echo $product['description']; ?>" disabled/>
                        <label for="inputProductDescription<?php echo $product['transaction_id']; ?>">Description</label>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputProductPrice<?php echo $product['transaction_id']; ?>" type="text" placeholder="Enter Price" value="<?php echo number_format($product['price'],2); ?>" disabled/>
                        <label for="inputProductPrice<?php echo $product['transaction_id']; ?>">Price</label>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputProductQty<?php echo $product['transaction_id']; ?>" type="text" placeholder="Enter Quantity" value="<?php echo $product['transaction_qty']; ?>" disabled/>
                        <label for="inputProductQty<?php echo $product['transaction_id']; ?>">Quantity Sold</label>
                    </div>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </div>
        </div>
    </div>
</div>