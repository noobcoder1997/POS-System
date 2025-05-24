<?php
    // Database connection
    include '../../config/functions.php';

    // Input value
    $input_contact = $_POST['contact'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM customers WHERE contact = ?");
    $stmt->bind_param("s", $input_contact);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Customer contact matches
        echo $input_contact;
    } else {
        // Customer contact does not match
        echo 0;
    }
?>