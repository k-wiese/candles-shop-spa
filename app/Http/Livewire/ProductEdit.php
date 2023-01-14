<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use Intervention\Image\Facades\Image;

class ProductEdit extends Component
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
    public $product;

    protected $rules = [
        'name'=>'min:1'
    ];
    public function render()
    {
        return view('livewire.product-edit');
    }
    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
    }

    public function submit()
    {
        
        $this->validate();
        if (isset($this->name)) {
            $this->product->name = $this->name;
        }
        if (isset($this->description)) {
            $this->product->description = $this->description;
        }
        if (isset($this->price)) {
            $this->product->price = $this->price;
        }
        if (isset($this->color)) {
            $this->product->color = $this->color;
        }
        if (isset($this->type_create)) {
            $this->product->type = $this->type_create;
        }
        if (isset($this->photo)) {
            $fileName = time() . $this->photo->getClientOriginalName();

            $path = $this->photo->storeAs('images', $fileName, 'public');
            $sq_path = $this->photo->storeAs('images', 'sq_' . $fileName, 'public');

            $photo = 'storage/' . $path;
            $photo_sq = 'storage/' . $sq_path;

            $img_sq = Image::make($this->photo->getRealPath());
            $img_sq->resize(280, 295);
            $img_sq->save('storage/' . $sq_path);

            $img = Image::make($this->photo->getRealPath());

            $img->resize(1200, 1400);
            $img->save('storage/' . $path);

            $this->product->photo = $photo;
            $this->product->photo_sq = $photo_sq;
        }
        $this->product->save();

        $this->message = 'Successfully edited product in store';
    }
}
