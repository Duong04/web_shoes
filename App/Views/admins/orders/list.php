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
                            <th>Shipping Money</th>
                            <th>Subtotal</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>Action</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Stt</th>
                            <th>User Name</th>
                            <th>Shipping Money</th>
                            <th>Subtotal</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>Action</th>
                            <th>#</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; foreach ($orders as $item) { $i++; ?>
                        <tr data-id="<?=$item['order_id']?>">
                            <td><?=$i?></td>
                            <td><?=$item['user_name']?></td>
                            <td><?=$item['shipping_money'] > 0 ? '$'.$item['shipping_money'].'.00' : 'Free Ship'?></td>
                            <td><?='$'.round($item['total_amount']).'.00'?></td>
                            <td><?='$'. round($item['amount']). '.00'?></td>
                            <td class="status"><?=$item['order_status']?></td>
                            <td><?=$item['payment_method']?></td>
                            <td>
                                <button data-order-id="<?=$item['order_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="pending" class="btn btn-primary update-order"><i class="fa-solid fa-hourglass-start"></i></button>
                                <button data-order-id="<?=$item['order_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="processing" class="btn btn-warning update-order"><i class="fa-regular fa-hourglass-half"></i></button>
                                <button data-order-id="<?=$item['order_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="shipped" class="btn btn-info update-order"><i class="fa-solid fa-truck-fast"></i></button>
                                <button data-order-id="<?=$item['order_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="delivered" class="btn btn-success update-order"><i class="fa-solid fa-check"></i></button>
                                <button data-order-id="<?=$item['order_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="cancelled" class="btn btn-danger update-order"><i class="fa-solid fa-xmark"></i></button>
                            </td>
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