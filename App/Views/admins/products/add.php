<div id="content">

    <!-- Topbar -->

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h4>Add Product</h4>
        <div class="container">
            <form action="" method="POST" class="row" enctype="multipart/form-data">
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Product Name</label>
                    <input required name="product_name" type="text" class="form-control" placeholder="Product Name">
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Product Image</label>
                    <input required name="product_image" type="file" class="form-control">
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Library Images</label>
                    <input multiple required name="images[]" type="file" class="form-control">
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Initial Price</label>
                    <input required name="initial_price" type="number" class="form-control" placeholder="Initial Price">
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Discount %</label>
                    <input required name="discount" type="number" class="form-control" placeholder="Discount %">
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Quantity</label>
                    <input required name="quantity" type="number" class="form-control" placeholder="Quantity">
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Category Name</label>
                    <select required name="category_id" id="" class="form-control">
                        <option value="">Category Name</option>
                        <?php foreach($categories as $category){ ?>
                            <option value="<?=$category['category_id']?>"><?=$category['category_name']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-check mb-3 col-12 col-lg-6 d-flex" style="gap: 20px;">
                    <div class="d-flex flex-column">
                        <input value="inactive" checked type="radio" name="is_active" id="flexRadioDefault1">
                        <label class="form-label" for="flexRadioDefault1">
                            Inactive
                        </label>
                    </div>
                    <div class="d-flex flex-column">
                        <input value="active" type="radio" name="is_active" id="flexRadioDefault2">
                        <label class="form-label" for="flexRadioDefault2">
                            Active
                        </label>
                    </div>
                </div>
                <div class="mb-3 col-12">
                    <label for="" class="form-label">Description</label>
                    <textarea rows="" name="description" id="description" cols=""></textarea>
                </div>
                <div class="mb-3">
                    <button name="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>