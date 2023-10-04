@extends('base')

@extends('menu')
@section('menu')
    @yield('menu')
@endsection

@section('content')

<h2>Deletar Dentista</h2>

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
    <form action="{{ route('dentistas.destroy', ['dentista' => $dentista->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <tr>
            <td>Nome</td>
            <td><input type="text" name="name" value="{{ $dentista->name }}" disabled></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="{{ $dentista->email }}" disabled></td>
        </tr>
        <tr>
            <td>CRO</td>
            <td><input type="text" name="cro" value="{{ $dentista->cro }}" disabled></td>
        </tr>
        <tr>
            <td>CRO UF</td>
            <td><input type="text" name="cro_uf" value="{{ $dentista->cro_uf }}" disabled></td>
        </tr>
        <tr>
            <td>Especialidades</td>
            <td><select name="especialidades[]" id="especialidades" multiple="multiple" disabled>
                    @foreach($dentista->especialidades as $especialidade)
                        <option value="{{ $especialidade->id }}">{{$especialidade->nome}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <button type="submit" class="btn btn-danger">Deletar</button>
    </form>
</table>

@endsection
