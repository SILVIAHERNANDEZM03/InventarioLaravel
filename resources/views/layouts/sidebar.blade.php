    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>{{ config('app.name', 'Laravel') }}</h3>
                <strong>DES</strong>
            </div>

            <ul class="list-unstyled components">
                <li class="{{'home'==request()->path()?'active':''}}">
                    <a href="{{url('/home')}}" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <b>Home</b>
                    </a>
                </li>
                <li class="{{'proveedores'==Request::is('proveedores*')?'active':''}}">
                    <a href="{{route('proveedores.index')}}">
                        <i class="fas fa-handshake"></i>
                        <b>Proveedores</b>
                    </a>
                </li>
                <li class="{{'productos'==Request::is('productos*')?'active':''}}">
                    <a href="{{route('productos.index')}}">
                        <i class="fas fa-box-open"></i>
                        <b>Entrada productos</b>
                    </a>
                </li>
                <!-- <li class="{{'clientes'==Request::is('clientes*')?'active':''}}">
                    <a href="{{route('clientes.index')}}">
                        <i class="fas fa-users"></i>
                        <b>Clientes</b>
                    </a>
                </li> -->
                <li class="{{'entradas'==Request::is('entradas*')?'active':''}}">
                    <a href="{{route('entradas.index')}}">
                    <i class="fa fa-plus-square"></i>
                        <b>Stock</b>
                    </a>
                </li>

                <li class="{{'salidas'==Request::is('salidas*')?'active':''}}">
                    <a href="{{route('salidas.index')}}">
                    <i class="fa fa-minus-square"></i>
                        <b>Salidas</b>
                    </a>
                </li>

                <li class="{{'stocks'==Request::is('stocks*')?'active':''}}">
                    <a href="{{route('stocks.index')}}">
                    <i class='fas fa-archive'></i>
                        <b>Stocks</b>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <!--<div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                </div>
            </nav>

        </div>-->
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>


    <script type="text/javascript">
$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });
});
    </script>