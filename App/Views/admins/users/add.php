<div id="content">

    <!-- Topbar -->

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h4>Create Category</h4>
        <div class="container">
            <form action="" method="POST" class="row">
                <div class="mb-3 col-12 col-lg-6">
                    <label for="user-name" class="form-label">User Name</label>
                    <input required id="user-name" name="user_name" type="text" class="form-control" placeholder="User Name">
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="email" class="form-label">Email</label>
                    <input required id="email" name="email" type="email" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status" required id="status">
                        <option value="">Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" name="role" required id="role">
                        <option value="">Role</option>
                        <?php foreach($roles as $role) { ?>
                        <option value="<?=$role['role_id']?>"><?=$role['role_name']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <button name="submit" class="btn btn-primary">Create User</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>