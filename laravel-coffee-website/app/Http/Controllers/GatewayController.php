<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GatewayController extends Controller
{
    public  function door()
    {
        if(Auth::id())
        {
            $role=Auth()->user()->role;
            if($role=='user')
            {
                return view ('index_kopi');
            }
            else if($role=='admin')
            {
                return view ('admin.main');
            }
            else
            {
                return redirect()->back();
            }
        }
    }
}
