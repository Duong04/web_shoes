<?php 
    class HomeController {
        private $productModel;

        public function __construct() {
            $this->productModel = new Product();
        }
        public function index() {
            $latestProducts = $this->productModel->latestProducts();
            $discountProducts = $this->productModel->saleProducts();
            $discountProductsRand = $this->productModel->saleProductsRand();
            require_once './App/Views/clients/home.php';
        }

        public function search() {
            $products = null;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $input = file_get_contents('php://input');
                $data = json_decode($input, true);
                $htmlString = '';

                if (isset($data['data'])) {
                    $products = $this->productModel->selectLike($data['data'], 6);
                }
                if (!empty($products)) {
                    foreach ($products as $item) {
                        $htmlString .= $this->layoutSearch($item['product_name'], $item['product_image'], $item['new_price']);
                    }
                }else {
                    $htmlString .= '<h6 class="mb-0" style="text-align: start;">No products found!</h6>';
                }


                $searchResult = [
                    'status' => 'success',
                    'message' => 'Search results',
                    'data' => $htmlString
                ];

                echo json_encode($searchResult);
            }else {
                if (isset($_GET['search'])) {
                    $dataSearch = $_GET['search'];
                    $products = $this->productModel->selectLike($dataSearch, null);
                    require_once './App/Views/clients/search.php';
                }
            }
        }

        public function layoutSearch($name, $img, $price) {
            $product_name = urlencode($name);
            $price_f = round($price);
            return "<a href='./?page=product-detail&name=$product_name' class='search-data-item'>
				<img src='$img' alt=''>
				<div class='search-text d-flex flex-column'>
					<span>$name</span>
					<span class='text-danger'>$$price_f.00</span>
				</div>
			</a>";
        }
    }

?>