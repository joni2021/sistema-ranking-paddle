<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu" id="side-nav">

        <li class="menu-title">Main</li>

        <li>
            <a href="javascript: void(0);"><i class="fal fa-user-chart"></i>  <span>Ranking</span></a>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="fal fa-tennis-ball"></i>  <span>Canchas</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route("courts.index") }}">Listado</a></li>
                <li><a href="{{ route("courts.create") }}">Agregar nueva</a></li>

                <li><a href="javascript: void(0);">Disponibilidad</a></li>
                <li><a href="{{ route("reservations.index") }}">Reservas</a></li>
                <li><a href="{{ route("reservations.reserve") }}">Reservar cancha</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="fas fa-trophy"></i>  <span>Partidos</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route("matches.index") }}">Listado</a></li>
                <li><a href="{{ route("matches.create") }}">Agregar nuevo</a></li>
            </ul>
        </li>



    </ul>
</div>
