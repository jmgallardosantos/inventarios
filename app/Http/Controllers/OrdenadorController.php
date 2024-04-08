<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrdenadorRequest;
use App\Http\Requests\UpdateOrdenadorRequest;
use App\Models\Aula;
use App\Models\Ordenador;

class OrdenadorController extends Controller
{   /**
    * Create the controller instance.
    */
   public function __construct()
   {
       $this->authorizeResource(Ordenador::class, 'ordenador');
   }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ordenadores.index', [
            'ordenadores' => Ordenador::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ordenadores.create', [
            'ordenadores' => Ordenador::all(),
            'aulas' => Aula::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrdenadorRequest $request)
    {

        $validated = $request->validated();
        $ordenador = new Ordenador();
        $ordenador->marca = $validated['marca'];
        $ordenador->modelo = $validated['modelo'];
        $ordenador->aula_id = $validated['aula_id'];
        $ordenador->save();
        session()->flash('success', 'El ordenador se ha creado correctamente.');
        return redirect()->route('ordenadores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ordenador $ordenador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordenador $ordenador)
    {

            return view('ordenadores.edit', [
                'ordenador' => $ordenador,
                'aulas' => Aula::all(),
            ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdenadorRequest $request, Ordenador $ordenador)
    {
        $validated = $request->validated();
        $ordenador->marca = $validated['marca'];
        $ordenador->modelo = $validated['modelo'];
        $ordenador->aula_id = $validated['aula_id'];
        $ordenador->save();
        session()->flash('success', 'El ordenador se ha modificado correctamente.');
        return redirect()->route('ordenadores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordenador $ordenador)
    {
        $ordenador->delete();
        return redirect()->route('ordenadores.index');
    }
}
