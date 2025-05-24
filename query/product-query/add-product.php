<?php
    require '../../config/functions.php';

    $category_id = validate($_POST['category-id']);
    $supplier_id = validate($_POST['supplier-id']);
    $product_name = validate($_POST['product-name']);
    $product_description = validate($_POST['product-description']);
    $product_price = validate($_POST['product-price']);
    $product_quantity = validate($_POST['product-quantity']);
    $product_barcode = validate($_POST['product-barcode']);
    $product_status = validate($_POST['product-status']);
    $data = [];
    $message='';
    $reload=false;
    
    $product_status = $product_status == 'true' ? 0 : 1;
    
    $message_array = [
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Product already exist.
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Invalid Product Price!
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Successful:</strong> New Product added!
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
            'supplier_id' => $supplier_id,
            'description' => $product_description,
            // 'price' => $product_price,
            // 'quantity' => $product_quantity,
            // 'barcode' => $product_barcode,
            'image' => $location,
            // 'status' => $product_status
        ];
    }
    else{
        $data = [
            'category_id' => $category_id,
            'product_name' => $product_name,
            'supplier_id' => $supplier_id,
            'description' => $product_description,
            // 'price' => $product_price,
            // 'quantity' => $product_quantity,
            // 'barcode' => $product_barcode,
            // 'status' => $product_status
        ];
    }

    $query0 = "SELECT * FROM products WHERE product_name = ? AND description = ? AND supplier_id = ?";

    $stmt = $conn->prepare($query0);
    $stmt->bind_param("sss",$product_name, $product_description, $supplier_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) > 0){

        $message = $message_array[0];
    }
    else if($product_barcode == ''){
        
        $message = $message_array[3];
    }
    else if(!is_numeric($product_price)){
        
        $message = $message_array[1];
    }
    else{

        insert_query('products', $data);

        $last_id = $conn->insert_id;

        $data = [
            'product_id' => $last_id,
            'supplier_id' => $supplier_id,
            'price' => $product_price,
            'quantity_in_stock' => $product_quantity,
            'barcode' => $product_barcode,
        ];
        insert_query('product_batches', $data);

        $data = [
            'product_id' => $last_id,
            'quantity' => $product_quantity,
        ];

        insert_query('transactions', $data);

        $message = $message_array[2];

        $reload = true;

        $stmt->close();
    }

    echo json_encode([$reload, $message]);

    $conn->close();
?>