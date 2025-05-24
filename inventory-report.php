<?php 
    include 'includes/header.php';
?>
    <body class="sb-nav-fixed">    
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
                        <h1 class="mt-4">Inventory</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Reports</li>
                        </ol>
                        <div class="card mb-4 shadow">
                            <div class=" card-header">
                                <div class="col-sm-12">
                                   <div class="float-start">
                                        <i class="fas fa-list me-1"></i>
                                        <strong>Reports</strong>
                                    </div>
                                    <div class="float-end">
                                        <!-- <a type="button" class="btn btn-primary badge float-end ms-2" data-bs-toggle="modal" data-bs-target="#add-item-modal">
                                            <span class="fa fa-download fa-fw"></span>
                                            Add Item
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <table id="datatablesIncomingInventory">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Image</th>
                                                <th></th>
                                                <!-- <th></th>
                                                <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                $query = "SELECT i.*, p.product_name,p.image FROM transactions i, products p WHERE p.id = i.product_id ";
                                                $stocks = $conn->prepare($query);
                                                $stocks->execute();
                                                $stocks = $stocks->get_result();    
                                                if(mysqli_num_rows($stocks) > 0){
                                                    foreach($stocks as $stock):
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $stock['date']; ?></td>
                                                        <td><?php echo $stock['product_name']; ?></td>
                                                        <td><?php echo $stock['quantity']; ?></td>
                                                        <td>
                                                            <img src="<?php echo $stock['image']; ?>" alt="image" style="width:40px; height:40px; border-radius:50%">
                                                        </td>
                                                        <td>
                                                            <a type="button" class="btn btn-primary badge" data-bs-toggle="modal" data-bs-target="#view-item-modal<?php echo $stock['id']; ?>">
                                                                <span class="fa fa-eye fa-fw"></span>
                                                                View
                                                            </a>
                                                        </td>
                                                        <!-- <td>
                                                            <a type="button" class="btn btn-success badge" data-bs-toggle="modal" data-bs-target="#">
                                                                <span class="fa fa-edit fa-fw"></span>
                                                                Edit
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a type="button" class="btn btn-danger badge" data-bs-toggle="modal" data-bs-target="#">
                                                                <span class="fa fa-trash fa-fw"></span>
                                                                Delete
                                                            </a>
                                                        </td> -->
                                                
                                                    <?php
                                                    // require 'modals/product-modals/edit-delete-product-modal.php';
                                                    require 'modals/transaction-modals/view-transaction-modal.php';
                                                    // require  'query/product-query/edit-delete-cbox-script.php';
                                                    endforeach;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="report/pdfs/total-stock-report-pdf.php" type="button" class="btn btn-primary badge float-end ms-2">
                                    <span class="fa fa-download fa-fw"></span>
                                    PDF
                                </a>
                                <a href="report/xlsx/total-stock-report-xlsx.php" type="button" class="btn btn-danger badge float-end ms-2">
                                    <span class="fa fa-download fa-fw"></span>
                                    XLSX
                                </a>
                                <a href="report/emails/total-stock-report-email.php?email=<?php echo base64_encode($_SESSION['user_details']['email']); ?>" type="button" class="btn btn-success badge float-end">
                                    <span class="fa fa-envelope fa-fw"></span>
                                    Email
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
<?php 
    include 'includes/footer.php'; 
?>