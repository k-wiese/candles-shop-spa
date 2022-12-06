<div class="transition-div">
@section('title')Home @stop
    <div class="container-fluid mb-4 ">
        <div class="row justify-content-center mt-5">

            <div class=" col-sm-5  p-3 mb-4 mt-4 text-center">
        
                <h1 class="text-info py-3"> <b>Handmade</b>  with love!</h1>
                <p class="py-3"><b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Id ipsam repudiandae temporibus sint, et quo dolorem doloremque pariatur dicta rerum error sit soluta velit eveniet assumenda quisquam .</b></p>
            </div>
        </div>

        @livewire('products-carousel')

    </div>
    <div class="container px-5 my-5">
    
        <div class="row py-3">
    
    
               <div class="col-lg-5 text-center">
                   <img src="{{ asset('img/5.jpg') }}" class="img img-fluid index-img-bio rounded-5 " alt="">
               </div>
               <div class="col-lg-7 py-5 text-start">
                   <h2 class="text-info pb-3"><b>About</b> the business</h2>
                   <p class="p-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse atque laboriosam quam sint nesciunt placeat dignissimos cumque mollitia voluptatibus adipisci nihil facere eaque, temporibus debitis, quidem eveniet architecto neque illum.</p>
                   <p class="p-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse atque laboriosam quam sint nesciunt placeat dignissimos cumque mollitia voluptatibus adipisci nihil facere eaque, temporibus debitis, quidem eveniet architecto neque illum.</p>
               </div>
    
        </div>
    </div>
    <div class="container text-md-center text-sm-center mt-auto">
        <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 ">
          <p class="col-md-4 mb-0 text-info">&copy; 2022 Candles and Art</p>
      
          <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          </a>
      
          <ul class="nav col-md-4 justify-content-center ">
            <li class="nav-item"><a href="{{  (url('/'))  }}" class="nav-link px-2 text-info">Home</a></li>
            <li class="nav-item"><a href="{{  (url('/shop'))  }}" class="nav-link px-2 text-info">Shop</a></li>
            <li class="nav-item"><a href="{{  (url('/contact'))  }}" class="nav-link px-2 text-info">Contact</a></li>
          </ul>
        </footer>
      </div>

</div>
