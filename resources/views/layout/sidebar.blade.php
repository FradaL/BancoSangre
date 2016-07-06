<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="{{ asset('assets/img/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>
            <h5 class="centered">{{"Bienvenid@" }} <br> </h5>
            <h5 class="centered">{{Auth::user()->name . " " . Auth::user()->lastname}}</h5>
            <li class="mt tech">
                <a  href="{{ route('dash') }}" >
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="mt tech">
                <a href="{{ route('list.donor') }}" >
                    <i class="fa fa-users"></i>
                    <span>Donantes</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-desktop"></i>
                    <span>Unidades</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('unit.list') }}">General</a></li>
                    <li><a  href="{{ route('unit.sales') }}">Despacho de Unidades</a></li>
                    <li><a  href="{{ route('search.group') }}">Emparejamiento</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>Configuración</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('config.edit') }}">Configuración General</a></li>
                    <li><a  href="{{ route('warehouse.list')}}">Almacenes</a></li>
                    <li><a  href="{{ route('freezer.list') }}">Congeladores</a></li>

                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>


<!--sidebar end-->