<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use UxWeb\SweetAlert\SweetAlert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $produk = Product::orderBy('updated_at', 'desc')->paginate(10);

        return view('admin.produk', compact('produk'));
    }


    public function cari(Request $request)
    {
        $cari = $request->cari;
        $produk = Product::where('name', 'like', "%" . $cari . "%")->paginate(10);
        return view('admin.produk', compact('produk'));
    }

    public function tambahForm()
    {
        $kategori = Category::all();
        return view('admin.tambahProduk', compact('kategori'));
    }

    public function detailProduk($slug)
    {
        $produk = Product::where('slug', $slug)->first();
        return view('admin.detailProduk', compact('produk'));
    }

    public function tambahProduk(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|string',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'desc' => 'required'
        ]);

        $image = $request->input('image');
        if (isset($image)) {
            $imageExtension = $request->image->extension();
            $imageName = 'img_' . time() . '.' . $imageExtension;
            $imagePath = $request->image->storeAs('images', $imageName, 'public_uploads');
        }

        $user_id = Auth::user()->id;

        $format_price = preg_replace('/\D/', '', $request->price);

        $produk = new Product();
        $produk->name = $request->name;
        $produk->slug = Str::slug($request->name);
        $produk->price = $format_price;
        $produk->category_id = $request->category_id;
        $produk->image = $imagePath ?? null;
        $produk->desc = $request->desc;
        $produk->user_id = $user_id;
        $produk->save();

        alert()->success('Tambah Produk', 'Sukses');

        return redirect()->route('produk.admin');
    }

    public function editForm($slug)
    {
        $produk = Product::where('slug', $slug)->first();
        $kategori = Category::all();

        return view('admin.editProduk', compact('produk', 'kategori'));
    }

    public function updateProduk(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|string',
            'category_id' => 'required',
            'desc' => 'required'
        ]);

        $produk = Product::where('slug', $slug)->first();

        if ($request->image) {

            $imageExtension = $request->image->extension();
            $imageName = 'img_' . time() . '.' . $imageExtension;
            $imagePath = $request->image->storeAs('images', $imageName, 'public_uploads');

            Storage::disk('public')->delete($produk->image);

            $format_price = preg_replace('/\D/', '', $request->price);
            $produk->name = $request->name;
            $produk->slug = Str::slug($request->name);
            $produk->price = $format_price;
            $produk->category_id = $request->category_id;
            $produk->image = $imagePath ?? null;
            $produk->desc = $request->desc;

            $produk->save();
        } else {
            $format_price = preg_replace('/\D/', '', $request->price);
            $produk->name = $request->name;
            $produk->slug = Str::slug($request->name);
            $produk->price = $format_price;
            $produk->category_id = $request->category_id;
            $produk->desc = $request->desc;
            $produk->save();
        }

        alert()->success('Ubah Produk', 'Sukses');

        return redirect()->route('produk.admin');
    }

    public function hapusProduk($slug)
    {
        $produk = Product::where('slug', $slug)->first();
        Storage::disk('public')->delete($produk->image);
        Product::where('slug', $slug)->delete();
        alert()->error('Hapus Produk', 'Sukses');
        return redirect()->route('produk.admin');
    }
}
