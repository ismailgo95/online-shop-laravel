<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Product;
use App\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use File;
use View;
use App\Notif;

class ProductController extends Controller
{
    public function __construct()
    {
        view::share('notifs', Notif::all());
    }
    public function index()
    {
        $products = Product::orderBy("id", "DESC")->paginate(6);
        return view("dashboard.Products.index", compact('products'));
    }
    // Method Untuk Memanggil Route Form
    public function create()
    {
        $list_categories = Categorie::all();
        $list_variant = ["Sneakers", "Sepatu Formal", "Sepatu Kasual", "Sandal"];
        return view("dashboard.Products.create", compact('list_categories', "list_variant"));
    }
    // Method Simpan dari Form Jangan Lupa CSRF
    public function store(Request $request)
    {
        // Memvalidasi Data di Form
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000',
            'name' => 'required',
            'code' => 'required|unique:products,code',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'categorie_id' => 'required|integer',
            'description' => 'required'
        ]);
        // Menyimpan Ke database
        $product = new Product;
        $product->code = $request->input("code");
        $product->name =  $request->input("name");
        $product->varian =  $request->input("varian");
        $product->price =  $request->input("price");
        $product->stock =  $request->input("stock");
        $product->categorie_id  = $request->input("categorie_id");
        $product->description = $request->input('description');
        $product->save();

        //upload file to Folder storage
        $request->file('image')->move(public_path('product'), $product->id . '.jpg');
        $product->image = $product->id . '.jpg';

        $product->save();
        Session::flash("success", "berhasil Menambah Product");
        return redirect()->to("dashboard/product");
    }
    // Menampilkan Product
    public function show($id)
    {
        $data = Product::find($id);
        return view('store.detail', compact('data'));
    }
    // Menampilkan Tampilan dari Database ke Form Untuk Edit
    public function edit($id)
    {
        $product = Product::find($id);
        return view("dashboard.Products.edit", compact('product'));
    }
    // Method simpan Setelah di ambil dari edit Update
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->code = $request->input("code_product");
        $product->name =  $request->input("nama_product");
        $product->varian =  $request->input("varian");
        $product->price =  $request->input("price");
        $product->stock =  $request->input("stock");
        $product->save();
        Session::flash("success", "berhasil Update Prodduct");
        return redirect()->to("dashboard/product");
    }
    // Method Delete
    public function destroy($id)
    {
        // hapus file
        $gambar = Product::where('id', $id)->first();
        File::delete('product/' . $gambar->image);

        $gambar->delete();
        return back();
    }
}
