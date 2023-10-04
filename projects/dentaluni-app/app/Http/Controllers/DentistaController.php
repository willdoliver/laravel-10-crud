<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dentista;
use App\Models\Especialidade;

class DentistaController extends Controller
{
    public readonly Dentista $dentista;

    public function __construct() {
        $this->dentista = new Dentista();
    }

    public function index() {
        $numItems = 5;

        $search = request('search');

        if ($search) {
            $dentistas = $this->dentista->where([
                ['name', 'like', '%'.$search.'%']
            ])->paginate($numItems);
        } else {
            $dentistas = $this->dentista->paginate($numItems);
            // $dentistas = $this->dentista->all();
        }

        return view('dentistas',['dentistas' => $dentistas, 'search' => $search]);
    }

    public function create() {
        $especialidades = Especialidade::all();
        return view('dentista_create', ['especialidades' => $especialidades]);
    }

    public function store(Request $request) {
        $created = $this->dentista->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'cro' => $request->input('cro'),
            'cro_uf' => $request->input('cro_uf')
        ]);
        
        if ($created) {
            // $dentista = Dentista::find($id);
            $especialidadesIds = $request->input('especialidades');
            $created->especialidades()->sync($especialidadesIds);

            return redirect()->back()->with('message', 'Cadastrado com sucesso');
        }
        return redirect()->back()->with('error', 'Erro ao cadastrar');
    }

    public function show(Dentista $dentista) {
        return view('dentista_detail', ['dentista' => $dentista]);
    }

    public function edit(Dentista $dentista) {
        $especialidades = Especialidade::all();
        return view('dentista_edit', ['dentista' => $dentista, 'especialidades' => $especialidades]);
    }

    public function update(Request $request, String $id) {
        $updated = $this->dentista->where('id', $id)->update($request->except(['_token', '_method', 'especialidades']));

        if ($updated) {
            $dentista = Dentista::find($id);
            $especialidadesIds = $request->input('especialidades');
            $dentista->especialidades()->sync($especialidadesIds);

            return redirect()->back()->with('message', 'Atualizado com sucesso');
        }
        return redirect()->back()->with('error', 'Erro ao atualizar');
    }

    public function delete(Dentista $dentista) {
        return view('dentista_delete', ['dentista' => $dentista]);
    }

    public function destroy(String $id) {
        $deleted = $this->dentista->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('dentistas.index')->with('message', 'Deletado com sucesso');
        }
        return redirect()->back()->with('error', 'Erro ao deletar');
    }
}