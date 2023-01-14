<div class="transition-div">
@section('title')Shop @stop
              
    <div class="container px-md-5 " >
        <div class="row ">

            @if(Auth::check() and Auth::user()->role === 'admin')
            <div class="col-sm-12 text-center p-3">

                <a href="{{route('product.create')}}">
                <button class="btn btn-outline-light"  type="button">Add new product</button>
                </a>

            </div>
            
            @endif

            @if(Session::has('message'))
            <div class="text-center">
                <p class="alert alert-success px-5 py-3">{{session('message')}}</p>
            </div>
            @endif

        </div>
          

            <div class="row">
            <div class="col-md-3 py-5 my-3 px-md-5 transition-div ">
               
                <div class="px-3 py-1">
                   
                    <div class="px-3 ">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"> <p class="text-info ms-3">Home</p> </a></li>
                              <li class="breadcrumb-item active" aria-current="page">Shop</li>
                            </ol>
                          </nav>
                        </div>    
                    <div>
                        <div class="input-group mb-3 p-1 my-2">
                            <input wire:model.debounce.500ms="search_query" type="text" class="form-control" placeholder="Search product" aria-label="Search bar">
                          </div>
                        <div class="p-2 shadow">
                    
                        <div class="  py-1">
                            Show products
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                              </svg>
                        </div>

                        
                        <div class="form-check" >
                            <label class="form-check-label" for="exampleRadios1">
                              All
                            <input wire:model="type" value="" class="form-check-input" type="radio"   checked>
                            </label>
                          </div>
                        <div class="form-check" >
                            <label class="form-check-label" for="exampleRadios1">
                              Candles
                            <input wire:model="type" value="candle" class="form-check-input" type="radio">
                            </label>
                          </div>
                        <div class="form-check" >
                            <label class="form-check-label" for="exampleRadios1">
                              Other
                            <input wire:model="type" value="other" class="form-check-input" type="radio">
                            </label>
                          </div>
                        </div>
                        <div class="p-2 shadow">

                        
                        <div class="  pb-1 pt-3">
                            Sort by
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-clipboard2" viewBox="0 0 16 16">
                                <path d="M3.5 2a.5.5 0 0 0-.5.5v12a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-12a.5.5 0 0 0-.5-.5H12a.5.5 0 0 1 0-1h.5A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1H4a.5.5 0 0 1 0 1h-.5Z"/>
                                <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
                              </svg>
                        </div>
                        <div class="form-check" >
                            <label class="form-check-label" for="exampleRadios1">
                              Alphabetical
                            <input wire:model="sortBy" value="name" class="form-check-input" type="radio"   checked>
                            </label>
                          </div>
                          <div class="form-check">
                              <label class="form-check-label" for="exampleRadios2">
                                Color
                            <input wire:model="sortBy" class="form-check-input" type="radio"  value="color">
                            </label>
                          </div>
                          <div class="form-check">
                              <label class="form-check-label" for="exampleRadios3">
                                Price
                            <input wire:model="sortBy" class="form-check-input" type="radio"  value="price" >
                            </label>
                          </div>
                          <div class="form-check py-2">
                              <label class="form-check-label" for="flexCheckChecked">
                                On discount 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 13.5a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1 0-1h4.793L2.146 2.854a.5.5 0 1 1 .708-.708L13 12.293V7.5a.5.5 0 0 1 1 0v6z"/>
                                  </svg>
                            <input wire:model="discount_only" value="{{ true }}" class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            </label>
                          </div>
                        </div>
                        

                        
                          <div class="p-2 shadow" >
                            <div class="pt-2 pb-1">
        
                                Order by
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                                  </svg>
                            </div>
                                
                                <div class="form-check" >
                                    <label class="form-check-label" for="exampleRadios4">
                                      Low to high
                                    <input wire:model="asc_or_desc" class="form-check-input" type="radio" value="asc"   checked>
                                    </label>
                                  </div>
                                  <div class="form-check">
                                      <label class="form-check-label" for="exampleRadios5">
                                        High to low
                                    <input wire:model="asc_or_desc" class="form-check-input" type="radio"  value="desc">
                                    </label>
                                  </div>
        
                        </div>
                        

                </div>
                
             
            </div>
           

    

              
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach($products as $product)
           
                    <div class="col-md-4 pt-5 pb-3 mt-3 mb-2 px-md-5 text-center transition-div">
                        @if(Auth::check() and Auth::user()->role === 'admin')
                        <div class="p-2 text-center ">
                            <div class="row">
                                <div class=" col-6 p-2">

                                    <a href="{{route('product.edit',$product->id)}}">
                                    <button type="submit" class="btn btn-outline-light btn-sm" >Edit</button>

                                    </a>
                                </div>
                                
                                <div class="col-6 p-2">
        
                                    <form action="{{route('product.destroy', $product->id)}}" method="post" onclick="alert('Are you sure?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
        
                            </div>
                        </div>
                        @endif
        
                        <div class="">    
                                    <div class="card border border-0 mx-auto shadow" style="max-width: 18rem;">
                                        <img src="{{  asset($product->photo_sq)   }}" class=" rounded-2 img img-fluid" alt="">
                                        
                                        <div class="card-body">
                                            <h5 class="card-title"> <b> {{    $product->name  }}</b></h5>
                                        
                                            
                                            @if($product->discount)
                                                <p class="card-text">{{            $price = $product->price - ($product->price * ($product->discount_value / 100))}}$
                                                    <span style="display:inline" class="badge badge-sm bg-info m-1"> <b class="text-dark"> -{{$product->discount_value}}%</b></span>
                                                </p>
                                            @else
                                            <p class="card-text">{{    $product->price  }}.00$</p>
                                            @endif

                                           
                                        </div>
                            <a class="" style="max-width:18rem" href="{{ route('shop.show', $product->id)  }}">
                                        
                                            <button class="btn btn-outline-info d-block w-100" >Check Details</button>
                                        
                                </a>
        
        
                                    </div>
                            </div>
                            
                            
                            
                            
                        </div>
                        
                        
                        
                        @endforeach
                        <div wire:loading class="text-center">
                            <div class="spinner-border text-info" role="status">
                                <span class="visually-hidden">Loading...</span>
                              </div>
                        </div>
                </div>
            </div>
           
          

                


            </div>
            
        </div>
        
</form>

<script type="text/javascript">
    window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    window.livewire.emit('load-more');
    }
    };
 </script>

</div>

