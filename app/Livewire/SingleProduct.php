<?php

    namespace App\Livewire;

    use App\Models\Product;
    use Livewire\Component;

    class SingleProduct extends Component {
        public $post;

        public function addToCart ($id): bool {
            sleep (1);
            $product = Product ::findorFail ( $id);
            $cart = session () -> has ( 'cart' ) ? session () -> get ( 'cart' ) : [];
            if (array_key_exists ( $product -> id, $cart )) {
                $quantity = $cart[ $product -> id ][ 'quantity' ]++;
                $cart[ $product -> id ][ 'sub_total' ] = (($quantity + 1) * $cart[ $product -> id ][ 'price' ]);
            } else {
                $cart[ $product -> id ] = [ 'product_id' => $product -> id, 'title' => $product -> title, 'quantity'
                => 1, 'sub_total' => ($product -> sale_price !== null) ? $product -> sale_price : $product -> price, 'price' => ($product -> sale_price !== null) ? $product -> sale_price : $product -> price ,'slug'=> $product->slug];
            }
            session ( [ 'cart' => $cart ] );
            $this->dispatch ("cartChanged");
            flash()->addSuccess('Product added in cart.');
            return true;
        }

        public function render () {
            $product = Product ::where ( "slug", $this -> post ) -> get ();
            return view ( 'livewire.single-product', compact ( "product" ) );
        }
    }
