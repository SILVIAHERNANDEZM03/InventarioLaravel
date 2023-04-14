@extends('layouts.app')
@section('content')

<div class="container">
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Salidas</h5>
        <a href="{{route('salidas.create')}}" class="btn btn-primary ml-auto">
            <i class="fas fa-plus"></i>
            Agregar
        </a>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <a class="navbar-brand">Listar</a>
                    <select class="custom-select" id="limit" name="limit">
                        @foreach([10,20,50,100] as $limit)
                        <option value="{{$limit}}" @if(isset($_GET['limit']))
                            {{($_GET['limit']==$limit)?'selected': ''}}@endif>{{$limit}}</option>
                        @endforeach
                    </select>

                    <?php
                        if(isset($_GET['page'])){
                            $pag=$_GET['page'];
                        }else{
                            $pag=1;
                        }
                        if(isset($_GET['limit'])){
                            $limite=$_GET['limit'];
                        }else{
                            $limite=10;
                        }
                        $comienzo=$limite*($pag-1);
                        ?>

                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <a class="navbar-brand">Buscar</a>
                    <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search"
                        aria-label="Search" value="{{ (isset($_GET['search']))?$_GET['search']:'' }}">
                </div>
            </div>
            @if($salidas->total() > 10)
            {{$salidas->links()}}
            @endif
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Id Producto</th>
                        <th scope="col">Fecha de Salida</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        $valor=1;
            if($pag!=1){
                 $valor=$comienzo+1;
            }
    ?>
                    @foreach($salidas as $salida)
                    <tr>
                        <th scope="row">{{$valor++}}</th>
                        <td>{{ $salida->idSalida}}</td>
                        <td>{{ $salida->idProducto}}-{{$salida->producto->nombre}}</td>
                        <td>{{ $salida->fechaSalida}}</td>
                        <td>{{ $salida->cantidad}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('salidas.show', $salida->idSalida)}}" class="btn btn-info"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{route('salidas.edit', $salida->idSalida)}}" class="btn btn-primary"><i
                                        class="fas fa-pencil-alt"></i></a>
                                <button type="submit" class="btn btn-danger" form="delete_{{$salida->idSalida}}"
                                    onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <form action="{{route('salidas.destroy', $salida->idSalida)}}"
                                    id="delete_{{$salida->idSalida}}" method="post" enctype="multipart/form-data"
                                    hidden>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>


        </div>

    </div>
    <div class="card-footer">
        @if($salidas->total() > 10)
        {{$salidas->links()}}
        @endif

    </div>

</div>
        </div>
@endsection

@section('scripts')
<Script type="text/javascript">
$('#limit').on('change', function() {
    window.location.href = "{{ route('salidas.index')}}?limit=" + $(this).val() + '&search=' + $('#search')
        .val()
})

$('#search').on('keyup', function(e) {
    if (e.keyCode == 13) {
        window.location.href = "{{ route('salidas.index')}}?limit=" + $('#limit').val() + '&search=' + $(this)
            .val()
    }
})
</Script>
@endsection