<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use Intervention\Image\Facades\Image;

class ProductCreate extends Component
{
    use WithFileUploads;
    public $message;
    public $name;
    public $description;
    public $price;
    public $color;
    public $type_create;
    public $photo;
    public $discount;
    public $discount_value;

    protected $rules = [
        'name' => 'required|min:4|max:45',
        'description' => 'required|string',
        'price' => 'required|min:1|max:99999',
        'color' => 'required',
        'type_create' => 'required',
        'photo' => 'required',
    ];
    public function render()
    {
        return view('livewire.product-create');
    }

    public function submit(){
        $this->validate();

        $fileName = time().$this->photo->getClientOriginalName();

        $path = $this->photo->storeAs('images', $fileName, 'public');
        $sq_path = $this->photo->storeAs('images', 'sq_'.$fileName, 'public');

        $photo = 'storage/'.$path;
        $photo_sq = 'storage/'.$sq_path;
   
        
        $img_sq = Image::make($this->photo->getRealPath());
        $img_sq->resize(280,295);
        $img_sq->save('storage/'.$sq_path);

        
        $img = Image::make($this->photo->getRealPath());
        
        $img->resize(1200,1400);
        $img->save('storage/'.$path);

        Product::create([
            'name'=>$this->name,
            'description'=>$this->description,
            'price'=>$this->price,
            'color'=>$this->color,
            'type_create'=>$this->type_create,
            'photo'=>$this->photo,
            'discount'=>$this->discount,
            'discount_value'=>$this->discount_value,
            'photo'=>$photo,
            'photo_sq'=>$photo_sq
        ]);

        $this->message = 'Successfully added new product to store';
    }
}
