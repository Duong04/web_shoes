<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Library Images</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>hi💖</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Stt</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; foreach ($products as $item) { $i++; ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$item['product_name']?></td>
                            <td><?=$item['category_name']?></td>
                            <td><?=$item['user_name']?></td>
                            <td>
                                <a href="./?role=admin&page=list-images&product_id=<?=$item['product_id']?>" class="text-decoration-none badge bg-primary">View Detail</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>