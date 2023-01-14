<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{

    
    public function update(Request $request, $id)
    {


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
