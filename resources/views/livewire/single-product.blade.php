<div class="container">
    @foreach($product as $pod)
        <div class="row pt-5">
            <div class="col-12 col-md-12 mx-auto">
                <div class="card mb-3 p-3">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="{{$pod->image}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-7 px-3">
                            <div class="row">
                                <div class="col-10">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$pod->title}}</h5>
                                        <p class="card-text">{{$pod->description}}</p>
                                        <p class="card-text text-danger font-bold
                                fs-4">BDT. {{$pod->sale_price??$pod->price}}</p>
                                        @if($pod->sale_price)
                                            <p><strike>BDT.{{ $pod->price }}</strike>
                                                <span class="text-danger">
                                      - {{ number_format(($pod->price - $pod->sale_price) / $pod->price * 100,
                                   2) }}%
                                 </span>
                                            </p>
                                        @else
                                            <p><br></p>
                                        @endif
                                        <div wire:loading.delay>
                                            <h6 class="text-info">Loading.....</h6>
                                        </div>
                                        <br>
                                        @if(session ()->has ("cart"))
                                            @if(array_key_exists ( $pod -> id, session('cart')))
                                                <a href="{{route ("show-cart")}}" class="btn btn-success text-light
                                                fw-bold">
                                                   view cart
                                                </a>
                                            @else
                                                <button wire:click="addToCart({{$pod->id}})" class="btn btn-danger text-light fw-bold
                                " wire:loading.attr="disabled">Add to
                                                    cart
                                                </button>
                                            @endif
                                        @else
                                            <button wire:click="addToCart({{$pod->id}})" class="btn btn-danger text-light fw-bold
                                " wire:loading.attr="disabled">Add to
                                                cart
                                            </button>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
