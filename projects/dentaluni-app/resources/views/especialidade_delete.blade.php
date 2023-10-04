@extends('base')

@extends('menu')
@section('menu')
    @yield('menu')
@endsection

@section('content')

<h2>Deletar Especialidade</h2>

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

<form action="{{ route('especialidades.destroy', ['especialidade' => $especialidade->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="text" name="nome" value="{{ $especialidade->nome }}" disabled>
    <button type="submit" class="btn btn-danger">Deletar</button>
</form>

@endsection