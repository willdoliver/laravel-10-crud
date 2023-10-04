@extends('base')

@extends('menu')
@section('menu')
    @yield('menu')
@endsection

@section('content')

<h2>Especialidades</h2>

@if (session()->has('message'))
    <div class="success">
        {{ session()->get('message') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="error">
        {{ session()->get('error') }}
    </div>
@endif

<a href="{{ route('especialidades.create') }}" class="btn btn-primary">
    Cadastrar Especialidade
</a>

<hr>

<form action="/especialidades" method="get">
    <input type="text" name="search" id="search" class="form-control" placeholder="Procurar Especialidade">
</form>

@if ($search)
    <div class="search">
        Termo Pesquisado: "{{ $search }}"
    </div>
@endif

<table>
    <tr>
        <th>Nome</th>
        <th>Qtd Dentistas</th>
        <th>Ações</th>
    </tr>
    @forelse($especialidades as $especialidade)
        <tr>
            <td> {{ $especialidade->nome }} </td>
            <td> {{ count($especialidade->dentistas) }} </td>
            <td>
                <a href="{{ route('especialidades.edit',['especialidade' => $especialidade->id])}}" class="btn btn-warning">Editar</a>
                <a href="{{ route('especialidades.delete',['especialidade' => $especialidade->id])}}" class="btn btn-danger">Deletar</a>
            </td>
        </tr>
    @empty
        Nenhum registro encontrado
    @endforelse
</table>
{{ $especialidades->links("pagination::bootstrap-4") }}

@endsection
