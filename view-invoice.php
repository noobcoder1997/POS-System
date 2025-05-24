<?php 
    include 'includes/header.php';
    
    if( !isset($_SESSION['product']) || empty($_SESSION['product'])){

        $_SESSION['alert-message'] = "Please select a product first!";
        echo "<script>window.location.href='order.php'</script>";
    }
?>
    <body class="sb-nav-fixed" onload="$('#billingModal').modal('show');">    
        
        <div class="d-flex justify-content-center">
            <div class="loader text-center" style="position:fixed;top: 45%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
            </div>
        </div>
        <?php 
            include 'includes/navbar.php';
        ?>      
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Invoice</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                        <div class="card mb-4 shadow">
                            <div class=" card-header">
                                <div class="col-sm-12">
                                   <div class="float-start">
                                        <i class="fas fa-server me-1"></i>
                                        <strong>Invoice</strong>
                                    </div>
                                    <div class="float-end">
                                        <button class="btn btn-primary badge" onclick="window.location.href='order.php'"><span class="fas fa-undo fa-fw"></span> Back to order</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                
                                <div class="row mb-3 text-center">
                                        <h2 class="mx-auto"><?php echo $_SESSION['store_name']; ?></h2>
                                        <p class="m-0"><?php echo $_SESSION['street']; ?></p>
                                        <p class="m-0"><?php echo $_SESSION['company']; ?></p>
                                </div>

                                <?php 
                                    if(isset($_SESSION['product'])):
                                        $contact_no = validate(base64_decode(urldecode($_GET['id'])));
                                        $invoice = validate(base64_decode(urldecode($_GET['inv_no'])));
                                        $mode = validate(base64_decode(urldecode($_GET['mode'])));
                                ?>
                                
                                <table id="_datatablesCategories" width="100%">
                                    <tr>
                                        <td>
                                            <?php 
                                                $walkin='walk-in';
                                                $qc = $conn->prepare("SELECT * FROM customers WHERE contact = ? LIMIT 1 ");
                                                $qc->bind_param('s',$contact_no);
                                                $qc->execute();
                                                $result=$qc->get_result();
                                                
                                                $count = $result->num_rows;
                                                if($count > 0){
                                                    if($row = $result->fetch_assoc()){
                                                    ?>
                                                        <h5 class="m-0">Customer's Details</h5>
                                                        <p class="m-0">Customer's Name: <?php echo $row['name']; ?></p>
                                                        <p class="m-0">Customer's Contact #: <?php echo $row['contact']; ?></p>
                                                        <p class="m-0">Customer's email: <?php echo $row['email']; ?></p>

                                                    <?php
                                                    }
                                                }
                                                else{
                                                ?>
                                                    <h5 class="m-0">Customer's Details</h5>
                                                    <p class="m-0">Customer's Name: <?php echo $walkin; ?></p>
                                                    <p class="m-0">Customer's Contact #: </p>
                                                    <p class="m-0">Customer's email:</p>
                                                    <p class="m-0">Payment mode:
                                                        <?php 
                                                          echo ($mode == 0) ? "Cash" : "Checque";
                                                        ?>    
                                                    </p>
                                                <?php
                                                }

                                            ?>
                                        </td>
                                        <td class="float-end">
                                            <h5 class="m-0">Invoice's Details</h5>
                                            <p class="m-0">Invoice #: <?php echo $invoice ?></p>
                                            <p class="m-0">Date: <?php echo date('M d, Y ', strtotime(date('Y-m-d'))); ?></p>
                                            <p class="m-0"><?php echo $_SESSION['street']; ?></p>
                                        </td>
                                    </tr>
                                </table>
                                <table width="100%" class="table">
                                    <tr>
                                        <th>QTY</th>
                                        <th width="60%">Product</th>
                                        <th>Price</th>
                                        <th>Total Price</th>
                                    </tr>
                                    <?php 
                                        $i=1;
                                        $grand_total = 0;

                                        foreach($_SESSION['product'] as $key => $value): 
                                            $total = number_format(($value['quantity']*$value['price']), 2);                                    
                                            $grand_total += ($value['quantity']*$value['price']);                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $value['quantity']; ?></td>
                                        <td ><?php echo $value['product_name']; ?></td>
                                        <td><?php echo $value['quantity']; ?></td>
                                        <td><?php echo $total; ?></td>
                                    </tr>
                                    <?php 
                                        endforeach;                                      
                                    ?>
                                    <tr>
                                        <th></th>
                                        <th width="60%"></th>
                                        <th>Grand Total:</th>
                                        <th><?php echo number_format($grand_total, 2); ?></th>
                                    </tr>
                                </table>
                                <?php 
                                    endif;  
                                ?>

                                <?php 
                                ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mt-3">
                                            <button class="btn btn-primary float-end save-billing">
                                                <span class="fa fa-save"></span>
                                                 Save Billing
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php 
    include 'includes/footer.php'; 
?>