<?php 
    class ShopController {
        private $categoryModel;
        private $productModel;
        private $imageModel;
        public function __construct() {
            $this->categoryModel = new Category();
            $this->productModel = new Product();
            $this->imageModel = new Image();
        }

        public function index() {
            $categories = $this->categoryModel->selectCategories();
            $countProducts = null;
            $products = null;
            $limit = 6;
            $offset = 0;
            if (isset($_GET['per_page'])) {
                $offset = ($_GET['per_page'] - 1) * $limit;
            }

            if (isset($_GET['category_name'])) {
                $category_name = urldecode($_GET['category_name']);
                $products = $this->productModel->selectAllProductWithCategories($category_name, $limit, $offset);
                $countProducts = $this->productModel->countProducts($category_name);
            }else {
                $products = $this->productModel->selectAllProductActive($limit, $offset);
                $countProducts = $this->productModel->countProducts(null);
            }

            $pages = ceil($countProducts / $limit);
            $discountProductsRand = $this->productModel->saleProductsRand();

            require_once './App/Views/clients/shop.php';
        }

        public function productFilter() {
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['category_name'])) {
                $categoryName = $_GET['category_name'];
                $filter = $_GET['filter'];
                $htmlSting = '';
                $products = $this->productModel->filterProducts($categoryName, $filter);
                foreach ($products as $item) {
                    $htmlSting .= $this->layoutHtml($item);
                }
                echo json_encode(['data' => $htmlSting]);
            }
        }

        public function single() {
            if (isset($_GET['name'])) {
                $name = urldecode($_GET['name']);

                $product = $this->productModel->selectName($name);
                $discountProductsRand = $this->productModel->saleProductsRand();
                $this->productModel->updateView($product['product_id']);
                $images = $this->imageModel->selectImagesByProductId($product['product_id']);
                require_once './App/Views/clients/product-detail.php';
            }
        }

        public function layoutHtml($item) {
            $output = '
                <div class="col-lg-4 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="' . htmlspecialchars($item['product_image']) . '" alt="">
                        <div class="product-details">
                            <h6>' . htmlspecialchars($item['product_name']) . '</h6>
                            <div class="price">';
            
            if ($item["discount"] > 0) {
                $output .= '
                                <h6>$' . round($item['new_price']) . '.00</h6>
                                <h6 class="l-through">$' . round($item['initial_price']) . '.00</h6>';
            } else {
                $output .= '
                                <h6>$' . round($item['new_price']) . '.00</h6>';
            }
            
            $output .= '
                            </div>
                            <div class="prd-bottom">';
            
            if ($item["quantity_product"] > 0) {
                $output .= '
                                <span id="' . htmlspecialchars($item['product_id']) . '" class="social-info add-cart" style="cursor: pointer;">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">add to bag</p>
                                </span>';
            } else {
                $output .= '
                                <span class="social-info" onclick="warningSoldold()" style="cursor: pointer;">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">add to bag</p>
                                </span>';
            }
            
            $output .= '
                                <a href="" class="social-info">
                                    <span class="lnr lnr-heart"></span>
                                    <p class="hover-text">Wishlist</p>
                                </a>
                                <a href="./?page=product-detail&name=' . urlencode($item['product_name']) . '" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">view more</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>';
        
            return $output;
        }
    }
?>