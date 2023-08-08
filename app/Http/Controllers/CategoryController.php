<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori = Category::paginate(5);
        return view('admin.category', compact('kategori'));
    }

    public function tambahCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $kategori = new Category();
        $kategori->name = $request->name;
        $kategori->slug = Str::slug($request->name);
        $kategori->image = null;
        $kategori->save();

        alert()->success('Tambah Kategori', 'Sukses');

        return redirect()->route('tampilkategori.admin');
    }

    public function editForm($slug)
    {
        $kategori = Category::where('slug', $slug)->first();
        return view('admin.editCategory', compact('kategori'));
    }

    public function updateCategory(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $kategori = Category::where('slug', $slug)->first();
        $kategori->name = $request->name;
        $kategori->slug = Str::slug($request->name);

        alert()->success('Ubah Kategori', 'Sukses');

        return redirect()->route('tampilkategori.admin');
    }

    public function hapusCategory($slug)
    {
        $kategori = Category::where('slug', $slug)->first();
        Category::where('slug', $slug)->delete();
        alert()->error('Hapus Kategori', 'Sukses');
        return redirect()->route('tampilkategori.admin');
    }
}
