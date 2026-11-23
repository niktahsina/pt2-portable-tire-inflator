<?php require_once 'header.php'; ?>

<?php require_once 'sidebar.php'; ?>

            <div class="col bg-light min-vh-100 d-flex flex-column">
                <!-- Mobile Header with Burger -->
                <div id="myBurger" class="p-3 d-lg-none text-white bg-dark shadow-sm">
                    <div class="row align-items-center">
                        <div class="col">
                            <a href="#" class="text-white text-decoration-none d-flex align-items-center" data-bs-toggle="offcanvas" data-bs-target="#mySidebar">
                                <i class="bi bi-list fs-3"></i>
                                <h5 class="ms-3 mb-0 d-inline fw-bold text-warning">
                                    <i class="bi bi-tools me-1"></i>Tire Inflator Admin
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Visual Brand Header / Banner Accent -->
                <div class="bg-white border-bottom shadow-sm px-4 py-3 d-none d-lg-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3 text-primary">
                            <i class="bi bi-tools fs-4"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold text-dark">Portable Tire Inflator Management System</h6>
                            <small class="text-muted">Admin Control & Inventory Dashboard</small>
                        </div>
                    </div>
                    <div>
                        <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill">
                            <i class="bi bi-circle-fill fs-6 me-1 text-success" style="font-size: 0.5rem !important;"></i> System Online
                        </span>
                    </div>
                </div>
                 
                <!-- Main Content Area -->
                <div class="p-4 flex-grow-1">
                    <?= $content ?? '' ?>
                </div>

            </div>

<?php require_once 'footer.php'; ?>