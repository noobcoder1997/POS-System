            
        <div id="layoutSidenav" class="shadow">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <div class="sb-sidenav-menu-heading">Core</div>

                            <a class="nav-link" href="./home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt fa-fw"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="./order.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-coins fa-fw"></i></div>
                                Orders
                            </a>

                            <div class="sb-sidenav-menu-heading">Interface</div>

                            <a class="nav-link" href="./category.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-server fa-fw"></i></div>
                                Categories
                            </a>
                            <a class="nav-link" href="./product.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-coins fa-fw"></i></div>
                                Products
                            </a>
                            <a class="nav-link" href="./supplier.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-truck fa-fw"></i></div>
                                Suppliers
                            </a>
                            <a class="nav-link" href="./customer.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users fa-fw"></i></div>
                                Customers
                            </a>

                            <div class="sb-sidenav-menu-heading">TRACKER</div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-list fa-fw"></i></div>
                                Inventory
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="./inventory-in.php">Incoming list</a>
                                    <a class="nav-link" href="./inventory-out.php">Out-going list</a>
                                    <a class="nav-link" href="./inventory-report.php">Reports</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="./sales.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-dollar fa-fw"></i></div>
                                Sales
                            </a>
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                                Admins
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div> -->
                            <div class="sb-sidenav-menu-heading">Manage users</div>
                            <a class="nav-link" href="./admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                                Admins
                            </a>
                            <!-- <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <strong>
                            <?php echo strtoupper($_SESSION['user_details']['position']); ?>
                        </strong>                        
                    </div>
                </nav>
            </div>