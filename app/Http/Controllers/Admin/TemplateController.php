<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Template;
use App\User;
use Session; 
use DB;
use View;
use App\Notif;


class TemplateController extends Controller
{
    public function __construct()
    {
        view::share('notifs', Notif::all());
    }
    public function index()
    {
        $template = Template::paginate(10);
        
        return view('dashboard.template.index', compact('template'));
    }
    public function select($id)
    {
        // Panggil Database Table yang bernama Tempaltes dan cari data Selected 1 dan rubah menjadi
        //  Selected 0 dan Fungsi update() berguna langsung menyimpan
        $template = DB::table('templates')->where('selected', '1')->update(['selected'=>'0']);

        $template = Template::where('id', $id)->first();
        $template-> selected = '1';
        $template->save();
        Session::flash('success', 'berhasil merubah template');
        return back();
    }
    
}
