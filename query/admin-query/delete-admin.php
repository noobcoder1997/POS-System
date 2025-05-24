<?php
    require '../../config/functions.php';

    $id = validate($_POST['id']);

    // delete_query('users', $id);

    $conn->close();
?>