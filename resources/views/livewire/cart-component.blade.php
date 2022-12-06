<div class="container p-3 pt-md-5 transition-div" style="margin-top:18vh">
  @section('title')Cart @stop

    <div class="row m-1 justify-content-center ">
        @isset($user_message)
            <div class=" col-sm-6 alert m-5 text-center  {{$is_paid ? 'alert-success' : 'alert-danger' }}">
                <b class="text-dark">{{$user_message}}</b>
            </div>
            <br>
        @endisset
        <div class="col-sm-6 text-center shadow p-3">
            @if(Cart::total() > 0)
            <div>
                <h3>This is your cart content</h3>
            </div>
            <div>
                <hr class="mx-4">
            </div>
            <table class="table ">
                <thead>
                  <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th  scope="col">Price</th>
                    <th  scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <th scope="row">{{  $item->id   }}</th>
                        <td >
                            <div>
                                <img src="{{   asset(($products->find($item->id))->photo)  }}" style="max-height: 22px" class="img img-fluid rounded-circle cart-zoom" alt="">
                            </div>
                        </td>
                        <td >{{   $item->name   }}</td>
                        <td>{{   $item->qty   }}</td>
                        <td>{{   $item->price   }}$</td>
                        <td>

                                <button type="submit" class="btn btn-outline-danger btn-sm   py-0" wire:click="destroy_item('{{$item->rowId}}')">Delete</button>

                        </td>
                    </tr>
                    @endforeach
                    <tr >
                        <th scope="row"></th>
                        <td ></td>
                        <td > <b>Total of</b> </td>
                        <td ><b>{{Cart::count()}}</b> </td>

                        <td><b> {{ floatval(str_replace(',','',Cart::total())) + floatval(str_replace(',','',Cart::tax()))  }}$</b></td>
                        <td><b>with TAX</b></td>
                    </tr>
                </tbody>
              </table>
              @endif
              @if(Auth::check() and Cart::total() > 0)
                <div class="p-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Order and pay
                    </button>
                </div>
              @elseif(Auth::check() and Cart::total() == 0)
              <div class="py-1">
                Add something to cart in <a href="{{route('shop')}}"><button class="btn btn-outline-light btn-sm ms-1">Shop</button> </a>
              </div>

              
              @elseif(Cart::total() > 0 and !Auth::check())
              <div class="">
                <a href="{{route('login')}}">  <button class="btn btn-sm btn-outline-light mx-1 mb-1 mt-0">Log in</button></a> before making an order. 
              </div>
              @elseif(!Auth::check() and Cart::total() == 0)
              <div class="">
                Add something to cart in <a href="{{route('shop')}}"> <button class="btn btn-sm btn-outline-light mx-1">Shop</button> </a> or <a href="{{route('login')}}"> <button class="btn btn-sm btn-outline-light ms-1">Log in</button> </a>
              </div>
              @endif
              
      
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5 " id="exampleModalLabel">Choose payment simulation result</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-white">
                    <p>Green: Make Order object (paid) -> Make sold product object -> Destroy Cart -> Leave message</p>
                    <p>Red: Make Order object (unpaid) -> Leave message</p>
                    </div>
                    <div class="text-center">

                        <form wire:submit.prevent="store(true)">

                            <button class="btn btn-outline-success float-start m-4 p-2 btn-lg" type="submit" data-bs-dismiss="modal">Successful payment</button>
                        </form>

                        <form wire:submit.prevent="store(false)">

                            <button class="btn btn-outline-danger float-end m-4 py-2 px-4 btn-lg" type="submit" data-bs-dismiss="modal">Failed payment</button>
                        </form>

                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>