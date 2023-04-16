<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProdukResource;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();

        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama_produk" => "required",
            "id_kategori" => "required"
        ]);

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->id_kategori = $request->id_kategori;

        $produk->save();

        return new ProdukResource($produk->loadMissing('kategori:id,nama_kategori'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produks = Produk::findOrFail($id);
        return new ProdukResource($produks->loadMissing(['kategori:id,nama_kategori', 'varians:id,id_produk,warna,foto']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "nama_produk" => "required",
            "id_kategori" => "required"
        ]);

        $produk = Produk::findOrFail($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->id_kategori = $request->id_kategori;

        $produk->update();

        return new ProdukResource($produk->loadMissing('kategori:id,nama_kategori'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return new ProdukResource($produk->loadMissing('kategori:id,nama_kategori'));
    }
}
