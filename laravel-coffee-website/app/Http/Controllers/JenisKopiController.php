<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKopi;
use App\Models\Kopi;
use App\Models\Cart;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class JenisKopiController extends Controller
{
    public function index()
    {
        $jeniskopi = JenisKopi::all();
        $kopi = Kopi::all();
        return view('admin.jenis_kopi', compact('jeniskopi', 'kopi'));
    }

    public function add(Request $request)
    {
        JenisKopi::create([
            'kopi_id' => $request->nama_kopi,
            'nama_jenis' => $request->jenis,
        ]);
        return redirect()->back()->with('success', 'Berhasil tambah data');
    }

    // Method untuk mengupdate data rasa kopi
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'rasa' => 'required|string|max:255',
        //     'nama_kopi' => 'required|exists:kopi,id',
        // ]);

        $jeniskopi = JenisKopi::findOrFail($id);
        $jeniskopi->nama_jenis = $request->jenis;
        $jeniskopi->kopi_id = $request->nama_kopi;
        $jeniskopi->save();

        return redirect()->back()->with('success', 'Data Jenis kopi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $jenis_kopi = JenisKopi::find($id);
        $jenis_kopi->delete();
        return redirect()->back();
    }
}