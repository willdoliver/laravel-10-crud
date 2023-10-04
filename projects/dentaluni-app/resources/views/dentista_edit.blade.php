@extends('base')

@extends('menu')
@section('menu')
    @yield('menu')
@endsection

@section('content')

<h2>Editar Dentista</h2>

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

<table class="edition-table">
    <form action="{{ route('dentistas.update', ['dentista' => $dentista->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <tr>
            <td>Nome</td>
            <td><input type="text" name="name" value="{{ $dentista->name }}" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="{{ $dentista->email }}" required></td>
        </tr>
        <tr>
            <td>CRO</td>
            <td><input type="text" name="cro" value="{{ $dentista->cro }}" required></td>
        </tr>
        <tr>
            <td>CRO UF</td>
            <td><input type="text" name="cro_uf" value="{{ $dentista->cro_uf }}" required></td>
        </tr>
        <tr>
            <td>Especialidades</td>
            <td><select name="especialidades[]" id="especialidades" multiple="multiple">
                    @foreach($especialidades as $especialidade)
                        @if (in_array($especialidade->id, array_values($dentista->especialidades->pluck('id')->toArray())))
                            <option value="{{ $especialidade->id }}" selected="selected">{{$especialidade->nome}}</option>
                        @else
                            <option value="{{ $especialidade->id }}">{{$especialidade->nome}}</option>
                        @endif
                    @endforeach
                </select>
            </td>
        </tr>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</table>

@endsection
