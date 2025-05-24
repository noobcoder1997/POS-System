<?php
    require '../../config/functions.php';

    $category_name = validate($_POST['category-name']);
    $category_description = validate($_POST['category-description']);
    $category_status = validate($_POST['category-status']);
    
    $category_status = $category_status == 'true' ? 1 : 0;

    $message='';

    $reload=false;
    $data = [
        'category_name' => $category_name,
        'description' => $category_description,
        'status' => $category_status,
    ];

    $query0 = " SELECT * FROM categories WHERE category_name = ? AND description = ?";

    $stmt = $conn->prepare($query0);
    $stmt->bind_param("ss",$category_name, $category_description);
    $stmt->execute();
    $result = $stmt->get_result();

    $message_array = [
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Category already exist.
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Successful:</strong> New Category added!
        </div'
    ];

    if(mysqli_num_rows($result) > 0){

        $message = $message_array[0];
    }
    else{

        insert_query('categories', $data);

        $reload = true;
        $message = $message_array[1];

        $stmt->close();
    }

    echo json_encode([$reload, $message]);
    
    $conn->close();
?>