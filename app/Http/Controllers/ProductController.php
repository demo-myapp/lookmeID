<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with(['category'])->orderBy('created_at', 'DESC');

        //jika ada pencarian, kolom pencarian tidak kosong
        if (request()->search != '') {
            //filter nama berdasarkan pencarian
            $product = $product->where('name', 'LIKE', '%' . request()->search . '%');
        }

        $product = $product->paginate(10);
        return view('products.index', compact('product'));
    }

    public function create()
    {
        $category = Category::orderBy('name', 'DESC')->get();
        return view('products.create', compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        //simpan file gambar ke folder public
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $filename);
        }

        //masukkan ke database
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $filename,
            'price' => $request->price,
            'weight' => $request->weight,
            'status' => $request->status,
        ]);

        return redirect(route('product.index'))->with(['success' => 'New Product ' . $request->name . ' Added!']);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('name', 'DESC')->get();
        return view('products.edit', compact('product', 'category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'image' => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        $product = Product::find($id);
        $filename = $product->image; //simpan nama file lama

        //jika ada file yang diupload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            //upload gambar baru
            $file->storeAs('public/products', $filename);
            //hapus file yang lama
            File::delete(storage_path('app/public/products/' . $product->image));
        }

        //update data di database
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'weight' => $request->weight,
            'image' => $filename,
            'status' => $request->status,
        ]);

        return redirect(route('product.index'))->with(['success' => 'Product ' . $product->name . ' Updated!']);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        //hapus gambar dalam storage
        File::delete(storage_path('app/public/products/' . $product->image));
        //hapus data dari database
        $product->delete();

        return redirect(route('product.index'))->with(['success' => 'Product ' . $product->name . ' Deleted!']);
    }
}
