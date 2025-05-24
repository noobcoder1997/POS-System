<?php
    include '../../config/functions.php';

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $contact = validate($_POST['contact']);
    $message = '';
    $reload= false;

    $message_array = [
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Empty fields should not leave empty!
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> This Customer already exist!
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> This Customer Contact number is invalid!
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> This Customer Email Address is invalid!
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Registration Successful:</strong> New Customer have been registered successfully!
        </div'
    ];

    $data = [
        'name'=> $name,
        'contact'=>$contact,
        'email'=>$email
    ];

    $query = "select * from customers where name = ? and email = ? and contact = ? ";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $name, $email,  $contact);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) > 0){

        $message = $message_array[1];
    }
    else if($name == null || $contact == null){

        $message = $message_array[0];
    }
    else if($email == 'false'){

        $message = $message_array[3];
    }
    else if(!is_numeric($contact) || strlen($contact) != 11){

        $message = $message_array[2];
    }
    else{

        insert_query('customers', $data);

        $message = $message_array[4];

        $reload = true;

        $stmt->close();
    }

    echo json_encode([$reload, $message]);
    
    $conn->close();
?>