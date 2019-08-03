<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Sale;
use App\SaleItem;
use App\Carts;
use App\Notif;
use Session;

class SaleController extends Controller
{
    
    public function store(Request $request) {
        $this->validate($request, [
            'nama' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'alamat' => 'required',
            'bank' => 'required'
        ]);
        // simpan ke Sale
        $user = Auth::user();
        $sale = new Sale;
        $sale->user_id = $user->id;
        $sale->nama = $request->input("nama");
        $sale->email = $request->input("email");
        $sale->phone = $request->input("phone");
        $sale->alamat = $request->input("alamat");
        $sale->bank = $request->input('bank');
        $sale->save();

        // simpan ke SaleItem
        $user = Auth::user();
        $carts = Carts::where('user_id', $user->id)->get();
        $array = array();
        foreach ($carts as $cart) {
            $array[] = array(
                'product_id' => $cart->product_id,
                'sale_id' => $sale->id,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            );
        }
        SaleItem::insert($array);
        $carts = Carts::where('user_id', $user->id)->delete();

        // simpan Notif
        $user = Auth::user();
        $sales = Sale::where('user_id', $user->id)->first();
        $notif = new Notif;
        $notif->user_id = $user->id;
        $notif->sale_id = $sales->id;
        $notif->pesan = 'Berhasil Beli Barang';
        $notif->status = 'unread';
        $notif->save();
        return redirect()->to('sale/thanks');
        
    }
    public function thanks()
    {
        return view('templates.template_ismail.thanks');
    }
    
    public function hapus()
    {
       echo "Load";
    }

}
