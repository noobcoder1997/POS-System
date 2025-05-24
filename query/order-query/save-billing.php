<?php
    include '../../config/functions.php';

    $contact = validate($_POST['contact']);
    $invoice = validate($_POST['inv_no']);
    $mode = validate($_POST['mode']);

    if(isset($_POST['save-billing'])){

        if(isset($_SESSION['product'])){

            $sessionProducts = $_SESSION['product'];
    
            $total=0;
    
            foreach($sessionProducts as $product => $value){
    
                $total += $value['quantity']*$value['price'];
    
            }

            // Walk-in customer
            if($contact == ""){     
                $data = [
                    'customer_id'=> -1,
                    'track_no'=> rand(0000001, 1000000),
                    'total'=> $total,
                    'order_date'=> date('Y-m-d'),
                    'order_status'=> 'booked',
                    'inv_no'=> $invoice,
                    'mode'=> $mode,
                ];

                insert_query('orders', $data);

                $last_order_id = $conn->insert_id;

                foreach($sessionProducts as $product => $value){

                    $product_id = $value['id'];
                    $product_qty = $value['quantity'];
                    $product_price = $value['price'];

                    $itemData = [
                        'order_id'=>$last_order_id,
                        'product_id'=>$product_id,
                        'product_qty'=>$product_qty,
                        'product_price'=>$product_price,
                    ];

                    insert_query('order_items', $itemData);

                    $check_product_qty_query = $conn->prepare("SELECT * FROM product_batches WHERE id = ? ");
                    $check_product_qty_query->bind_param('s', $product_id);
                    $check_product_qty_query->execute();
                    $result = $check_product_qty_query->get_result();
                    $row=$result->fetch_assoc();

                    $total_qty = $row['quantity_in_stock']-$product_qty;

                    $qty_update = [
                        'quantity_in_stock' =>$total_qty
                    ];
                    
                    update_query('product_batches', $product_id, $qty_update);

                    // insert to transactions table
                    $data = [
                        'product_id'=>$product_id,
                        'quantity'=>$product_qty,
                        'status'=>0,//sold
                        'type'=>1//out
                    ];

                    insert_query('transactions', $data);
                }
            }
            else{
                $cq=$conn->prepare("SELECT * FROM customers WHERE contact = ? ");
                $cq->bind_param('s', $contact);
                $cq->execute();
                $result=$conn->get_result();
                $count=$result->num_rows;
                if($count>0){
                    while($row=$result->fetch_assoc()){
                        $data = [
                            'customer_id'=> $row['id'],
                            'track_no'=> rand(0000001, 1000000),
                            'total'=> $total,
                            'order_date'=> date('Y-m-d'),
                            'order_status'=> 'booked',
                            'inv_no'=> $invoice,
                            'mode'=> $mode,
                        ];
                    }

                    insert_query('orders', $data);

                    $last_order_id = $conn->insert_id;

                    foreach($sessionProducts as $product => $value){

                        $product_id = $value['id'];
                        $product_qty = $value['quantity'];
                        $product_price = $value['price'];

                        $itemData = [
                            'order_id'=>$last_order_id,
                            'product_id'=>$product_id,
                            'product_qty'=>$product_qty,
                            'product_price'=>$product_price,
                        ];

                        insert_query('order_items', $itemData);

                        $check_product_qty_query = $conn->prepare($conn, "SELECT * FROM product_batches WHERE id = ? ");
                        $check_product_qty_query->bind_param('s', $product_id);
                        $check_product_qty_query->execute();
                        $result = $check_product_qty_query->get_result();
                        $row=$result->fetch_assoc();

                        $total_qty = $row['quantity_in_stock']-$product_qty;

                        $qty_update = [
                            'quantity_in_stock' =>$total_qty
                        ];
                        
                        update_query('product_batches', $product_id, $qty_update);
                        
                        // insert to transactions table
                        $data = [
                            'product_id'=>$product_id,
                            'quantity'=>$product_qty,
                            'status'=>0,//sold
                            'type'=>1//out
                        ];
                        
                        insert_query('transactions', $data);
                    }
                }
                else{
                    echo 'No customer found!';
                }
            }
            // unset($_SESSION['product']);
            // unset($_SESSION['ids']);
        }    
    }
?>