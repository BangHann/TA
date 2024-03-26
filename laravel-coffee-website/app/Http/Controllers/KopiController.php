<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kopi;

class KopiController extends Controller
{
    public function index()
    {
        $kopi = Kopi::all();
        return view('index_kopi', compact('kopi'));
    }

    public function dashboard()
    {
        // $kopi = Kopi::all();
        return view('admin/main');
    }

    public function datakopiadmin()
    {
        $kopi = Kopi::all();
        return view('admin/datakopi/index', compact('kopi'));
    }
}
