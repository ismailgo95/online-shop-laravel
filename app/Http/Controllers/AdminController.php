<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notif;
use View;
use Auth;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        view::share('notifs',Notif::all());
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notifs = Notif::all();
        return view('dashboard.index', compact('notifs'));
    }

    public function product()
    {
        return view('dashboard.a_product');
    }

    public function tabel()
    {
        return view('dashboard.a_tabel');
    }

    public function toko()
    {
        return view('dashboard.a_toko');
    }

    public function diskon()
    {
        return view('dashboard.a_diskon');
    }
}
