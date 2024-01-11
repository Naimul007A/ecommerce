<x-app-layout>
    <x-slot name="title">Profile - {{config ('app.name')}}</x-slot>

  <div class="container">
      <div class="row">
          <div class="col-12 col-md-10 mx-auto">
              @foreach($orders as $order)
                 <p> {{$order->id}}</p>
              @endforeach
          </div>
      </div>

  </div>
</x-app-layout>
