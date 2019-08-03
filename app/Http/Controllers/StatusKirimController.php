<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Sale;
use Session;
use App\SaleItem;
use App\User;

class StatusKirimController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            $user = Auth::user();
            $sale = Sale::with('saleItem')->where('user_id',$user->id)->get();
            $price=0;
            if ($sale) {
                foreach($sale as $sl){
                    foreach ($sl->saleItem as $item) {
                        if ($sale->count()>1) {
                            // echo 'ok';
                        }else {
                            $price+= $item->price*$item->qty;
                        }
                    }
                }
            }
            // dd($sale->saleitem);
            return view('templates.template_ismail.status-kirim', compact('sale','price'));
        }else {
            return redirect()->to('/login');
        }
    }
    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'alamat' => 'required',
        ]);

        $sale = Sale::find($id);
        $sale->nama = $request->input('nama');
        $sale->email = $request->input('email');
        $sale->phone = $request->input('phone');
        $sale->alamat = $request->input('alamat');
        $sale->save();
        Session::flash("success", "berhasil Merubah Data");
        return back();
    }
    public function terimabarang($id)
    {
        $sale = Sale::find($id);
        $sale->status = 'Diterima';
        $sale->save();
        Session::flash("success", "berhasil Menerima Barang");
        return back();
    }

    public function hapus($id)
    {
        SaleItem::where('sale_id',$id)->delete();
        Sale::find($id)->delete();
        Session::flash("success", "berhasil Menghapus Barang");
        return back();
    }
    public function upload(Request $request)
    {
        //upload file to Folder storage
        $sale = $request->input('id');
        $upload = Sale::where('id', $sale)->first();
        $request->file('image')->move(public_path('bukti'), $upload->id . '.jpg');
        $upload->bukti = $upload->id . '.jpg';
        $upload->save();
        Session::flash("success", "Bukti Pembayaran Anda Akan Kami Proses !");
        return back();
    }
}
