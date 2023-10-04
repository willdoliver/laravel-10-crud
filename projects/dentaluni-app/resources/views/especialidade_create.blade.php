@extends('base')

@extends('menu')
@section('menu')
    @yield('menu')
@endsection

@section('content')

<h2>Cadastrar Especialidade</h2>

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

<form action="{{ route('especialidades.store') }}" method="post">
    @csrf
    <input type="text" name="nome" placeholder="Nome" required>
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>

@endsection