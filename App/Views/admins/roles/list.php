<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Roles</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <a href="./?role=admin&page=create-role" class="btn btn-success">Create Role</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Role Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Stt</th>
                            <th>Role Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                        $i = 0;
                        foreach ($roles as $item) { 
                            $i++;
                        ?>
                        <tr data-id="<?=$item['role_id']?>">
                            <td><?=$i?></td>
                            <td><?=$item['role_name']?></td>
                            <td><?=$item['created_at']?></td>
                            <td><?=$item['updated_at']?></td>
                            <td>
                                <a href="./?role=admin&page=edit-role&role_id=<?=$item['role_id']?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>