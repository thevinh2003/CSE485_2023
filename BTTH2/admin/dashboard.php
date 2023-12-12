<?php
require '../components/Header.php';
?>
<div class="container-fluid overflow-x-hidden">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">DASHBOARD</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li>
                                <a href="#" class="btnDashboard nav-link px-0"> <span class="d-none d-sm-inline">User</span></a>
                            </li>
                            <li class="w-100">
                                <a href="#" class="btnDashboard nav-link px-0"> <span class="d-none d-sm-inline">Post</span></a>
                            </li>
                            <li>
                                <a href="#" class="btnDashboard nav-link px-0"> <span class="d-none d-sm-inline">Category</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div id="dashboardContent" class="col py-2">
            <h3 class="text-center my-3">THỐNG KÊ</h3>
            <div class="d-flex gap-3">
                <div style="background-color: rgba(255, 99, 132, .9)" class="text-center text-white fw-bolder col-md-4 p-5">
                    <?php
                    include 'handle/Dashboard/handleDashboad.php';
                    echo $totalUser[0][0];
                    ?> Users
                    <span hidden class="quantityUser"><?php
                                                        include 'handle/Dashboard/handleDashboad.php';
                                                        echo $totalUser[0][0];
                                                        ?></span>
                </div>
                <div style="background-color: rgba(54, 162, 235, .9)" class=" text-center text-white fw-bolder col-md-4 p-5">
                    <?php
                    include 'handle/Dashboard/handleDashboad.php';
                    echo $totalPost[0][0];
                    ?> Posts
                    <span hidden class="quantityPost"><?php
                                                        include 'handle/Dashboard/handleDashboad.php';
                                                        echo $totalPost[0][0];
                                                        ?></span>
                </div>
                <div style="background-color: rgba(255, 205, 86, .9)" class=" text-center text-white fw-bolder col-md-4 p-5">
                    <?php
                    include 'handle/Dashboard/handleDashboad.php';
                    echo $totalCategory[0][0];
                    ?> Categories
                    <span hidden class="quantityCategory"><?php
                                                        include 'handle/Dashboard/handleDashboad.php';
                                                        echo $totalCategory[0][0];
                                                        ?></span>
                </div>
            </div>
            <div class="my-3">
                <canvas width="400" height="400" id="pie-chart"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="js/dashboard.js"></script>
<?php
require '../components/Footer.php';
?>