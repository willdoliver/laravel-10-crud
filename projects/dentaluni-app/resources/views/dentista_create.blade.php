@extends('base')

@extends('menu')
@section('menu')
    @yield('menu')
@endsection

@section('content')

<h2>Cadastrar Dentista</h2>

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

<form action="{{ route('dentistas.store') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nome" required>
    <input type="text" name="email" placeholder="Email" required>
    <input type="text" name="cro" placeholder="Numero CRO" required>
    <input type="text" name="cro_uf" placeholder="UF CRO" required>
    <br><br>
    Especialidades:
    <br>
    <select name="especialidades[]" id="especialidades" multiple="multiple">
        @foreach($especialidades as $especialidade)
            <option value="{{ $especialidade->id }}">{{$especialidade->nome}}</option>
        @endforeach
    </select>
    <br>
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>

@endsection