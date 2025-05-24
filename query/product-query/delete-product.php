<?php
    require '../../config/functions.php';

    $id = validate($_POST['id']);
    $product_id = validate($_POST['product_id']);

    delete_query('products', $id);

    $qry = "DELETE FROM product_batches WHERE product_id = ? AND id = ?";
    $stmt=$conn->prepare($qry);
    $stmt->bind_param('ss', $product_id, $id);
    $stmt->execute();

    $conn->close($conn);
?>