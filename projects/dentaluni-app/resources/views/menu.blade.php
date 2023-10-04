<div class="container">
    <nav class="top-menu-container">
        <ul>
            <li>
                <a href="/" 
                class="{{ request()->is('/') ? 'active':'' }}">Inicio</a>
            </li>
            <li>
                <a href="{{route('dentistas.index')}}" 
                class="{{ request()->is('dentista*') ? 'active':'' }}">Dentistas</a>
            </li>
            <li>
                <a href="{{route('especialidades.index')}}" 
                class="{{ request()->is('especialidade*') ? 'active':'' }}">Especialidades</a>
            </li>
        </ul>
    </nav>
</div>
<hr>