<div id="content">

    <!-- Topbar -->

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h4>Update Category</h4>
        <div class="container">
            <form action="./?role=admin&page=update-category&category_id=<?=$category['category_id']?>" method="POST" class="row">
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Category id</label>
                    <input type="text" value="<?=$category['category_id']?>" class="form-control" placeholder="AUTO INCREMENT" disabled>
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Category Name</label>
                    <input required value="<?=$category['category_name']?>" name="category_name" type="text" class="form-control" placeholder="Category Name">
                </div>
                <div class="mb-3">
                    <button name="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>