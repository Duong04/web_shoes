<?php 
    class OrderController {
        private $order;
        private $orderDetail;
        private $payment;
        private $user;
        private $product;
        private $message;

        public function __construct() {
            $this->order = new Order();
            $this->orderDetail = new OrderDetail();
            $this->payment = new Payment();
            $this->user = new Users();
            $this->product = new Product();
            $this->message = new Message();
        }
        public function checkout() {
            ob_start();
            $product = $this->product;

            $carts = json_decode($_COOKIE['cart'], true); 
            if (isset($carts) && count($carts) > 0 && isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];
                $user = $this->user->selectId($userId);
                require_once './App/Views/clients/checkout.php';

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                    $numberPhone = $_POST['number_phone'];
                    $address = $_POST['address'];
                    $orderNote = $_POST['order_note'] == '' ? 'No notes!' : $_POST['order_note'];
                    $paymentMethod = $_POST['payment_method'];
                    $amount = $subTotal + $shipping;
                    $carts = json_decode($_COOKIE['cart'], true);
                    $order = $this->order->insertOrder($subTotal, $address, $shipping, $userId, $orderNote, $numberPhone);
                    if ($order) {
                        foreach ($carts as $item) {
                            $itemProduct = $product->selectProductById($item['id']);
                            $quantity = $itemProduct['quantity_product'] < $item['quantity'] ? $itemProduct['quantity_product'] : $item['quantity'];
                            $this->orderDetail->insertOrderDetail($item['id'], $quantity, $item['price'], $order);
                            $this->product->updateQuantity($item['id'], $quantity);
                        }
                        $this->payment->insertPayment($paymentMethod, $amount, $order);
                        
                        $expire = time() - (90 * 24 * 3600); 
                        setcookie('cart', json_encode($carts), $expire, '/');
                        header('Location: ./?page=thanks');
                        exit();
                    }
                }
            }else {
                header('Location: ./?page=404');
                exit();
            }

            ob_end_flush();
        }
    }
?>