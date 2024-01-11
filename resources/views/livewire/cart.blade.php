<div>
    <div class="container mt-5">
        <div class="row py-2">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="fs-3 fw-bold text-center">Shopping Cart</h4>
                    </div>
                        @php
                            $cartItems = session('cart', []); // Get the cart session data, or an empty array if it doesn't exist
                        @endphp
                    @if (count($cartItems) > 0)
                        <div class="card-body">
                            <!-- Cart items table -->
                            <div class="table-responsive-md py-2">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="px-4" scope="col">Product</th>
                                        <th class="px-4" scope="col">Price</th>
                                        <th class="px-4" scope="col">Quantity</th>
                                        <th class="px-4" scope="col">Subtotal</th>
                                        <th class="px-4" scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td class="py-5">
                                                    <span class="ms-1">
                                                        <a href="{{route ("show-product",$item["slug"])}}">
                                                            {{$item["title"]}}
                                                        </a>
                                                    </span>
                                                </td>
                                                <td class="py-5"> <span>৳</span> <span>{{$item["price"]}}</span></td>
                                                <td class="py-5 ">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary
                                                    @if($item['quantity'] ===1) disabled @endif"
                                                         wire:click ="decrease({{$item["product_id"]}})"  >-
                                                    </button>
                                                    <span class="badge bg-primary rounded-pill">
                                                        {{$item["quantity"]}}
                                                    </span>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary"
                                                            wire:click ="increase({{$item["product_id"]}})">+
                                                    </button>
                                                </td>
                                                <td class="py-5"> <span>৳</span>
                                                    <span>{{$item["sub_total"]}}</span></td>
                                                <td class="py-5">
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                            wire:click ="removeToCart({{$item["product_id"]}})">Remove
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <p class="ms-4 py-3 fs-4">Your cart is empty.</p>
                    @endif
                </div>
            </div>

            @if (count($cartItems) > 0)
                <div class="col-md-3 py-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cart Summary</h5>

                            <!-- Total price -->
                            <p class="card-text py-3">Total: ৳ <span>
                                   {{array_sum( array_column( $cartItems, 'sub_total' ) )}}
                                </span></p>

                            <!-- Checkout button -->
                            <a href="{{route ("checkout")}}" class="btn btn-primary">Checkout</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
