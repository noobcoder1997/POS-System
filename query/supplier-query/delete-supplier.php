<?php
    require '../../config/functions.php';

    $id = validate($_POST['id']);

    delete_query('suppliers', $id);


    $conn->close();
?>