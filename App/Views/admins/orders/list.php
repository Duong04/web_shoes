<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Orders</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>User Name</th>
                            <th>Number Phone</th>
                            <th>Shipping Money</th>
                            <th>Subtotal</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Stt</th>
                            <th>User Name</th>
                            <th>Number Phone</th>
                            <th>Shipping Money</th>
                            <th>Subtotal</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; foreach ($orders as $item) { $i++; ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$item['user_name']?></td>
                            <td><?=$item['number_phone']?></td>
                            <td><?='$'.$item['shipping_money'].'.00'?></td>
                            <td><?='$'.round($item['total_amount']).'.00'?></td>
                            <td><?='$'. round($item['amount']). '.00'?></td>
                            <td><?=$item['order_status']?></td>
                            <td><?=$item['payment_method']?></td>
                            <td>
                                <a href="./?role=admin&page=order-detail&id=<?=$item['order_id']?>" class="text-decoration-none text-success">View Detail</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>