<?php

namespace App\Http\Controllers\Admin;

use App\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Notif;
use View;

class CategorieController extends Controller
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
        $list_categories = Categorie::paginate(5);
        return view("dashboard.Categorie.index", compact('list_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('dashboard.Categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:20'
        ]);
        $categorie = new Categorie;
        $categorie->name = $request->input("name");
        $categorie->save();
        Session::flash("success", "berhasil Menambah Categorie");
        return redirect()->to('dashboard/categorie')->withInput();
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
        $categorie = Categorie::find($id);
        return view('dashboard.Categorie.edit', compact('categorie'));
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
        $categorie = Categorie::find($id);
        $categorie->name = $request->input("name");
        $categorie->status = $request->input("status");

        $this->validate($request, [
            'name' => 'required|string|max:100',
            'status' => 'required|string|max:10'
        ]);

        $categorie->save();
        Session::flash("success", "berhasil Merubah Categorie");
        return redirect()->to("dashboard/categorie");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorie::find($id)->delete();
        Session::flash("success", "berhasil Menghapus Categorie");
        return redirect()->to("dashboard/categorie");
    }
}
