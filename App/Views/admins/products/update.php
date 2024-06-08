<div id="content">

    <!-- Topbar -->

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h4>Update Product</h4>
        <div class="container">
            <form action="./?role=admin&page=update-product&product_id=<?=$product['product_id']?>" method="POST" class="row" enctype="multipart/form-data">
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Product Name</label>
                    <input value="<?=$product['product_name']?>" required name="product_name" type="text" class="form-control" placeholder="Product Name">
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Initial Price</label>
                    <input value="<?=$product['initial_price']?>" required name="initial_price" type="number" class="form-control" placeholder="Initial Price">
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Product Image</label>
                    <input name="product_image" type="file" class="form-control">
                    <img class="mt-2" width="50px" src="<?=$product['product_image']?>" alt="">
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Library Images</label>
                    <input multiple name="images[]" type="file" class="form-control">
                    <div class="mt-2">
                        <?php foreach($images as $image) { ?>
                            <img width="50px" src="<?=$image['image_path']?>" alt="">
                        <?php } ?>
                    </div>
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Discount %</label>
                    <input value="<?=$product['discount']?>" required name="discount" type="number" class="form-control" placeholder="Discount %">
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Quantity</label>
                    <input value="<?=$product['quantity_product']?>" required name="quantity" type="number" class="form-control" placeholder="Quantity">
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="" class="form-label">Category Name</label>
                    <select required name="category_id" id="" class="form-control">
                        <?php foreach($categories as $category){ ?>
                            <option <?=$category['category_id'] == $product['category_id'] ? 'selected' : '' ?> value="<?=$category['category_id']?>"><?=$category['category_name']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-check mb-3 col-12 col-lg-6 d-flex" style="gap: 20px;">
                    <div class="d-flex flex-column">
                        <input <?=$product['is_active'] == 'inactive' ? 'checked' : ''?> value="inactive" type="radio" name="is_active" id="flexRadioDefault1">
                        <label class="form-label" for="flexRadioDefault1">
                            Inactive
                        </label>
                    </div>
                    <div class="d-flex flex-column">
                        <input <?=$product['is_active'] == 'active' ? 'checked' : ''?> value="active" type="radio" name="is_active" id="flexRadioDefault2">
                        <label class="form-label" for="flexRadioDefault2">
                            Active
                        </label>
                    </div>
                </div>
                <div class="mb-3 col-12">
                    <label for="" class="form-label">Description</label>
                    <textarea rows="" name="description" id="description" cols=""><?=$product['description']?></textarea>
                </div>
                <div class="mb-3">
                    <button name="submit" class="btn btn-primary">Update Product</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>