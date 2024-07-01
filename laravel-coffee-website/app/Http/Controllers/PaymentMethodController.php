<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $datas = PaymentMethod::all();
        return view('admin.payment_method', compact('datas'));
    }

    public function tambah(Request $request)
    {
        if ($request->hasFile('foto_qris')) {
            $image = $request->file('foto_qris');
            // get the extension
            $extension = $image->getClientOriginalExtension();
            // create a new file name
            $new_name = 'PaymentMethod_'.time().'.'.$extension;
            // move file to public/images and use $new_name
            $image->move(public_path('images'), $new_name);

            PaymentMethod::create([
                'jenis' => $request->jenis_payment,
                'nama' => $request->nama,
                'atas_nama' => $request->atas_nama,
                'nomor' => $request->nomor,
                'foto' => $new_name,
            ]);

            
        } else {
            PaymentMethod::create([
                'jenis' => $request->jenis_payment,
                'nama' => $request->nama,
                'atas_nama' => $request->atas_nama,
                'nomor' => $request->nomor,
            ]);
        }
        
        
        // Redirect ke rute /cart setelah item berhasil ditambahkan ke keranjang
        return redirect()->back()->with('success', 'Data berhasil diinputkan');
    }

    // Method untuk mengupdate datakopi
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'rasa' => 'required|string|max:255',
        //     'nama_kopi' => 'required|exists:kopi,id',
        // ]);

        if ($request->hasFile('gambar_kopi')) {
            $image = $request->file('gambar_kopi');
            // get the extension
            $extension = $image->getClientOriginalExtension();
            // create a new file name
            $new_name = 'PaymentMethod_'.time().'.'.$extension;
            // move file to public/images and use $new_name
            $image->move(public_path('images'), $new_name);

            $kopi = PaymentMethod::findOrFail($id);
            $kopi->jenis_kopi = $request->jenis_kopi;
            $kopi->stok = $request->stok_kopi;
            $kopi->harga = $request->harga_kopi;
            $kopi->deskripsi = $request->deskripsi ? $request->deskripsi : $kopi->deskripsi;
            $kopi->foto = $new_name;
            $kopi->save();
        } else{
            $kopi = PaymentMethod::findOrFail($id);
            $kopi->jenis_kopi = $request->jenis_kopi;
            $kopi->stok = $request->stok_kopi;
            $kopi->harga = $request->harga_kopi;
            $kopi->deskripsi = $request->deskripsi ? $request->deskripsi : $kopi->deskripsi;
            // $kopi->foto = $kopi->foto;
            $kopi->save();
        }

        return redirect()->back()->with('success', 'Data rasa kopi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $rasa_kopi = PaymentMethod::find($id);
        $rasa_kopi->delete();
        return redirect()->back();
    }
}
