<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;

class EspecialidadeController extends Controller
{
    public readonly Especialidade $especialidade;

    public function __construct() {
        $this->especialidade = new Especialidade();
    }

    public function index() {
        $numItems = 5;

        $search = request('search');

        if ($search) {
            $especialidades = $this->especialidade->where([
                ['nome', 'like', '%'.$search.'%']
            ])->paginate($numItems);
        } else {
            $especialidades = $this->especialidade->paginate($numItems);
        }

        return view('especialidades',['especialidades' => $especialidades, 'search' => $search]);
    }

    public function create() {
        return view('especialidade_create');
    }

    public function store(Request $request) {
        $created = $this->especialidade->create([
            'nome' => $request->input('nome')
        ]);

        if ($created) {
            return redirect()->back()->with('message', 'Cadastrada com sucesso');
        }
        return redirect()->back()->with('error', 'Erro ao cadastrar');
    }

    public function show(Especialidade $especialidade) {
        return view('especialidade_detail', ['especialidade' => $especialidade]);
    }

    public function edit(Especialidade $especialidade) {
        return view('especialidade_edit', ['especialidade' => $especialidade]);
    }

    public function update(Request $request, String $id) {
        $updated = $this->especialidade->where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->back()->with('message', 'Atualizada com sucesso');
        }
        return redirect()->back()->with('error', 'Erro ao atualizar');
    }

    public function delete(Especialidade $especialidade) {
        return view('especialidade_delete', ['especialidade' => $especialidade]);
    }

    public function destroy(String $id) {
        $deleted = $this->especialidade->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('especialidades.index')->with('message', 'Deletada com sucesso');
        }
        return redirect()->back()->with('error', 'Erro ao deletar');
    }
}