<div class="modal fade" id="billingModal" tabindex="-1" role="dialog" aria-labelledby="orderPlacedModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderPlacedModalLabel">Order Billing</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
            <?php
                $products = $_SESSION['product'];
                $price = 0;
                
                foreach($products as $product):
                    
                    $price += $product['price'];
                endforeach;
            ?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="pay" placeholder="enter amount" value="<?php echo number_format($price, 2);?>" disabled>
                    <label for="pay">Amount to Pay</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="cash" placeholder="enter amount">
                    <label for="cash">Enter Payment Amount</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="change" name="change" placeholder="enter amount" disabled>
                    <label for="change">Change</label>
                </div>
                <br>
                <span id="payment-alert"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pay-order">Pay</button>
            </div>
        </div>
    </div>
</div>