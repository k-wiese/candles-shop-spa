<div class="transition-div">
@section('title'){{$product->name}} @stop

    <div class="container py-5">
        <div class="row justify-content-center my-5">

            
            <div class="col-md-8 shadow p-4" style="display:inline">
                
                <div class="row">
                   

                    <div class="col-md-5">

                        <img src="{{    asset($product->photo)  }}"   class="img img-fluid show-img rounded" alt="">
                    </div>
                    <div class="col-md-7">
                        <h1 class="">{{    $product->name  }}</h1>

                            
                        <p class="text-justify">{{$product->description}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio animi ratione, fugit eligendi harum votatibus.</p>
                        <p class="my-3 py-0 text-muted">
                            @php
                                if(is_numeric($product->rating))
                                {

                                    for($i = 0; $i < 5; $i++)
                                    {
                                        if(floor($product->rating) < $i)
                                        {
                                            echo '
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                            </svg>
                                            ';
                                        }
                                        else
                                        {
                                            echo 
                                            '
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            ';
    
                                        }
                                    }
                                }else
                                {
                                    echo $product->rating;
                                }
                            @endphp
                        </p>
                        @if($product->discount)
                        <p class="fs-6"> {{  number_format((float)$product->price - ($product->price * ($product->discount_value / 100)), 2, '.', '');    }}$ <del class="text-muted">{{' '.    $product->price }}.00$</del></p>
                        @else
                        <p class="fs-6"> {{    $product->price }}.00$</p>
    
                        @endif
                        <div class="">
                        
                            @if($cart->where('id',$product->id)->count())
                            <div class="py-5">
                                <b>In cart</b>  <br> @livewire('cart-counter') 
                            </div>
                            
                            @else
                            <form wire:submit.prevent="store()">
                                
                                <label for="quantity"> <p>Quantity</p> 
        
                                    <input type="number" id="quantity" class="form-control " wire:model="qty" min="1"> 
                                </label>
                                <div class="py-3 ">
        
                                    <button type="submit" class="btn btn-outline-info px-5 mb-2">Add to cart</button>
                            </form>

                                    @if($allowed)
                                        <!-- Button trigger modal -->
                                            <button class="btn btn-outline-light px-5 mb-2" data-bs-toggle="modal" data-bs-target="#createModal"  type="button">Add new review</button>
                                        
                                            <!-- Modal -->
                                            <form wire:submit.prevent="store_review()">
                                            <div wire:ignore class="modal fade " id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                                            <div class="modal-dialog ">
                                            <div class="modal-content bg-dark">
                                                <div class="modal-header ">
                                                <h1 class="modal-title fs-5 ms-4" id="createModalLabel">{{__('Add new product to shop')}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                

                                                        <div class="p-2">
                                    
                                                            <div class="input-group p-2">
                                                                <span class="input-group-text">Rating</span>
                                                                <input type="number" wire:model="rating" class="form-control "  min="1" max="5"> 

                                                            </div>
                                                            <div class="input-group p-2">
                                                                <span class="input-group-text">With textarea</span>
                                                                <textarea class="form-control" wire:model="comment"  aria-label="With textarea"></textarea>
                                                                
                                                            </div>

                                        
                                        
                                                            <div class="p-3 text-center">
                                                                <button type="submit" class="btn btn-outline-light">Add review</button>
                                                            </div>
                                                    </div>
                                    
                                    
                                    
                                                </div>
                                    
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </form>


                                    @endif
                                </div>
                            @endif
                            
                        </div>
                    </div>
                    
                
                </div>
            </div>
        </div>

        
    </div>
    @livewire('review-component',['product' => $product])
</div>
