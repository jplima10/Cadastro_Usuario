<?php

namespace App\Http\Controllers;

use App\ContatoPessoa;
use Illuminate\Http\Request;

class ContatoPessoaController extends Controller
{
    public function index()
    {
        $contatos = ContatoPessoa::all();
        return view('cadastro.index', compact('contatos'));
    }

    public function create()
    {
        return view('cadastro.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
        ]);

        ContatoPessoa::create($request->all());

        return redirect()->route('cadastro.index')->with('success', 'Contato criado com sucesso!');
    }

    public function show($id)
    {
        $contato = ContatoPessoa::findOrFail($id);
        return view('cadastro.show', compact('contato'));
    }

    public function edit($id)
    {
        $contato = ContatoPessoa::findOrFail($id);
        return view('cadastro.edit', compact('contato'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
        ]);

        $contato = ContatoPessoa::findOrFail($id);
        $contato->update($request->all());

        return redirect()->route('cadastro.index')->with('success', 'Contato atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $contato = ContatoPessoa::findOrFail($id);
        $contato->delete();

        return redirect()->route('cadastro.index')->with('success', 'Contato deletado com sucesso!');
    }
}
