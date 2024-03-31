<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RasaKopi;

class RasaKopiController extends Controller
{
    public function index()
    {
        $rasakopi = RasaKopi::all();
        return view('admin.rasakopi.list_rasa', compact('rasakopi'));
    }
}
