<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
    public function index(){
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.index',  ["products" => $products]);
    }
}
