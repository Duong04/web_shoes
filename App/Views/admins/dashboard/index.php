<div id="content">

    <!-- Topbar -->

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <h3 class="text-gray-800"><i class="fa-solid fa-square-poll-vertical"></i> Revenue</h3>
        <div class="grid-statistical pb-5">
            <div class="grid-statistical-item">
                <div class="icon"><i class="fa-solid fa-coins"></i></div>
                <h6>Order Today</h6>
                <div class="price"><?='$'.round(intval($orderToday['totalAmount'])).'.00'?></div>
            </div>
            <div class="grid-statistical-item">
            <div class="icon"><i class="fa-solid fa-coins"></i></div>
                <h6>Yesterday's order</h6>
                <div class="price"><?='$'.round(intval($orderYesterday['totalAmount'])).'.00'?></div>
            </div>
            <div class="grid-statistical-item">
                <div class="icon"><i class="fa-solid fa-cart-plus"></i></div>
                <h6>Order this month</h6>
                <div class="price"><?='$'.round(intval($monthlyOrder['totalAmount'])).'.00'?></div>
            </div>
            <div class="grid-statistical-item">
                <div class="icon"><i class="fa-solid fa-cart-plus"></i></div>
                <h6>Last month's orders</h6>
                <div class="price"><?='$'.round(intval($lastMonthOrder['totalAmount'])).'.00'?></div>
            </div>
            <div class="grid-statistical-item">
                <div class="icon"><i class="fa-solid fa-cubes"></i></div>
                <h6>All orders</h6>
                <div class="price"><?='$'.round(intval($allOrder['totalAmount'])).'.00'?></div>
            </div>
        </div>
        <div class="statistical-order">
            <div class="statiscal-order-item">
                <div class="icon-order orange"><i class="fa-solid fa-cart-plus"></i></div>
                <div class="quantity-order">
                    <span>Total order</span>
                    <strong style="font-size:1.2rem;"><?=$totalOrder['totalOrders']?></strong>
                </div>
            </div>
            <div class="statiscal-order-item">
                <div class="icon-order blue"><i class="fa-solid fa-arrows-rotate"></i></div>
                <div class="quantity-order">
                    <span>Pending Orders</span>
                    <strong style="font-size:1.2rem;"><?=$pending['totalOrders']?></strong>
                </div>
            </div>
            <div class="statiscal-order-item">
                <div class="icon-order green-2"><i class="fa-solid fa-hourglass-start"></i></div>
                <div class="quantity-order">
                    <span>Processing Orders</span>
                    <strong style="font-size:1.2rem;"><?=$processing['totalOrders']?></strong>
                </div>
            </div>
            <div class="statiscal-order-item">
                <div class="icon-order green"><i class="fa-solid fa-truck"></i></div>
                <div class="quantity-order">
                    <span>Shipped Orders</span>
                    <strong style="font-size:1.2rem;"><?=$shipped['totalOrders']?></strong>
                </div>
            </div>
            <div class="statiscal-order-item">
                <div class="icon-order red"><i class="fa-solid fa-x"></i></div>
                <div class="quantity-order">
                    <span>Cancelled Orders</span>
                    <strong style="font-size:1.2rem;"><?=$cancelled['totalOrders']?></strong>
                </div>
            </div>
            <div class="statiscal-order-item">
                <div class="icon-order green-2"><i class="fa-solid fa-check"></i></div>
                <div class="quantity-order">
                    <span>Delivered Orders</span>
                    <strong style="font-size:1.2rem;"><?=$delivered['totalOrders']?></strong>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row mt-5">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Direct
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Social
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Referral
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
    <!-- Page level plugins -->
<script src="./public/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="./public/js/demo/chart-area-demo.js"></script>
<script src="./public/js/demo/chart-pie-demo.js"></script>