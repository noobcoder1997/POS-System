<!-- Inventory out -->
<div class="modal fade" id="view-item-modal<?php echo $stock['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="customer-alert"></span>
                <form action="">
                    <div class="col-sm-12 mb-3">    
                        <center>
                            <img src="<?php echo $stock['image']; ?>" style="width:100px;height:100px;border-radius:50%; box-shadow:0 0 15px 0;object-fit:contain;" alt="product image"
                            onclick="$('#inputProductImg<?php echo $stock['id']; ?>').click()" id="img-content<?php echo $stock['id']; ?>">
                        </center>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="item_name" placeholder="item name" value="<?php echo date("F d, Y", strtotime($stock['date'])); ?>" disabled>
                        <label for="item_name">Date of Transaction</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="item_name" placeholder="item name" value="<?php echo $stock['product_name']; ?>" disabled>
                        <label for="item_name">Product Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="item_name" placeholder="item name" value="<?php echo $stock['quantity']; ?>" disabled>
                        <label for="item_name">Quantity</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="item_name" placeholder="item name" value="<?php echo ($stock['type']==0)? "In":"Out"; ?>" disabled>
                        <label for="item_name">Type of Transaction</label>
                    </div>
                </form>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary add-item">Add Item</button> -->
            </div>
        </div>
    </div>
</div>