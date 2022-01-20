<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Contato;
use Illuminate\Http\Request;

class EnderecoController extends Controller
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
        return view('contatos.enderecos.create', compact('contato'));
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
            'bairro' => ['required', 'max:255', 'min:3'],
            'cidade' => ['required', 'max:255', 'min:3'],
            'estado' => ['required', 'max:255', 'min:3'],
            'cep' => ['required', 'max:9', 'min:8'],
            'logradouro' => ['required', 'max:255', 'min:3'],
            'numero' => ['required', 'max:10'],
            'complemento' => ['max:255'],
            'descricao' => ['max:255'],
        ]);

        $contato->enderecos()->create($validated);

        return redirect()->route('contatos.show', $contato);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show(Contato $contato, Endereco $endereco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $contato, Endereco $endereco)
    {
        return view('contatos.enderecos.edit', compact('endereco', 'contato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $contato, Endereco $endereco)
    {
        $validated = $request->validate([
            'bairro' => ['required', 'max:255', 'min:3'],
            'cidade' => ['required', 'max:255', 'min:3'],
            'estado' => ['required', 'max:255', 'min:3'],
            'cep' => ['required', 'max:9', 'min:8'],
            'logradouro' => ['required', 'max:255', 'min:3'],
            'numero' => ['required', 'max:10'],
            'complemento' => ['max:255'],
            'descricao' => ['max:255'],
        ]);

        $endereco->update($validated);

        return redirect()->route('contatos.show', $contato);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contato $contato, Endereco $endereco)
    {
        $endereco->delete();
        return redirect()->back();
    }
}
