<?php

namespace App\Http\Controllers;

use App\Http\Resources\VarianResource;
use App\Models\Varian;
use Illuminate\Http\Request;

class VarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $varian = Varian::all();

        return VarianResource::collection($varian->loadMissing('produk:id,nama_produk'));
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
            "id_produk" => "required",
            "warna" => "required",
            "foto" => "required",
        ]);

        $varian = new Varian();
        $varian->id_produk = $request->id_produk;
        $varian->warna = $request->warna;
        $varian->foto = $request->foto;

        $varian->save();

        return new VarianResource($varian);
    }

    /**
     * Display the specified resource.
     */
    public function show(Varian $varian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Varian $varian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "id_produk" => "required",
            "warna" => "required",
            "foto" => "required",
        ]);

        $varian = Varian::findOrFail($id);
        $varian->id_produk = $request->id_produk;
        $varian->warna = $request->warna;
        $varian->foto = $request->foto;

        $varian->update();

        return new VarianResource($varian);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $varian = Varian::findOrFail($id);

        $varian->delete();

        return new VarianResource($varian);
    }
}
