<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCureRequest;
use App\Http\Requests\UpdateCureRequest;
use App\Models\Cure;
use App\Models\CureType;
use App\Models\CureUnit;
use App\Models\Rack;
use Illuminate\Http\Request;

class CureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cure.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cure.form', [
            'cure' => new Cure(),
            'method' => 'POST',
            'route' => 'cures.store',
            'cure_type' => CureType::pluck('name', 'id'),
            'cure_unit' => CureUnit::pluck('name', 'id'),
            'rack' => Rack::pluck('name', 'id'),
            'title' => 'Tambah Obat',
            'breadcumb' => 'Tambah',
            'code' => Cure::getNextCode()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCureRequest $request)
    {
        Cure::create($request->validated());
        return to_route('cures.index')->with('success', 'Data obat berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cure $cure)
    {
        return view('cure.form', [
            'cure' => $cure,
            'method' => 'PUT',
            'route' => ["cures.update", $cure->id],
            'cure_type' => CureType::pluck('name', 'id'),
            'cure_unit' => CureUnit::pluck('name', 'id'),
            'rack' => Rack::pluck('name', 'id'),
            'title' => 'Edit Obat',
            'breadcumb' => 'Edit',
            'code' => null
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCureRequest $request, Cure $cure)
    {
        $cure->update($request->validated());
        return to_route('cures.index')->with('success', 'Data obat berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}