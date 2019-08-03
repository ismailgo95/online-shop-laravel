<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Product;
use App\Template;
use App\Categorie;
use Session;

class StoreController extends Controller
{

    public function __construct()
    {
        $this->template = Template::where("selected", '1')->first();
        View::share('categories', Categorie::all());
        View::share('product', Product::all());
    }
    public function index()
    {
        return view('templates.' . $this->template->folder . '.index');
    }

    public function product(Request $request)
    {
        $categorie_id = $request->input('categorie');
        $product = Product::where("level", "parent")->orderBy('id', 'desc');

        if ($categorie_id > 0) {
            $product = $product->where("categorie_id", $categorie_id);
        }

        $product = $product->paginate(18);
        return view('templates.' . $this->template->folder . '.product', compact('product'));
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        if ($search != null) {
            $product = Product::get()
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('varian', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')->get();
            return view('store.product', compact('product'));
        } else {
            $product = Product::get()
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('varian', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')->get();
            Session::flash("error", "Data not Found!");
            return view('store.product', compact('product'));
        }
    }

    public function aboute()
    {
        return view('templates.' . $this->template->folder . '.about');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('templates.' . $this->template->folder . '.contact');
    }
    public function cart()
    {
        $carts = Product::All();
        return view('templates.' . $this->template->folder . '.cart', compact('carts'));
    }
    public function checkout()
    {
        return view('templates.' . $this->template->folder . '.checkout');
    }
    public function detail($id)
    {
        $detail = Product::find($id);
        return view('templates.' . $this->template->folder . '.product_detail', compact('detail'));
    }
}
