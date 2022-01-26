<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contatos.index');
    }

    public function datatable(DataTables $dataTables, Request $request)
    {
        $query = Contato::query()
            ->withCount('telefones', 'enderecos');

        if($request->filled('busca')) {
            $query->where('nome', 'like', "%{$request->busca}%");
        }

        return $dataTables->eloquent($query)
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => ['required','min:5', 'max:100'],
            'sexo' => ['required', 'in:M,F,NB,', 'max:100'],
        ]);

        $contato = Contato::create($validated);

        return redirect()->route('contatos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show(Contato $contato)
    {
        $contato->load('telefones', 'enderecos');
        return view('contatos.show', compact('contato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $contato)
    {
        return view('contatos.edit', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $contato)
    {
        $validated = $request->validate([
            'nome' => ['required','min:5'],
            'sexo' => ['required', 'in:M,F,NB,'],
        ]);

        $contato->fill($validated);
        $contato->save();

        return redirect()->route('contatos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contato $contato)
    {
        $contato->delete();
        return redirect()->back();
    }
}
