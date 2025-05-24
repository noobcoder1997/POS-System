<?php

    include '../../config/functions.php';

    $id = validate($_POST['id']); //product_batches id
    $category_id = validate($_POST['category-id']);
    $supplier_id = validate($_POST['supplier-id']);
    $product_id = validate($_POST['product-id']);
    $product_name = validate($_POST['product-name']);
    $product_description = validate($_POST['product-description']);
    $product_price = validate($_POST['product-price']);
    $product_quantity = validate($_POST['product-quantity']);
    $product_barcode = validate($_POST['product-barcode']);
    $product_status = validate($_POST['product-status']);

    $product_status = $product_status == 'true' ? 0 : 1;
    $data=[];
    $message='';
    $reload=false;

    $message_array = [
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Product already exist.
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> This user already exist.
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Password did not match!.
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Successful:</strong> Product have been edited successfully!
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning:</strong> Barcode was not found!
        </div'
    ];

    if( !empty( $_FILES["product-image"]["tmp_name"] ) ){
        // $folder_name=$_POST['image']; 
        // $output_dir = @'photo'; 
        // 	if (!file_exists($output_dir . $folder_name))//checking if folder exist 
        // 	{ 
        // 		@mkdir($output_dir . $folder_name, 0777);//making folder 
            // } 
        $fileinfo=PATHINFO($_FILES["product-image"]["name"]);
        $newFilename=$fileinfo['filename'] ."." . $fileinfo['extension'];
        move_uploaded_file($_FILES["product-image"]["tmp_name"],"../../assets/product-images/" . $newFilename);
        $location="assets/product-images/" . $newFilename; //path
        $data = [
            'category_id' => $category_id,
            'product_name' => $product_name,
            'description' => $product_description,
            // 'price' => $product_price,
            // 'quantity' => $product_quantity,
            // 'barcode' => $product_barcode,
            'image' => $location,
            // 'status' => $product_status
        ];
    }else{
        $data = [
            'category_id' => $category_id,
            'product_name' => $product_name,
            'description' => $product_description,
            // 'price' => $product_price,
            // 'quantity' => $product_quantity,
            // 'barcode' => $product_barcode,
            // 'status' => $product_status
        ];
    }   

    //checks if there are same products but no same supplier
    $query0 = " SELECT * FROM products WHERE product_name = ? AND description = ? AND id <> ? AND supplier_id = ?";

    $stmt = $conn->prepare($query0);
    $stmt->bind_param("ssss",$product_name, $product_description, $id, $supplier_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) > 0){

        $message = $message_array[0];
    }
    else if($product_barcode == ''){
        $message = $message_array[4];
    }
    else{
        $reload=true;

        update_query('products', $product_id, $data);

        $message = $message_array[3];

        //update product_batches
        $data = [
            'price' => $product_price,
            'barcode' => $product_barcode,
        ];

        update_query('product_batches',$id, $data);

        $stmt->close();
    }

    echo json_encode([$reload, $message]);
    
    $conn->close();
?>
