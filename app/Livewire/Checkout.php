<?php

    namespace App\Livewire;

    use App\Models\Order;
    use App\Models\OrderItem;
    use App\Models\User;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Support\Facades\Auth;
    use JetBrains\PhpStorm\NoReturn;
    use Livewire\Component;
    use Psr\Container\ContainerExceptionInterface;
    use Psr\Container\NotFoundExceptionInterface;

    class Checkout extends Component {
        /**
         * @throws ContainerExceptionInterface
         * @throws NotFoundExceptionInterface
         *
         */
        public $name = "";
        public $email = "";
        public $phone = "";
        public  $user_id = "";

        #[NoReturn] public function CheckOut () {
            $user = User::where('email', $this->email)->first();
            if ($user) {
                // User exists, assign user_id
                $this->user_id = $user->id;
            } else {
                // User does not exist, create a new user
                $newUser = User::create([
                    "name" => $this->name,
                    "email" => $this->email,
                    "phone" => $this->phone,
                    "password" => bcrypt($this->phone)
                ]);

                $this->user_id = $newUser->id;
            }
            $data = [];
            $data[ 'carts' ] = session () -> get ( 'cart' );
            $totalAmount = array_sum ( array_column ( $data[ 'carts' ], 'sub_total' ) );
            $order = Order ::create ( [ "user_id" => $this -> user_id,"total_amount" => $totalAmount, "payment_method" => "debit_card", "payment_transaction_id" => "4187521", "status" => "delivered" ] );
            if ($order) {
                foreach ( $data[ 'carts' ] as $cart ) {
                    $orderItem = OrderItem ::create ( [ "order_id" => $order -> id, "product_id" => $cart[ "product_id" ], "quantity" => $cart[ "quantity" ], "price" => $cart[ "sub_total" ], ] );
                }
            }
            session () -> forget ( 'cart' );
            $this -> dispatch ( "cartChanged" );
            $thisUser = User::findOrFail ($this->user_id);
            Auth::login ($thisUser);
            $this->redirect ("/profile");
            flash()->addSuccess('Order place successfully.');
        }

        public function render (): View|\Illuminate\Foundation\Application|Factory|Application {
            if (Auth::check()) {
                $this->name = auth ()->user ()->name;
                $this->email = auth ()->user ()->email;
                $this->phone = auth ()->user ()->phone;
            }
            $data = [];
            if (session () -> has ( 'cart' )) {
                $data[ 'carts' ] = session () -> get ( 'cart' );
                $data[ 'total' ] = array_sum ( array_column ( $data[ 'carts' ], 'sub_total' ) );
                $data[ 'count' ] = count ( $data[ 'carts' ] );
            } else {
                $data[ 'carts' ] = null;
            }
            return view ( 'livewire.checkout', $data );
        }
    }
