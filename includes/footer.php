                <footer class="py-4 bg-light mt-auto" style="box-shadow: 0 0 15px 0;">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <img src="assets/img/noobcoder.jpg" style="width: 30px; height:20px;">noobcoder.online</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script> -->
       
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" ></script>
        <script src="./assets/js/datatables-simple-demo.js"></script>
       
        <!-- <script src="https://cdn.jsdelivr.net/npm/@ericblade/quagga2/dist/quagga.min.js"></script> -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

        <!-- <script src="./assets/demo/chart-area-demo.js"></script>
        <script src="./assets/demo/chart-bar-demo.js"></script> -->

        <script src="./assets/js/scripts.js"></script>

        <script src="./assets/js/script.js"></script>
        <script src="./assets/js/custom_functions.js"></script>

       <?php
            require 'modals/category-modals/add-category-modal.php';

            require 'modals/product-modals/add-product-modal.php';
            require 'modals/product-modals/add-damage-product-modal.php';

            require 'modals/admin-modals/add-admin-modal.php';

            require 'modals/customers-modals/add-customer-modal.php';

            require 'modals/supplier-modals/add-supplier-modal.php';

            require 'modals/reports-modals/pdfs/in-inventory-modal.php';
            require 'modals/reports-modals/emails/in-inventory-modal.php';
            require 'modals/reports-modals/xlsx/in-inventory-modal.php';

            require 'modals/reports-modals/pdfs/out-inventory-modal.php';
            require 'modals/reports-modals/emails/out-inventory-modal.php';
            require 'modals/reports-modals/xlsx/out-inventory-modal.php';

            require 'modals/reports-modals/pdfs/sales-report-modal.php';
            require 'modals/reports-modals/emails/sales-report-modal.php';
            require 'modals/reports-modals/xlsx/sales-report-modal.php';

            require 'modals/order-modals/warning-modal.php';
            require 'modals/order-modals/add-customer-modal.php';
            require 'modals/order-modals/order-placed-modal.php';
            require 'modals/order-modals/billing-modal.php';
            
            require 'query/category-query/add-cbox-scripts.php';

            require 'query/product-query/add-cbox-script.php';
            
            require 'script.php';
        ?> 
    </body>
</html>
