<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ingredient;
use App\Models\Kopi;
use Illuminate\Support\Facades\Auth;

class IngredientController extends Controller
{
    public function index()
    {
        // $bahan_bahan = Ingredient::all();
        $bahan_bahan = Ingredient::orderBy('nama_bahan', 'asc')->get();
        $kopi = Kopi::all();
        $unique_ingredient = Ingredient::select('nama_bahan')->distinct()->get();
        return view('admin.ingredient_kopi.ingredient', compact('bahan_bahan', 'kopi', 'unique_ingredient'));
    }

    public function add(Request $request)
    {
        Ingredient::create([
            'kopi_id' => $request->nama_kopi,
            'nama_bahan' => $request->bahan,
        ]);
        return redirect()->back()->with('success', 'Berhasil tambah data');
    }

    // Method untuk mengupdate data rasa kopi
    public function update(Request $request, $id)
    {
        $bahankopi = Ingredient::findOrFail($id);
        $bahankopi->nama_bahan = $request->bahan;
        $bahankopi->kopi_id = $request->nama_kopi;
        $bahankopi->save();

        return redirect()->back()->with('success', 'Data Jenis kopi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $bahan_kopi = Ingredient::find($id);
        $bahan_kopi->delete();
        return redirect()->back();
    }

    public function update_stok_bahan(Request $request)
    {
        $status = $request->input('status');
        $namaBahan = $request->input('nama_bahan');
        Ingredient::where('nama_bahan', $namaBahan)->update(['available' => $status]);
        
        return response()->json(['message' => 'Ingredient updated successfully.']);
    }
}
