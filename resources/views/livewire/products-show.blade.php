<div>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-12 col-md-4 py-3">

                    <div class="card h-100">
                        <a href="{{route ("show-product",$product->slug)}}" class="text-decoration-none">
                        <img src="{{$product->image}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="{{route ("show-product",$product->slug)}}" class="text-decoration-none">
                                <h5 class="card-title">{{$product->title}}</h5>
                            </a>
                            <p class="card-text text-info font-bold
                            fs-4">BDT. {{$product->sale_price??$product->price}}</p>
                           @if($product->sale_price)
                              <p><strike>BDT.{{ $product->price }}</strike>
                                 <span class="text-danger">
                                      - {{ number_format(($product->price - $product->sale_price) / $product->price * 100,
                                   2) }}%
                                 </span>
                              </p>
                            @else
                               <p><br></p>
                           @endif
                            <a href="{{route ("show-product",$product->slug)}}" class="btn btn-outline-danger text-dark">view</a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</div>
