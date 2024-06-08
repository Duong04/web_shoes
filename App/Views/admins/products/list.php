<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Products</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <a href="./?role=admin&page=add-product" class="btn btn-success">Add Product</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Discount</th>
                            <th>Initial Price</th>
                            <th>New Price</th>
                            <th>Is Active</th>
                            <th>Category Name</th>
                            <th>View</th>
                            <th>Quantity</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Stt</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Discount</th>
                            <th>Initial Price</th>
                            <th>New Price</th>
                            <th>Is Active</th>
                            <th>Category Name</th>
                            <th>View</th>
                            <th>Quantity</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; foreach ($products as $item) { $i++; ?>
                        <tr data-id="<?=$item['product_id']?>">
                            <td><?=$i?></td>
                            <td><?=$item['product_name']?></td>
                            <td><img width="50px" src="<?=$item['product_image']?>" alt=""></td>
                            <td><?=$item['discount'].'%'?></td>
                            <td><?='$'.round($item['initial_price']).'.00'?></td>
                            <td><?='$'. round($item['new_price']). '.00'?></td>
                            <td><?=$item['is_active']?></td>
                            <td><?=$item['category_name']?></td>
                            <td><?=$item['view']?></td>
                            <td><?=$item['quantity_product'] == 0 ? 'Sold Out' : $item['quantity_product']?></td>
                            <td><?=$item['user_name']?></td>
                            <td>
                                <a href="./?role=admin&page=edit-product&product_id=<?=$item['product_id']?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button data-href="./?role=admin&page=delete-product&product_id=<?=$item['product_id']?>" id="<?=$item['product_id']?>" class="btn btn-danger delete"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>