<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kopi;
use App\Models\Cart;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KopiController extends Controller
{
    public function index()
    {
        $kopi = Kopi::all();

        // $cartCount = Cart::where('id_user', auth()->id())->count();
        $cartCount = Cart::where('id_user', auth()->id())->whereNull('transaksi_id')->count();
        // return view('layouts.nav_user', ['cartCount' => $cartCount]);
        return view('index_kopi', compact('kopi', 'cartCount'));
    }

    public function tambah(Request $request)
    {
        if ($request->hasFile('gambar_kopi')) {
            $image = $request->file('gambar_kopi');
            // get the extension
            $extension = $image->getClientOriginalExtension();
            // create a new file name
            $new_name = time().'.'.$extension;
            // move file to public/images and use $new_name
            $image->move(public_path('images'), $new_name);

            Kopi::create([
                'jenis_kopi' => $request->jenis_kopi,
                'stok' => $request->stok_kopi,
                'harga' => $request->harga_kopi,
                'deskripsi' => $request->deskripsi,
                'foto' => $new_name,
            ]);
        }
        
        // Redirect ke rute /cart setelah item berhasil ditambahkan ke keranjang
        return redirect()->back()->with('success', 'Item added to cart');
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
            $new_name = time().'.'.$extension;
            // move file to public/images and use $new_name
            $image->move(public_path('images'), $new_name);

            $kopi = Kopi::findOrFail($id);
            $kopi->jenis_kopi = $request->jenis_kopi;
            $kopi->stok = $request->stok_kopi;
            $kopi->harga = $request->harga_kopi;
            $kopi->deskripsi = $request->deskripsi ? $request->deskripsi : $kopi->deskripsi;
            $kopi->foto = $new_name;
            $kopi->save();
        } else{
            $kopi = Kopi::findOrFail($id);
            $kopi->jenis_kopi = $request->jenis_kopi;
            $kopi->stok = $request->stok_kopi;
            $kopi->harga = $request->harga_kopi;
            $kopi->deskripsi = $request->deskripsi ? $request->deskripsi : $kopi->deskripsi;
            // $kopi->foto = $kopi->foto;
            $kopi->save();
        }

        

        return redirect()->back()->with('success', 'Data rasa kopi berhasil diupdate.');
    }

    public function dashboard()
    {
        // $kopi = Kopi::all();
        $totalPrice = Transaksi::sum('total_price');
        $totalTransaksi = Transaksi::count();
        $totalUsers = User::count();

        return view('admin.main', compact('totalPrice', 'totalTransaksi', 'totalUsers'));
    }

    public function datakopiadmin()
    {
        $kopi = Kopi::all();
        return view('admin/datakopi/index', compact('kopi'));
    }

    public function detail($id)
    {
        $detail_kopi = Kopi::find($id);
        // $cartCount = Cart::where('id_user', auth()->id())->count();
        $cartCount = Cart::where('id_user', auth()->id())->whereNull('transaksi_id')->count();
        $tidakada_bukti_payment = Transaksi::where('id_user', auth()->id())->whereNull('bukti_payment')->first();
        return view('user.detailkopi', compact('detail_kopi', 'cartCount', 'tidakada_bukti_payment'));
    }

    public function hapus($id)
    {
        $kopi =Kopi::find($id);
        $kopi->delete();
        return redirect()->back();
    }
}
