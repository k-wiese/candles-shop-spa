<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-sm-8 ">
        <form wire:submit.prevent="submit" enctype="multipart/form-data" method="post">
            @csrf
            <div class="p-2">
                <div class="input-group p-2">
                    <span class="input-group-text">Name</span>
                    <input wire:model="name" type="text" class="form-control" placeholder="{{$product->name}}">
                </div>
                @error('name')
                    <div class="alert alert-warning m-2">
                         <span class="error text-dark ">{{ $message }}</span> 
                    </div>
                @enderror
                <div class="input-group p-2">
                    <span class="input-group-text">Description</span>
                    <input wire:model="description" type="text" class="form-control" placeholder="{{$product->description}}">

                </div>
                @error('description')
                    <div class="alert alert-warning m-2">
                         <span class="error text-dark ">{{ $message }}</span> 
                    </div>
                @enderror
                <div class="input-group p-2">
                    <span class="input-group-text">Price</span>
                    <input wire:model="price" type="number" class="form-control text-dark " placeholder="{{$product->price}}">
                    <span class="input-group-text">$</span>
                    <span class="input-group-text">0.00</span>
                </div>
                @error('price')
                    <div class="alert alert-warning m-2">
                         <span class="error text-dark ">{{ $message }}</span> 
                    </div>
                @enderror
                <div class="p-2">
                    <label class="form-label">Color</label>
                    <select wire:model="color" name="color" class="form-control text-dark" placeholder="{{$product->color}}">
                        <option value="black">Black</option>
                        <option value="white">White</option>
                        <option value="blue">Blue</option>
                        <option value="yellow">Yellow</option>
                        <option value="transparent">Transparent</option>
                    </select>
                </div>
                @error('color')
                    <div class="alert alert-warning m-2">
                         <span class="error text-dark ">{{ $message }}</span> 
                    </div>
                @enderror
                <div class="p-2">
                    <label class="form-label">Type</label>
                    <select wire:model="type_create" name="type" class="form-control text-dark" placeholder="{{$product->type}}">
                        <option value="candle">Candle</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                @error('type')
                    <div class="alert alert-warning m-2">
                         <span class="error text-dark ">{{ $message }}</span> 
                    </div>
                @enderror

                <div class="p-2">
                    <label for="formFile" class="form-label">Photo</label>
                    <input wire:model="photo" class="form-control" type="file" id="formFile" >
                </div>
                @error('photo')
                    <div class="alert alert-warning m-2">
                         <span class="error text-dark ">{{ $message }}</span> 
                    </div>
                @enderror
                <div class="form-check px-5 mt-4">
                    <label class="form-check-label" for="discount">
                        Discount (not required)
                        <input wire:model="discount"  value="{{ true }}"
                            class="form-check-input" type="checkbox" id="discount" placeholder="{{$product->discount}}">
                    </label>
                </div>
                @error('discount')
                    <div class="alert alert-warning m-2">
                         <span class="error text-dark ">{{ $message }}</span> 
                    </div>
                @enderror
                <div class="input-group mb-3 p-2">
                    <span class="input-group-text" id="basic-addon1">Discount value</span>
                    <input wire:model="discount_value"  type="number" max="100" class="form-control"
                       aria-describedby="basic-addon1" placeholder="{{$product->discount_value}}">
                </div>
                @error('discount_value')
                    <div class="alert alert-warning m-2">
                         <span class="error text-dark ">{{ $message }}</span> 
                    </div>
                @enderror

                @isset($message)
                <div class="alert alert-success">
                    {{$message}}
                </div>
                @endisset
                <div class="p-3 text-center">
                    <button type="submit" class="btn btn-outline-light">Edit product</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
