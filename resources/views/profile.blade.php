<x-app-layout>
    <x-slot name="title">Profile - {{config ('app.name')}}</x-slot>

  <div class="container">
      <div class="row">
          <div class="col-12 col-md-10 mx-auto">
                  <h1 class="mb-4">Your Orders</h1>
                  <table class="table table-striped">
                      <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Total</th>
                          <th scope="col">Status</th>
                          <th scope="col">Date</th>
                          <th scope="col">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($orders as $order)
                         <tr>
                          <td>{{$loop->index+1}}</td>
                         <td>
                             <a href="{{route ("show-product",$order->product->slug)}}"
                                class="text-decoration-none">{{$order->product->title}}</a>
                         </td>
                          <td><span>৳</span> {{$order->order->total_amount}}</td>
                          <td><span class="btn btn-success btn-sm">{{$order->order->status}}</span></td>
                             <td>{{ \Carbon\Carbon::parse($order->order->order_date)->diffForHumans() }}</td>
                          <td><a href="#" class="btn btn-primary btn-sm">Download</a></td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
</x-app-layout>
