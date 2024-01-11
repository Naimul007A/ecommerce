<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class ProductController extends Controller {
        /**
         * Display a listing of the resource.
         */
        public function show ($slug) {
            $data =[];
            $data['slug'] =$slug;
            return view ("products.show",$data);
        }

        /**
         * Show the form for creating a new resource.
         */
        public function showCart () {
            return view ("products.cart");
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store ( Request $request ) {
            //
        }

        /**
         * Display the specified resource.
         */

        /**
         * Show the form for editing the specified resource.
         */
        public function checkout (): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application {
            return view ("products.checkout");
        }

        /**
         * Update the specified resource in storage.
         */
        public function update ( Request $request, string $id ) {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy ( string $id ) {
            //
        }
    }
