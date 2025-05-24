<?php

    include '../../config/functions.php';

    $id = validate($_POST['id']);
    $supplier_name = validate($_POST['supplier-name']);
    $supplier_contact_person = validate($_POST['supplier-contact-person']);
    $supplier_phone = validate($_POST['supplier-phone']);
    $supplier_email = validate($_POST['supplier-email']);

    $data=[];
    $message='';
    $reload = false;

    $message_array = [
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Supplier already exist.
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Invalid Contact Number!
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Invalid Email Address!
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Successful:</strong> Supplier have been edited successfully!
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Fields should not leave empty!
        </div'
    ];

    if($supplier_email <> ''){
        $data = [
            'supplier_name' => $supplier_name,
            'contact_person' => $supplier_contact_person,
            'phone' => $supplier_phone,
            'email' => $supplier_email
        ];
    }else{
        $data = [
            'supplier_name' => $supplier_name,
            'contact_person' => $supplier_contact_person,
            'phone' => $supplier_phone
        ];
    }   

    $query0 = " SELECT * FROM suppliers WHERE supplier_name = ? AND contact_person = ? AND phone = ? AND id <> ?";

    $stmt = $conn->prepare($query0);
    $stmt->bind_param("ssss",$supplier_name, $supplier_contact_person, $supplier_phone, $id);
    $stmt->execute();
    $result = $stmt->get_result();



    if(mysqli_num_rows($result) > 0){

        $message = $message_array[0];
    }
    else if(strlen($supplier_phone) <> 11 OR !is_numeric($supplier_phone)){
        $message = $message_array[1];
    }
    else if($supplier_contact_person == "" || $supplier_name == "" || $supplier_phone == ""){
        $message = $message_array[4];
    }
    else if($supplier_email == 'false'){
        $message = $message_array[2];
    }
    else{

        update_query('suppliers', $id, $data);

        $message = $message_array[3];
        
        $reload = true;

        $stmt->close(0);
    }

    echo json_encode([$reload, $message]);

    $conn->close();
?>
