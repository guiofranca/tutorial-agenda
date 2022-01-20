<?php

namespace App\Http\Controllers;

use App\Models\Telefone;
use App\Models\Contato;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contato $contato)
    {
        return view('contatos.telefones.create', compact('contato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contato $contato)
    {
        $validated = $request->validate([
            'numero' => ['required', 'max:50', 'min:8'],
        ]);

        $contato->telefones()->create($validated);

        return redirect()->route('contatos.show', $contato);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function show(Telefone $telefone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $contato, Telefone $telefone)
    {
        return view('contatos.telefones.edit', compact('contato', 'telefone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $contato, Telefone $telefone)
    {
        $validated = $request->validate([
            'numero' => ['required', 'max:50', 'min:8'],
        ]);

        $telefone->update($validated);

        return redirect()->route('contatos.show', $contato);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contato $contato, Telefone $telefone)
    {
        $telefone->delete();
        return redirect()->back();
    }
}
