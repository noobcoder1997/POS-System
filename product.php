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
                        <h1 class="mt-4">Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                        <div class="card mb-4 shadow">
                            <div class=" card-header">
                                <div class="col-sm-12">
                                   <div class="float-start">
                                        <i class="fas fa-server me-1"></i>
                                        <strong>Products</strong>
                                    </div>
                                    <a type="button" class="btn btn-primary badge float-end" data-bs-toggle="modal" data-bs-target="#addProduct">
                                        <span class="fa fa-plus fa-fw"></span>
                                        Add Product
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesProducts">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Image</th>
                                            <th>Supplier</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <!-- <th>Salary</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $no='1';
                                            $query = "SELECT c.id AS category_id, c.category_name AS category_name, p.*, p.id AS product_id, b.*, b.id AS batch_id, s.*, s.supplier_name AS supplier_name, s.id AS supplier_id FROM products p, product_batches b, suppliers s, categories c WHERE p.id = b.product_id AND p.supplier_id = b.supplier_id AND s.id = p.supplier_id AND s.id = b.supplier_id";
                                            $stmt = $conn->prepare($query);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $count = $result->num_rows;
                                            if($count > 0){
                                                while($product = $result->fetch_assoc()){
                                                    
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $product['product_name']; ?></td>
                                                        <!-- <td>
                                                            <?php
                                                                if($product['status'] == 0){
                                                                    ?>
                                                                        <span class="badge btn-primary">Visible</span>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                        <span class="badge btn-primary">Invisible</span>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </td> -->
                                                        <td>
                                                            <img src="<?php echo $product['image']; ?>" alt="image" style="width:40px; height:40px; border-radius:50%">
                                                        </td>
                                                        <td><?php echo $product['supplier_name']; ?></td>
                                                        <td>
                                                            <a class="btn btn-secondary badge" data-bs-target="#restockProduct<?php echo $product['batch_id']; ?>" data-bs-toggle="modal">
                                                                <span class="fa fa-plus fa-fw"></span>
                                                                Re-stock
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-success badge" data-bs-target="#editProduct<?php echo $product['id']; ?>" data-bs-toggle="modal">
                                                                <span class="fa fa-edit fa-fw"></span>
                                                                Edit
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-danger badge" data-bs-target="#deleteProduct<?php echo $product['id']; ?>" data-bs-toggle="modal">
                                                                <span class="fa fa-trash fa-fw"></span>
                                                                Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php  
                                                    require 'modals/product-modals/edit-delete-product-modal.php';
                                                    include  'query/product-query/edit-delete-cbox-script.php';  
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <a type="button" class="btn btn-danger badge float-end" data-bs-toggle="modal" data-bs-target="#damageProduct">
                                    <span class="fa fa-plus fa-fw"></span>
                                    Damage Product
                                </a>
                            </div>
                        </div>
                    </div>
                </main>              
<?php 
    include 'includes/footer.php'; 
?>