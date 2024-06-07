<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Categories</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="./?role=admin&page=add-category" class="btn btn-success">Add Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Category Name</th>
                            <th>Author</th>
                            <th>Created At</th>
                            <th>Update At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Stt</th>
                            <th>Category Name</th>
                            <th>Author</th>
                            <th>Created At</th>
                            <th>Update At</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                        $i = 0;
                        foreach ($categories as $item){  
                            $i++;
                        ?>
                        <tr data-id="<?=$item['category_id']?>">
                            <th><?=$i?></th>
                            <td><?=$item['category_name']?></td>
                            <td><?=$item['user_name']?></td>
                            <td><?=$item['category_created_at']?></td>
                            <td><?=$item['category_updated_at']?></td>
                            <td>
                                <a href="./?role=admin&page=edit-category&category_id=<?=$item['category_id']?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button data-href="./?role=admin&page=delete-category&category_id=<?=$item['category_id']?>" id="<?=$item['category_id']?>" class="btn btn-danger delete"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>