<div class="container transition-div ">
  @section('title')Your orders @stop
  @if(!($orders->isEmpty()))
    <div class="row justify-content-center mb-5" style="margin-top:15vh">
        <div class="col-sm-8 text-center ">
            <h2>Hello, {{Auth::user()->name}}</h2>
           
        </div>
    </div>

    <div class="row justify-content-center" >
        <div class="col-sm-6 text-center p-3 shadow mb-4">
          @unless(Auth::user()->role === 'admin')
          <h5>Your orders</h5>
          @endunless
          <hr class="mx-3">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Is paid?</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Item List</th>

                  </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)
                  <tr>
                    <th scope="row">#{{  $order->id }}</th>
                    <td>{{  $order->price   }} $</td>
                    <td>{{  $order->is_paid ? 'Yes' : 'No'     }}</td>
                    <td>{{  $order->created_at->diffForHumans()     }}</td>
                    <td>
                      @if($order->is_paid)
                      <a class="p-0 m-0" href="  {{route('order.show', $order->id)}} ">

                        <button class="btn btn-outline-light btn-sm my-0 py-0 px-3">List</button>
                      </a>
                      @else
                      -
                      @endif
                  </td>
                  </tr>
                @endforeach

                </tbody>
              </table>
    
              <div class="col-sm-12 d-flex">
                <div class="mx-auto mb-2 mt-3 pagination-dark ">
    
                    {{  $orders->links()    }}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center" >
        <div class="col-sm-6 text-center p-3 shadow mb-4">
          @unless(Auth::user()->role === 'admin')
          <h5>Your reviews</h5>
          @endunless
          <hr class="mx-3">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Review</th>
                    <th scope="col">Product</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Posted at</th>
                    <th scope="col">Delete</th>

                  </tr>
                </thead>
                <tbody>

                @foreach($reviews as $review)
                  <tr>
                    <th scope="row">#{{  $review->id }}</th>
                    <td>
                      <a href="{{route('shop.show', $review->product->id)}}">
                        #{{  $review->product->id}}
                      </a>

                    </td>
                    <td>{{  $review->rating  }} / 5</td>
                    <td class="text-truncate">{{  $review->comment  }}</td>
                    <td>{{  $review->created_at->diffForHumans()     }}</td>
                    <td>
                      <button class="btn btn-outline-danger btn-sm" wire:click="delete_review({{$review->id}})">Delete</button>
                  </td>
                  </tr>
                @endforeach

                </tbody>
              </table>
    
              <div class="col-sm-12 d-flex">
                <div class="mx-auto mb-2 mt-3 pagination-dark ">
    
                    {{  $reviews->links()    }}
                </div>
            </div>
        </div>
    </div>
  @else
      <div class="row justify-content-center my-2 " >
        <div class="col-sm-8 text-center p-3" style="margin-top:20vh">
            <h2>Hello, {{Auth::user()->name}}</h2>
        </div>
    </div>
    <div class="text-center">

        <h3>No orders yet</h3>
        <div class="p-3">
            <a href="{{ route('shop') }}">
                <button class="btn btn-outline-info">Go to shop</button>
            </a>
        </div>
        
    </div>
  @endif

</div>