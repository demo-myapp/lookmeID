<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //eager loading with(), method ini berisi fungsi relationship
        $category = Category::with(['parent'])->orderBy('created_at', 'DESC')->paginate(10);

        //mengambil semua list category dari tabel categories
        //getParent() Local Scope
        $parent =  Category::getParent()->orderBy('name', 'ASC')->get();

        return view('categories.index', compact('category', 'parent'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|string|max:50|unique:categories']);

        //FIELD slug AKAN DITAMBAHKAN KEDALAM COLLECTION $REQUEST
        $request->request->add(['slug' => $request->name]);

        //mengecualikan token
        Category::create($request->except('_token'));

        //redirect dan fungsi with() untuk flash message
        return redirect(route('category.index'))->with(['success' => 'New Category ' . $request['name'] . ' Added!']);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();

        return view('categories.edit', compact('category', 'parent'));
    }

    public function update(Request $request, $id)
    {
        //validasi cek tidak ada duplikat dan khusus id yang akan di update dikecualikan
        $this->validate($request, ['name' => 'required|string|max:50|unique:categories,name,' . $id]);

        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'slug' => $request->name,
            'parent_id' => $request->parent_id
        ]);

        return redirect(route('category.index'))->with(['success' => 'Category ' . $category->name . ' Updated!']);
    }

    public function destroy($id)
    {
        //mengambil data kategori dan menghitung jumlah data anak kategori dan produk
        $category = Category::withCount(['child', 'product'])->find($id);

        //jika kategori bukan parent maupun parent yang tidak mempunyai anak kategori (== 0)
        //dan cek juga kategori tidak dipakai di produk manapun
        if ($category->child_count == 0 && $category->product_count == 0) {
            $category->delete();
            return redirect(route('category.index'))->with(['success' => 'Category ' . $category->name . '  Deleted!']);
        }

        return redirect(route('category.index'))->with(['error' => 'Cannot Delete - Category ' . $category->name . ' has a sub category or Category is still in use']);
    }
}
