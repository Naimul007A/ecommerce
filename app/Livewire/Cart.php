<?php

    namespace App\Livewire;

    use Livewire\Component;
    use Psr\Container\ContainerExceptionInterface;
    use Psr\Container\NotFoundExceptionInterface;

    class Cart extends Component {
        /**
         * @throws ContainerExceptionInterface
         * @throws NotFoundExceptionInterface
         */
        public function increase ($id): bool {
            $cart                   = session()->get( 'cart' );
            $quantity               = $cart[$id]['quantity']++;
            $cart[$id]['sub_total'] = (  ( $quantity + 1 ) * $cart[$id]['price'] );

            session( ['cart' => $cart] );
            return true;
        }

        /**
         * @throws ContainerExceptionInterface
         * @throws NotFoundExceptionInterface
         */
        public function decrease ( $id ): bool {
            $cart                   = session()->get( 'cart' );
            $quantity               = $cart[$id]['quantity']--;
            $cart[$id]['sub_total'] = (  ( $quantity - 1 ) * $cart[$id]['price'] );
            session( ['cart' => $cart] );
            return true;
        }
        public function removeToCart ( $id ): bool {
            sleep (1);
            session()->forget( 'cart.' . $id );
            $this->dispatch ("cartChanged");
            flash()->addSuccess('Product remove from  cart.');
            return true;
        }
        public function render (): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application {
            return view ( 'livewire.cart' );
        }
    }
