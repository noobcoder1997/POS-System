<?php 
    include '../../config/functions.php';

    $product_id =  validate($_POST['product-id']);       
    $product_qty =  validate($_POST['quantity']);    
    $message="";

    if(!isset($_SESSION['ids'])){
        $_SESSION['ids'] = [];         
    }

    if(!isset($_SESSION['product'])){
        $_SESSION['product'] = [];
    }

    $query = "SELECT p.*, b.* FROM products p, product_batches b WHERE p.id = ? AND p.id = b.product_id AND p.supplier_id = b.supplier_id LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $_POST['product-id']);
    $stmt->execute();
    $result=$stmt->get_result();

    if($result){
        $count = $result->num_rows;
        if($count > 0){

            $result = $result->fetch_assoc();

            if($result['quantity_in_stock'] < $product_qty){

                $message = "Only ".$result['quantity_in_stock']." quantity is available!";
                
                redirect_to('../../order.php', $message);
            }
            else{
                $product=[
                    'id'=> $result['id'],
                    'product_name'=> $result['product_name'],
                    'quantity'=> $product_qty,
                    'price'=> $result['price'],
                    'barcode'=> $result['barcode'],
                    'image'=> $result['image'] 
                ]; 
                
                if(!in_array($result['id'], $_SESSION['ids'])){
                    array_push($_SESSION['ids'], $product['id']);
                    array_push($_SESSION['product'], $product);
                }
                else{
                    foreach($_SESSION['product'] as $key => $item):
                        if($item['id'] == $result['id']){

                            if($result['quantity_in_stock'] > $product_qty){
                                
                                $new_product_qty = $item['quantity'] + $product_qty;

                                $product=[
                                    'id'=> $result['id'],
                                    'product_name'=> $result['product_name'],
                                    'quantity'=> $new_product_qty,
                                    'price'=> $result['price'],
                                    'barcode'=> $result['barcode'],
                                    'image'=> $result['image'] 
                                ]; 
                                
                                $_SESSION['product'][$key] = $product;
                            }   
                            else{
                                
                                $message = "Only ".$result['quantity_in_stock']." quantity is available!"; 
                                redirect_to('../../order.php', $message);
                            }
                        } 

                    endforeach;
                }
                
                redirect_to('../../order.php', $message);
            }
        }
        else{
            $message = "No data found!";
            redirect_to('../../order.php', $message);
        }
    }
    else{
        $message = "Something went wrong!";
        redirect_to('../../order.php', $message);
    }
?>