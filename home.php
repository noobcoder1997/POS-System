<?php 
    include 'includes/header.php';
?>
    <body class="sb-nav-fixed">
        <div class="d-flex justify-content-center">
            <div class="loader text-center" style="position:absolute;top: 45%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
            </div>
        </div>
        <?php 
            include 'includes/navbar.php';
        ?>
            <div id="layoutSidenav_content">
                <main>
                    <?php
                    ?>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <!-- <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <h6>Ins</h6>
                                        <h3>
                                            <?php 
                                                $sql = "SELECT SUM(quantity) AS qty FROM transactions WHERE product_return = 0 AND type = 0 AND status = '' ";
                                                $stmt=$conn->prepare($sql);
                                                $stmt->execute();
                                                $result=$stmt->get_result();
                                                $res = $result->fetch_assoc();
                                                echo intval($res['qty']);
                                            ?>
                                        </h3>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./inventory-in.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <h6>Outs</h6>
                                        <h3>
                                            <?php 
                                                $sql = "SELECT SUM(quantity) AS qty FROM transactions WHERE product_return = 0 AND type = 1 AND status <> '' ";
                                                $stmt=$conn->prepare($sql);
                                                $stmt->execute();
                                                $result=$stmt->get_result();
                                                while($res = $result->fetch_assoc()){

                                                   echo $res['qty']; 
                                                }
                                            ?>
                                        </h3>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./inventory-out.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <h6>Sales</h6>
                                        <h3>
                                            <?php 
                                                $total_price=0;
                                                $total_qty=0;
                                                $sales_qry = "SELECT o.*, t.*, SUM(product_qty) AS qty FROM transactions t, order_items o WHERE o.product_qty = t.quantity AND o.product_id = t.product_id AND t.status = 0 AND t.type = 1 GROUP BY t.product_id, t.date";
                                                $stmt = $conn->prepare($sales_qry);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                
                                                while($row=$result->fetch_assoc()){
                                                    
                                                    $total_qty += $row['qty'];
                                                    $total_price += $row['product_price'];
                                                }          
                                                echo number_format(($total_qty* $total_price), 2);                                 
                                            ?>
                                        </h3>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./sales.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-default text-dark mb-4">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <h6>Products</h6>
                                        <h3>
                                            <?php 
                                                $sql = "SELECT COUNT(id) AS stocks FROM products";
                                                $stmt=$conn->prepare($sql);
                                                $stmt->execute();
                                                $result=$stmt->get_result();
                                                $res = $result->fetch_assoc();
                                                echo $res['stocks'];
                                            ?>
                                        </h3>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-dark stretched-link" href="./product.php">View Details</a>
                                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <h6>Stocks</h6>
                                        <h3>
                                            <?php 
                                                $sql = "SELECT SUM(quantity_in_stock) AS stocks FROM product_batches";
                                                $stmt=$conn->prepare($sql);
                                                $stmt->execute();
                                                $result=$stmt->get_result();
                                                $res = $result->fetch_assoc();
                                                echo $res['stocks'];
                                            ?>
                                        </h3>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./product.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> 
                            <!-- <div class="col-xl-4 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <h6>Profit</h6>
                                        <h3>
                                            <?php 
                                                // $sql = "SELECT SUM(quantity_in_stock) AS stocks FROM product_batches";
                                                // $stmt=$conn->prepare($sql);
                                                // $stmt->execute();
                                                // $result=$stmt->get_result();
                                                // $res = $result->fetch_assoc();
                                                // echo $res['stocks'];
                                            ?>
                                        </h3>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        <div class="small text-white"><i class="fas fa-download"></i></div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1 "></i>
                                        Sales
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Stocks
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Suppliers
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php 
    include 'includes/footer.php';  
    require 'includes/charts.php';
?>