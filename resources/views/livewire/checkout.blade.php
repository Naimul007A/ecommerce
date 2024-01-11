<div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">User Details</h5>
                    </div>
                    <div class="card-body">
                        <!-- User details form -->
                        <form wire:submit.prevent="CheckOut">
                            <div class="mb-3">
                                <label for="userName" class="form-label">Full Name</label>
                                <input type="text" wire:model="name" class="form-control" id="userName"
                                       placeholder="Jone Doe" required>
                            </div>
                            <div class="mb-3">
                                <label for="userEmail" class="form-label">Email Address</label>
                                <input type="email" wire:model="email" class="form-control" id="userEmail"
                                       placeholder="john@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="userPhone" class="form-label">Phone Number</label>
                                <input type="tel" wire:model="phone" class="form-control" id="userPhone"
                                       placeholder="123-456-7890"
                                       required>
                            </div>

                            <!-- Shipping information form -->
                            <button type="submit" class="btn btn-primary">Continue to Payment</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title float-start">Order Summary</h5>
                        <p class="mt-2 float-end badge rounded-pill
                        bg-danger">
                       <span class="fw-bold"> {{$count}}</span>
                        </p>

                    </div>
                    <div class="card-body">
                        <!-- Order summary details -->
                        <ul class="list-group mb-3">
                            @foreach($carts as $cart)
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0 pb-1">{{$cart["title"]}}</h6>
                                        <small class="text-muted pt-1">Quantity : {{$cart["quantity"]}}</small>
                                    </div>
                                    <span class="text-muted pt-2"><span>৳</span> {{$cart["sub_total"]}}</span>
                                </li>
                            @endforeach
{{--                            <li class="list-group-item d-flex justify-content-between bg-light">--}}
{{--                                <div class="text-success">--}}
{{--                                    <h6 class="my-0">Promo code</h6>--}}
{{--                                    <small>EXAMPLECODE</small>--}}
{{--                                </div>--}}
{{--                                <span class="text-success">−$5</span>--}}
{{--                            </li>--}}
                            <li class="list-group-item d-flex justify-content-between pt-2">
                                <span>Total (BDT)</span>
                                <strong>৳ {{$total}}</strong>
                            </li>

                            <!-- Add more items as needed -->
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
