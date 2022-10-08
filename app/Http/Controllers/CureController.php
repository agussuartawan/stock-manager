<?php

namespace App\Http\Controllers;

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
            'route' => 'cures.create',
            'cure_type' => CureType::pluck('name', 'id'),
            'cure_unit' => CureUnit::pluck('name', 'id'),
            'rack' => Rack::pluck('name', 'id'),
            'title' => 'Tambah Obat',
            'breadcumb' => 'Tambah'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'method' => 'POST',
            'route' => 'cures.create',
            'cure_type' => CureType::pluck('name', 'id'),
            'cure_unit' => CureUnit::pluck('name', 'id'),
            'rack' => Rack::pluck('name', 'id'),
            'title' => 'Edit Obat',
            'breadcumb' => 'Edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
