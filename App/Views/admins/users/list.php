<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Users</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <a href="./?role=admin&page=create-user" class="btn btn-success">Create User</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>User Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Role</th>
                            <?php 
                            if ($_SESSION['role'] != 'Admin' || $_SESSION['role'] != 'Manager') {
                            ?>
                            <th>Action</th>
                            <?php } ?>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Stt</th>
                            <th>User Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Role</th>
                            <?php 
                            if ($_SESSION['role'] != 'Admin' || $_SESSION['role'] != 'Manager') {
                            ?>
                            <th>Action</th>
                            <?php } ?>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                        $i = 0;
                        foreach ($users as $item) { 
                            $i++;
                        ?>
                        <tr data-id="<?=$item['user_id']?>">
                            <td><?=$i?></td>
                            <td><?=$item['user_name']?></td>
                            <td><img width="60px" src="<?=$item['avatar']?>" alt=""></td>
                            <td><?=$item['email']?></td>
                            <td><?=isset($item['phone']) ? $item['phone'] : 'No Info!'?></td>
                            <td><?=isset($item['address']) ? $item['address'] : 'No Info!'?></td>
                            <td class="status"><?=$item['status']?></td>
                            <td class="role-name"><?=$item['role_name']?></td>
                            <?php 
                            if ($_SESSION['role'] != 'Admin' || $_SESSION['role'] != 'Manager') {
                            ?>
                            <td>
                                <?php 
                                if ($item['role_name'] != 'Admin' && $item['role_name'] != 'Manager') {
                                    $index = 0;
                                    $bgColor = ['btn-primary', 'btn-warning', 'btn-success', 'btn-info', 'btn-danger', 'btn-secondary'];
                                    foreach($roles as $role) { 
                                        if ($role['role_name'] == 'Admin' || $role['role_name'] == 'Manager') {
                                            continue;
                                        }
                                ?>
                                <button data-user-id="<?=$item['user_id']?>" data-role-id="<?=$role['role_id']?>" data-role-name="<?=$role['role_name']?>" class="btn <?=$bgColor[$index]?> update-role"><?=$role['role_name']?></button>
                                <?php $index++; } }?>
                            </td>
                            <?php } ?>
                            <td>
                                <?php if ($item['role_name'] != 'Admin' && $item['role_name'] != 'Manager') { ?>
                                    <button class="btn btn-success update-status" data-user-id="<?=$item['user_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="active"><i class="fa-solid fa-lock-open"></i></button>
                                    <button class="btn btn-danger update-status" data-user-id="<?=$item['user_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="suspended"><i class="fa-solid fa-user-lock"></i></button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>