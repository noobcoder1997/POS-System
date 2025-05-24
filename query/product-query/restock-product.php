<?php
    // Database connection
    include '../../config/functions.php';

    // Get product ID and quantity to update
    $product_id = $_POST['id']; // Assuming data is sent via POST
    $new_quantity = $_POST['qty']; // New quantity to add
    $reload = false;
    $message = '';

    // Update query
    $sql = "UPDATE product_batches SET quantity_in_stock = quantity_in_stock + ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $new_quantity, $product_id);

    if ($stmt->execute()) {

        // Insert data into transaction table
        $data = [
            'product_id'=>$product_id,
            'quantity'=>$new_quantity,
        ];

        if(is_numeric($new_quantity)){
            insert_query('transactions', $data);

            $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Successful:</strong> Product quantity updated successfully!
            </div';
            $reload = true;
        }
        else{
            $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error:</strong> Quantity is not numeric!
            </div';
        }

        $stmt->close();
    } 
    else {
        echo "Error updating quantity: " . $conn->error;
    }
    
    echo json_encode([$reload, $message]);

    $conn->close()
?>