<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth"]);
        $this->middleware(function ($request, $next) {
            if(Auth::user()->role !== "admin"){
                return redirect()->route('home');
            }
            return $next($request);
        });
    }
    public function delete(Request $request){
        Product::find($request->id)->delete();
        return back();
    }
    public function createproduct_get(Request $request){
        $product = null;
        if($request->id){
            $product = Product::find($request->id);
        }
        return view("admin.createproduct", ["product" => $product]);
    }
    public function createproduct_post(Request $request){
        $this->validate($request, [
            "name" => "required|max:255",
            "price" => "required|numeric",
            "description" => "required",
            "image"=> !$request->id ? "required" : ""
        ]);
        $imagePath = $request->existedImage ?? null;
        if ($request->image) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/thumbnails'), $imageName);
            $imagePath = "/images/thumbnails/" . $imageName;
        }
        if($request->id){
            $product = Product::find($request->id);
            if($imagePath !== $product->image){
                $product->image = $imagePath;
            }
            $request->name !== $product->name && $product->name = $request->name;
            $request->price !== $product->price && $product->price = $request->price;
            $request->description !== $product->description && $product->description = $request->description;
            $product->update();
            return redirect()->route("admin");
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'price' =>$request->price
        ]);
        return back();
    }

    public function addtocard(Product $product, Request $request){
        $user_id = $request->user()->id;
        if(!$user_id){
            return redirect()->route("register");
        }
        if($product->favourited($user_id, $product->id)){
            $item = Favourite::where("user_id", "=", $user_id)->where("product_id", "=", $product->id)->first();
            $item->delete();
            return back();
        };
        Favourite::create([
            "user_id" => $user_id,
            "product_id" => $product->id,
        ]);
        return back();
    }
}
