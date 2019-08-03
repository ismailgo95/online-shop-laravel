<?php

namespace App\Http\Controllers;
use Auth;
use App\Product;
use App\Carts;
use Session;
use App\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function index()
    {
        $user = User::all();
        $carts = Carts::all();
        $totals = Carts::where('user_id', Auth::user()->id)->selectRaw('SUM(price * qty) AS total')->first();
        return view("templates.template_ismail.cart", compact('carts','user','totals'));      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $product = $request->input('id');
            $products = Product::find($product);
            $cart = Carts::where('product_id', $product)->first();
            // Opsi barang ada
            if ($cart) {
                $cart->qty = $cart->qty + 1;
                $cart->save();

                $products->stock = $products->stock - $cart->qty;
                $products->save();
                
                Session::flash("success", "berhasil Berhasil ditambah");
                return redirect()->to("/products");
            } else {
                // Opsi Kalo sudah tidak ada barang sama
                $user = Auth::user();
                $carts = new Carts;
                $carts->user_id = $user->id;
                $carts->product_id = $product;
                $carts->image = $products->image;
                $carts->name = $products->name;
                $carts->qty = 1;
                $carts->price = $products->price;
                $carts->save();

                $carts->products = $products->stock - $carts->qty;
                $products->save();

                Session::flash("success", "Barang Baru Berhasil Disimpan");
                return redirect()->to("/products");
            }
        }else{
            return redirect()->to('/login');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Carts = Carts::find($id);
        return view("/cart", compact('Carts'));
    }

    public function rubahqty(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
            'qty' => 'required|integer'
        ]);

        $id = $request->input('id');
        $Cart = Carts::find($id);
        $Cart->qty = $request->input("qty");
        $Cart->save();
        return back();
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Carts::find($id)->delete();
        Session::flash("success", "berhasil Menghapus Barang");
        return redirect()->to("/cart");
    }
}
