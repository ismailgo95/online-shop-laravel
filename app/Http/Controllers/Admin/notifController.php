<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notif;

class notifController extends Controller
{
    public function read($id)
    {
        $read = Notif::find($id);
        $read->status = 'read';
        $read->save();
        return redirect()->to("dashboard/product");
    }
}
