<div class="transition-div">
@section('title')Shop @stop
              
    <div class="container px-md-5 " >
        <div class="row ">

            @if(Auth::check() and Auth::user()->role === 'admin')
            <div class="col-sm-12 text-center p-3">

                <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#createModal"  type="button">Add new product</button>
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
        
                                    <form wire:submit.prevent="change_edited({{$product->id}})">
                                    <button type="submit" class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" >Edit</button>
                                    </form>
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
                    <div class="col-sm-12 d-flex">
                        <div class="mx-auto mb-2 pagination-dark my-3">
            
                            {{  $products->links()    }}
                        </div>
                    </div>
                </div>
            </div>
          

                


            </div>
            
        </div>
        @if(Auth::check() and Auth::user()->role === 'admin')
       <!-- Modal Create -->
       <div class="modal fade " id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
        <div class="modal-content bg-dark">
            <div class="modal-header ">
            <h1 class="modal-title fs-5 ms-4" id="createModalLabel">{{__('Add new product to shop')}}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <form action="{{  route('product.store')  }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="p-2">


                    <div class="input-group p-2">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" name="name" aria-label="Dollar amount (with dot and two decimal places)">

                      </div>
                    <div class="input-group p-2">
                        <span class="input-group-text">Description</span>
                        <input type="text" class="form-control" name="description" aria-label="Dollar amount (with dot and two decimal places)">

                      </div>
                    <div class="input-group p-2">
                        <span class="input-group-text">Price</span>
                        <input type="text" class="form-control" name="price" aria-label="Dollar amount (with dot and two decimal places)">
                        <span class="input-group-text">$</span>
                        <span class="input-group-text">0.00</span>
                      </div>
                    <div class="p-2">
                        <label  class="form-label">Color</label>
                        <select name="color" class="form-control">
                            <option value="black">Black</option>
                            <option value="white">White</option>
                            <option value="blue">Blue</option>
                            <option value="yellow">Yellow</option>
                            <option value="transparent">Transparent</option>
                          </select>
                    </div>
                    <div class="p-2">
                        <label  class="form-label">Type</label>
                        <select name="type" class="form-control">
                            <option value="candle">Candle</option>
                            <option value="other">Other</option>
                          </select>
                    </div>
                    
                    <div class="p-2">
                        <label for="formFile" class="form-label">Photo</label>
                        <input class="form-control" name="photo" type="file" id="formFile">
                    </div>
                    <div class="form-check px-5 mt-4">
                        <label class="form-check-label" for="discount">
                          Discount (not required)
                      <input name="discount" value="{{ true }}" class="form-check-input" type="checkbox" id="discount">
                      </label>
                    </div>
                    <div class="input-group mb-3 p-2">
                        <span class="input-group-text" id="basic-addon1">Discount value</span>
                        <input name="discount_value" type="text" class="form-control" placeholder="ex. 25" aria-label="Username" aria-describedby="basic-addon1">
                      </div>


                    <div class="p-3 text-center">
                        <button type="submit" class="btn btn-outline-light">Add new product</button>
                    </div>
                </div>
                </form>



            </div>

        </div>

        </div>
    </div>
    
    
    @endif
    
     <!-- Modal Edit -->
     <form action="product/{{$currently_edited_product}}" enctype="multipart/form-data" method="post">

     <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header ">
            <h1 class="modal-title fs-5 ms-4" id="editModalLabel">{{__('Edit product')}}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                    
                    @csrf
                    @method('patch')
                    <div class="p-2">
                        <input type="hidden" name="product" value="$currently_edited_product">
                    <div class="input-group p-2">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control"  name="name" aria-label="Dollar amount (with dot and two decimal places)">

                    </div>
                    <div class="input-group p-2">
                        <span class="input-group-text">Description</span>
                        <input type="text" class="form-control"  name="description" aria-label="Dollar amount (with dot and two decimal places)">

                    </div>
                    <div class="input-group p-2">
                        <span class="input-group-text">Price</span>
                        <input type="text" class="form-control"  name="price" aria-label="Dollar amount (with dot and two decimal places)">
                        <span class="input-group-text">$</span>
                        <span class="input-group-text">0.00</span>
                    </div>
                    <div class="p-2">
                        <label  class="form-label">Color</label>
                        <select name="color" class="form-control">
                            <option value="black">Black</option>
                            <option value="white">White</option>
                            <option value="blue">Blue</option>
                            <option value="yellow">Yellow</option>
                        </select>
                    </div>
                    
                    <div class="p-2">
                        <label for="formFile" class="form-label">Photo</label>
                        <input class="form-control" name="photo" type="file" id="formFile">
                    </div>

                    <div class="form-check px-5 mt-4">
                        <label class="form-check-label" for="discount">
                        Discount (not required)
                    <input name="discount" value="{{ true }}" class="form-check-input" type="checkbox" id="discount">
                    </label>
                    </div>
                    <div class="input-group mb-3 p-2">
                        <span class="input-group-text" id="basic-addon1">Discount value</span>
                        <input name="discount_value" type="text" class="form-control" placeholder="ex. 25" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="p-3 text-center">
                        <button type="submit" class="btn btn-outline-light">Edit product</button>
                    </div>
                



            </div>

        </div>
        </div>
    </div>
</form>
  
</div>

