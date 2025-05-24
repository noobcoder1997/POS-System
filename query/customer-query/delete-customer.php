<?php
    require '../../config/functions.php';

    $id = validate($_POST['id']);

    delete_query('customers', $id);


    mysqli_close($conn);
?>