<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:35',
            'description' => 'required|string|max:250',
            'photo' => 'required',
            'type' => 'required'
        ]);

        $requestData = $request->all();
        $fileName = time().$request->file('photo')->getClientOriginalName();

        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $sq_path = $request->file('photo')->storeAs('images', 'sq_'.$fileName, 'public');

        $requestData['photo'] = 'storage/'.$path;
        $requestData['photo_sq'] = 'storage/'.$sq_path;
   
        
        $img_sq = Image::make($request->file('photo')->getRealPath());
        $img_sq->resize(280,295);
        $img_sq->save('storage/'.$sq_path);

        
        $img = Image::make($request->file('photo')->getRealPath());
        
        $img->resize(1200,1400);
        $img->save('storage/'.$path);
        Product::create($requestData);
        return redirect()->route('shop');
    }
    
    public function update(Request $request, $id)
    {

        // dd('here');
        // $request->validate([
        //     'name' => 'string|max:35',
        //     'description' => 'string|max:250',
        // ]);

        $product = Product::findOrFail($id);

        $requestData = $request->all();
        if(isset($requestData['photo']))
        {
            $fileName = time().$request->file('photo')->getClientOriginalName();

            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $sq_path = $request->file('photo')->storeAs('images', 'sq_'.$fileName, 'public');

            $product->photo = 'storage/'.$path;
            $product->photo_sq = 'storage/'.$sq_path;
    
            
            $img_sq = Image::make($request->file('photo')->getRealPath());
            $img_sq->fit(200);
            $img_sq->save('storage/'.$sq_path);

            
            $img = Image::make($request->file('photo')->getRealPath());
            
            $img->fit(450);
            $img->save('storage/'.$path);
        }
        
        if(isset($requestData['name']))
        {
            $product->name = $requestData['name'];
        }
        if(isset($requestData['price']))
        {
            $product->price = $requestData['price'];
        }
        if(isset($requestData['color']))
        {
            $product->color = $requestData['color'];
        }
        if(isset($requestData['type']))
        {
            $product->type = $requestData['type'];
        }
        if(isset($requestData['description']))
        {
            $product->description = $requestData['description'];
        }

        if(isset($requestData['discount']))
        {
            $product->discount = $requestData['discount'];
        }
        else
        {
            $product->discount = null;

        }

        if(isset($requestData['discount_value']))
        {
            $product->discount_value = $requestData['discount_value'];
        }
        else
        {
            $product->discount_value = null;

        }
        $product->save();
        return redirect()->route('shop');
    }

    function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('shop');
    }
}
