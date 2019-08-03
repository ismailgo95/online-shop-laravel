<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sale;
use Session;
use DB;
use PDF;
use App\SaleItem;
use View;
use App\Notif;
use App\Product;
use Auth;
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        view::share('notifs', Notif::all());
    }
    public function index()
    {
        $sales = Sale::orderBy("id", "ASC")->paginate(5);;
        return view('dashboard.saleitem.index', compact('sales'));
    }
    public function detail($id)
    {
        $sales = Sale::find($id);
        return view('dashboard.saleitem.detail', compact('sales'));
        
    }
    public function status($id)
    {
        $sale = Sale::find($id);
        return view( 'dashboard.saleitem.status', compact('sale'));
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::find($id);
        $sale->status = $request->input("status");
        $sale->save();
        return redirect()->to('/dashboard/saleitem');
    }
    public function cetak($id)
    {
        $saleitem = SaleItem::find($id);
        $pdf = PDF::loadView('dashboard.saleitem.cetak', compact('saleitem'));
        return $pdf->download('laporan.pdf');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $sales = DB::table('sales')
            ->where('nama', 'like', "%" . $search . "%")
            ->orWhere('email', 'like', "%" . $search . "%")
            ->orWhere('phone', 'like', "%" . $search . "%")
            ->paginate(5);
        return view('dashboard.saleitem.index', compact('sales'));
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sale::find($id)->delete();
        Session::flash("success", "Data Berhasil Dihapus !");
        return back();

    }
}
