<?php
    include '../../config/functions.php';

    $message="";
    $i=0;
    $opt=[];
    $item=[];
    $searchedProduct = validate($_POST['search']);

    $products = selectAll('products');

    if(!$products){

        $message = "Something went wrong!";

    }
    else{
        if(!empty($searchedProduct) || $searchedProduct == ''){

            foreach($products as $product):

                $item[$i]=$product['product_name'];

                if($searchedProduct === $item[$i]){
                    
                    $opt[$i] = '<option value="'.$product["id"].'" selected>'.$product["product_name"].'</option>';

                }
                else{

                    $opt[$i] = '<option value="'.$product["id"].'">'.$product["product_name"].'</option>';

                } 

                $i++;                
                
            endforeach;                      
        }
        else{

            foreach($products as $product):

                array_push($opt, '<option value="'.$product["id"].'">'.$product["product_name"].'</option>');

            endforeach;   
        }
    }

    echo json_encode([$opt, $message, $item]);
?>
