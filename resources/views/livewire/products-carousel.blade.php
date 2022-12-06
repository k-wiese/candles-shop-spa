<div>
    <div class="row justify-content-center pb-5">
        <div class="col-sm-9 ">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner px-md-5" >
    
                @foreach ($slides as $products)
    
                    <div  class="carousel-item px-md-5 pb-5 pt-md-2 
                        @php
                            if ($products === $slides->first()) {
                                echo 'active';
                            }
                        @endphp">
    
                        <div class="row">    
                            @foreach($products as $product)
           
            <div class="col-md-3  text-center my-3">

                <div class="">    
                            <div class="card border border-0 mx-auto shadow" style="max-width: 18rem;">
                                <img src="{{  asset($product->photo_sq)   }}" class=" rounded-2 img img-fluid" alt="">
                                
                                <div class="card-body">
                                    <h5 class="card-title"> <b> {{    $product->name  }}</b></h5>
                                    <p class="card-text">{{    $product->price  }}.00$</p>
                                </div>
                    <a class="" style="max-width:18rem" href="{{ route('shop.show', $product->id)  }}">
                                
                                    <button class="btn btn-outline-info d-block w-100" >Check Details</button>
                                
                        </a>


                            </div>
                    </div>
           

    

              
            </div>

            @endforeach
                        </div>
                        
                    </div>
    
                @endforeach
    
                </div>
                {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button> --}}
              </div>
        </div>
    </div>
</div>
