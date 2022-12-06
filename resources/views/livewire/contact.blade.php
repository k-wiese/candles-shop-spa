<div class="transition-div ">
@section('title')Contact @stop

    <div class="container px-5 pt-5 pb-4 my-5 ">
        <div class="row py-3 ">

    
    
               <div class="col-lg-5 text-center">
                   <img src="{{ asset('img/5.jpg') }}" class="img img-fluid index-img-bio rounded-5 " alt="">
               </div>
               <div class="col-lg-7 py-5 text-start">
                   <h2 class="text-info pb-3"><b>About</b> the business</h2>
                   <p class="p-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse atque laboriosam quam sint nesciunt placeat dignissimos cumque mollitia voluptatibus adipisci nihil facere eaque, temporibus debitis, quidem eveniet architecto neque illum.</p>
                   <p class="p-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse atque laboriosam quam sint nesciunt placeat dignissimos cumque mollitia voluptatibus adipisci nihil facere eaque, temporibus debitis, quidem eveniet architecto neque illum.</p>
               </div>
    
        </div>
  
    
        <div class="row ">
            
            <div class="col-lg-8 p-3 text-center">
                <h4 class="p-3 mt-4">You can get in touch with us every workday from 8am to 6pm </h4>
                <a href="mailto:candlesese@casd.com">
                    <h4 class="p-3">candlesandart@company.com</h4>
                </a>
                <a href="tel:+12123123123">
                    <h4 class="p-3">+48 774 332 112</h4>
                </a>
            </div>
            <div class="col-lg-4 p-2">
                <img src="https://media.istockphoto.com/photos/business-woman-holding-a-tablet-pc-picture-id615743702?k=20&m=615743702&s=612x612&w=0&h=RGxCSJp1C3h697B1ppnqjHpA9JPKs5LBy42NAEB60Ts=" class="img img-fluid rounded rounded-5" alt="">
            </div>
        </div>
    
    <div class="container text-md-center text-sm-center pt-3">
        <footer class="d-flex flex-wrap justify-content-center align-items-center  ">
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
</div>
