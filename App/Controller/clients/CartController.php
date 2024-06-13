<?php 
    class CartController {
        private $productModel;
        public function __construct() {
            $this->productModel = new Product();
        }

        public function index() {
            $cookieCart = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : null;
            $cart = json_decode($cookieCart, true);

            require_once './App/Views/clients/cart.php';
        }

        public function addCart() {
            $cookieCart = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : null;
            $cart = json_decode($cookieCart, true);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $input = file_get_contents('php://input');
                $data = json_decode($input, true);
                if (isset($data['id'])) {
                    $id = $data['id'];
                    $cartData = $this->productModel->selectProductById($id);
                    if ($cartData !== null) {
                        if (isset($cart[$id])) {
                            $cart[$id]['quantity'] += $data['quantity'];
                        }else {
                            $cartItem = [
                                'id' => $cartData['product_id'],
                                'quantity' => $data['quantity'],
                                'price' => $cartData['new_price'],
                                'image' => $cartData['product_image'],
                                'product_name' => $cartData['product_name'],
                            ];
                            $cart[$id] = $cartItem;
                        }
                    }
                }
            }
            setcookie('cart', json_encode($cart), time() + (90 * 24 * 3600), '/');
            echo count($_COOKIE['cart'], true);
        }

        public function updateQuantity() {
            $cookieCart = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : null;
            $cart = json_decode($cookieCart, true);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $input = file_get_contents('php://input');
                $data = json_decode($input, true);
                if (isset($data['id']) && isset($data['quantity'])) {
                    $id = $data['id'];
                    $cart[$id]['quantity'] = $data['quantity'];
                }
            }
            setcookie('cart', json_encode($cart), time() + (90 * 24 * 3600), '/');
            echo count($_COOKIE['cart'], true);
        }
        
        public function removeCart() {
            if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['product_id'])) {
                $id = $_GET['product_id'];
                if (isset($_COOKIE['cart'])) {
                    $cart = json_decode($_COOKIE['cart'], true);

                    if (isset($cart[$id])) {
                        unset($cart[$id]);
                        $update_cart = json_encode($cart);

                        setcookie('cart', $update_cart, time() + (90 * 24 * 3600), '/');
                    }
                }
            }
        }
    }
?>