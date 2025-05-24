<?php
    include '../../config/functions.php';

    $id = validate($_GET['id']);

    if(!is_numeric($id)){

        redirect_to('../../order.php', 'Parameter id is not numeric!');
    }
    else{

        $id = validate($id);

        if(isset($_SESSION['product']) && isset($_SESSION['ids'])){

            unset($_SESSION['product'][$id]);
            unset($_SESSION['ids'][$id]);   

            redirect_to('../../order.php', 'Item was removed!');

        }
        else{

            redirect_to('../../order.php', 'There are no item!');

        }        
    }

?>