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
                        <h1 class="mt-4">Sales</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Sales</li>
                        </ol>
                        <div class="card mb-4 shadow">
                            <div class=" card-header">
                                <div class="col-sm-12">
                                   <div class="float-start">
                                        <i class="fas fa-dollar me-1"></i>
                                        <strong>Sales</strong>
                                    </div>
                                    <!-- <a type="button" class="btn btn-primary badge float-end" data-bs-toggle="modal" data-bs-target="#addProduct">
                                        <span class="fa fa-plus fa-fw"></span>
                                        Add Product
                                    </a> -->
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesProducts">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Image</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $no='1';
                                            $sql = "SELECT t.*, t.quantity AS transaction_qty, t.id AS transaction_id , p.*, b.*  FROM transactions t, products p, product_batches b WHERE (( t.product_id = b.product_id  AND b.product_id = p.id ) AND b.supplier_id = p.supplier_id ) AND t.type = 1 AND t.status = '0' ";
                                            $products = $conn->prepare($sql);
                                            $products->execute();
                                            $products = $products->get_result();
                                            if(mysqli_num_rows($products) > 0){
                                                
                                                foreach($products as $product):
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo date('F d, Y', strtotime($product['date'])); ?></td>
                                                    <td><?php echo $product['product_name']; ?></td>
                                                    <td><?php echo $product['transaction_qty']; ?></td>
                                                    <td>
                                                        <img src="<?php echo $product['image']; ?>" alt="image" style="width:40px; height:40px; border-radius:50%">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary badge" data-bs-target="#viewSales<?php echo $product['transaction_id']; ?>" data-bs-toggle="modal">
                                                            <span class="fa fa-eye fa-fw"></span>
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $no++;
                                                require 'modals/sales-modals/view-sales-modal.php';
                                                endforeach;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="#salesPDFModal" data-bs-toggle="modal" type="button" class="btn btn-primary badge float-end ms-2">
                                    <span class="fa fa-download fa-fw"></span>
                                    PDF
                                </a>
                                <a href="#salesXLSXModal" data-bs-toggle="modal" type="button" class="btn btn-danger badge float-end ms-2">
                                    <span class="fa fa-download fa-fw"></span>
                                    XLSX
                                </a>
                                <a href="#salesEMAILModal" data-bs-toggle="modal" type="button" class="btn btn-success badge float-end ms-2">
                                    <span class="fa fa-download fa-fw"></span>
                                    EMAIL
                                </a>
                            </div>
                        </div>
                    </div>
                </main>              
<?php 
    include 'includes/footer.php'; 
?>