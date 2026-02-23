<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function create()
    {
        return view('cadastrar');
    }
    public function store(Request $request)
    {
        $dados = $request->all();
        Empresa::create($dados);
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
        return redirect()->route('home.index')->with('msg', 'sucesso_cadastro');
    }

    public function index(Request $request)
    {
        $busca = $request->input('busca');
        $empresas = $busca
            ? Empresa::where('nome', 'LIKE', "%{$busca}%")->get()
            : Empresa::all();
        if ($request->ajax()) {
            return view('partials.lista_linhas', compact('empresas'))->render();
        }
        return view('pesquisar', compact('empresas', 'busca'));
    }

    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('editar', compact('empresa'));
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all());
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
        return redirect()->route('pesquisar')->with('msg', 'sucesso_atualizar');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $pessoa = Empresa::findOrFail($id);
        $pessoa->delete();
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
        return redirect()->route('pesquisar')->with('msg', 'sucesso_excluir');
    }
}
