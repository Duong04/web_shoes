<div id="content">

    <!-- Topbar -->

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h4>Update Image</h4>
        <div class="container">
            <form action="./?role=admin&page=update-image&product_id=<?=$_GET['product_id']?>&image_id=<?=$image['image_id']?>" method="POST" class="row" enctype="multipart/form-data">
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Image</label>
                    <input name="image" type="file" class="form-control">
                    <img class="mt-2" width="50px" src="<?=$image['image_path']?>" alt="">
                </div>
                <div class="mb-3">
                    <button name="submit" class="btn btn-primary">Update Image</button>
                    <a href="./?role=admin&page=list-images&product_id=<?=$_GET['product_id']?>" class="btn btn-outline-primary">Return</a>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>