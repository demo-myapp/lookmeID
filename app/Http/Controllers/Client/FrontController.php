<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->orderBy('created_at', 'DESC')->paginate(4);
        return view('client.index', compact('products'));
    }

    public function products()
    {
        $products = Product::where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);
        $categories = Category::with(['child'])->withCount(['child'])->getParent()->orderBy('name', 'ASC')->get();

        return view('client.products', compact('products', 'categories'));
    }

    public function categoryProduct($slug)
    {
        $products = Category::where('slug', $slug)->first()->product()->where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);
        $categories = Category::with(['child'])->withCount(['child'])->getParent()->orderBy('name', 'ASC')->get();

        // Fungsi recursive (belum FIX)
        // $categories = Category::with('childRecursive')->whereNull('parent_id')->get();

        if (Product::whereSlug($slug)->exists()) {
            return redirect('/');
        }
        return view('client.products', compact('products', 'categories'));
    }
}
