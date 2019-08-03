<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use App\Notif;

class PageController extends Controller
{
    public function __construct()
    {
        view::share('notifs', Notif::all());
        $this->middleware('admin');
    }
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::get();
        return view('dashboard.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul'=>'required',
            'content'=>'required'
        ]);

        $pages = new Page;
        $pages->judul = $request->input("judul");
        $pages->content =  $request->input("content");
        $pages->save();

        return redirect()->to("dashboard/pages");
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
        $pages = Page::find($id);
        return view('dashboard.pages.edit', compact('pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul'=>'required',
            'content'=>'required'
        ]);

        $judul = $request->input("judul");
        $content = $request->input("content");

        $page = Page::find($id) ;
        $page->judul = $request->input('judul');
        $page->content = $request->input('content');
        $page->save();

        return redirect()->to("dashboard/pages");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = Page::find($id)->delete() ;
        return back();
    }
}
