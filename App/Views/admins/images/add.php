<div id="content">

    <!-- Topbar -->

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h4>Add Image</h4>
        <div class="container">
            <form action="" method="POST" class="row" enctype="multipart/form-data">
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Image</label>
                    <input required name="image" type="file" class="form-control">
                </div>
                <div class="mb-3">
                    <button name="submit" class="btn btn-primary">Add Image</button>
                    <a href="./?role=admin&page=list-images&product_id=<?=$_GET['product_id']?>" class="btn btn-outline-primary">Return</a>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>