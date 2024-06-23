<div id="content">

    <!-- Topbar -->

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h4>Update Role</h4>
        <div class="container">
            <form action="./?role=admin&page=update-role&role_id=<?=$role['role_id']?>" method="POST" class="row">
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Role id</label>
                    <input value="<?=$role['role_id']?>" type="text" class="form-control" placeholder="AUTO INCREMENT" disabled>
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="role_name" class="form-label">Role Name</label>
                    <input value="<?=$role['role_name']?>" required name="role_name" id="role_name" type="text" class="form-control" placeholder="Role Name">
                </div>
                <div class="mb-3">
                    <button name="submit" class="btn btn-primary">Update Role</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>