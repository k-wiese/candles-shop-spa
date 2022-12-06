<div class="container transition-div">
  @section('title')Order #{{$order->id}} @stop
  
    <div class="row justify-content-center "style="margin-top:22vh" >
        @if($order->is_paid)
        <div class="col-sm-6 text-center p-3 shadow">
          <h5>This is order #{{$order->id}}, <br> placed {{$order->created_at->diffForHumans()}} </h5>
          <hr class="mx-3">
            <table class="table">
                <thead>
                  <tr>
                      <th scope="col">Preview</th>
                      <th scope="col">Product ID</th>
                    <th scope="col">Label</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                  <tr>
                      <th>
                          <div>
  
                              <img src="{{asset($product->photo_sq)}}" class="img img-fluid rounded-circle cart-zoom" style="max-height:23px" alt="">
                          </div>
                      </th>
                    <th scope="row">#{{  $product->id }}</th>
                    <td>{{  $product->name   }}</td>
                    <td>{{  $product->qty   }} </td>
                    <td>{{  $product->price * $product->qty  }}.00 $</td>
                   
                  </tr>
                @endforeach

                </tbody>
              </table>
              <div class=" text-center">
      
                  <a href="{{route('dashboard')}}">
                      <button class="btn btn-outline-light"> Back </button>
                  </a>
              </div>
        </div>
        @else
        <div class="col-sm-6 text-center p-3 shadow mt-5">
          <b>This list is empty because order #{{$order->id}} was not paid.</b> <br>
          <a href="{{route('dashboard')}}">
            <button class="btn btn-outline-light py-1 my-2 px-3"> Back</button>
          </a>
        </div>
        @endif

    </div>
</div>
