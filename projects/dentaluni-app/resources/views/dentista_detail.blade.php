@extends('base')

@extends('menu')
@section('menu')
    @yield('menu')
@endsection

@section('content')

<h2>Detalhes Dentista</h2>

<table>
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>CRO</th>
        <th>CRO UF</th>
        <th>Qtd Especialidades</th>
    </tr>
    <tr>
        <td> {{ $dentista->name }} </td>
        <td> {{ $dentista->email }} </td>
        <td> {{ $dentista->cro }} </td>
        <td> {{ $dentista->cro_uf }} </td>
        <td> {{ count($dentista->especialidades) }} </td>
    </tr>
</table>


<table class="especialidades">
    <tr>
        <th>Especialidades</th>
    </tr>
    @foreach($dentista->especialidades as $especialidade)
        <tr>
            <td> {{ $especialidade->nome }} </td>
        </tr>
    @endforeach
</table>

@endsection