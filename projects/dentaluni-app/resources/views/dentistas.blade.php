@extends('base')

@extends('menu')
@section('menu')
    @yield('menu')
@endsection

@section('content')

<h2>Dentistas</h2>

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

<a href="{{ route('dentistas.create') }}" class="btn btn-primary">
    Cadastrar Dentista
</a>

<hr>

<form action="/dentistas" method="get">
    <input type="text" name="search" id="search" class="form-control" placeholder="Procurar Dentistas">
</form>

@if ($search)
    <div class="search">
        Termo Pesquisado: "{{ $search }}"
    </div>
@endif

<table>
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Qtd Especialidades</th>
        <th>Ações</th>
    </tr>
    @forelse($dentistas as $dentista)
        <tr>
            <td> {{ $dentista->name }} </td>
            <td> {{ $dentista->email }} </td>
            <td> {{ count($dentista->especialidades) }} </td>
            <td>
                <a href="{{ route('dentistas.show', ['dentista' => $dentista->id])}}" class="btn btn-primary table-button">Detalhes</a>
                <a href="{{ route('dentistas.edit',['dentista' => $dentista->id])}}" class="btn btn-warning table-button">Editar</a>
                <a href="{{ route('dentistas.delete',['dentista' => $dentista->id])}}" class="btn btn-danger table-button">Deletar</a>
            </td>
        </tr>
    @empty
        Nenhum registro encontrado
    @endforelse
</table>

<div class="row">
    {{ $dentistas->links("pagination::bootstrap-4") }}
</div>

@endsection
