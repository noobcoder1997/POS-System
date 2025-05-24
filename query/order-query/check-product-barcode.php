<?php
    // check-product-barcode.php
    include '../../config/functions.php';

    // Check if barcode is set
    if (isset($_POST['barcode'])) {
        $barcode = $_POST['barcode'];

        // Prepare and bind
        $stmt = $conn->prepare("SELECT p.*, p.id AS p_id, b.* FROM product_batches b, products p WHERE p.id = b.product_id AND p.supplier_id = b.supplier_id AND barcode = ? AND batch_date <= batch_date ORDER BY batch_date ASC");
        $stmt->bind_param("s", $barcode);

        // Execute statement
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if product exists
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            ?>
                <option value="<?php echo $product['p_id']; ?>"><?php echo $product['product_name']; ?></option>
            <?php
        }
        else{
            ?>
                <option></option>
            <?php
        }
    }
?>