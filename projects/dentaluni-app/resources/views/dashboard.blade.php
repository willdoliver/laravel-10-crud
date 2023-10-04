@extends('base')

@extends('menu')
@section('menu')
    @yield('menu')
@endsection

@section('content')
    <div class="flex justify-center">
        <h2>Bem vindo a Dental Uni</h2>
    </div>
    <!-- <div class="flex justify-center">
        <a style="text-decoration:underline;" href="{{ url('/dentistas') }}">Consultar Dentistas</a>
    </div>
    <div class="flex justify-center">
        <a style="text-decoration:underline;" href="{{ url('/especialidades') }}">Consultar Especialidades</a>
    </div> -->
@endsection
