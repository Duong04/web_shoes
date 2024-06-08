<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Images</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="./?role=admin&page=add-image&product_id=<?=$_GET['product_id']?>" class="btn btn-success">Add Image</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Stt</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; foreach ($images as $item) { $i++; ?>
                        <tr data-id="<?=$item['image_id']?>">
                            <td><?=$i?></td>
                            <td><img src="<?=$item['image_path']?>" width="60px" alt=""></td>
                            <td><?=$item['product_name']?></td>
                            <td>
                                <a href="./?role=admin&page=edit-image&image_id=<?=$item['image_id']?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button data-href="./?role=admin&page=delete-image&image_id=<?=$item['image_id']?>" id="<?=$item['image_id']?>" class="btn btn-danger delete"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>