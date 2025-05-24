<?php
    require '../../config/functions.php';

    $id = validate($_POST['id']);

    delete_query('categories', $id);
    
    $conn->close();
?>