@extends('layouts.app')
@section('content')

<div class="container">
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Formulario ver proveedores id: {{$proveedor->idProveedor}}</h5>
        <a href="{{route('proveedores.index')}}" class="btn btn-primary ml-auto">
        <i class="fas fa-arrow-left"></i>
            Volver
            </a>
    </div>
    <div class="card-body">
        <form action="{{route('proveedores.store')}}" method="POST" enctype="multipart/form-data" id="create">
            @include('proveedores.partials.form')
        </form>
    </div>
    <div class="card-footer">
        
    </div>
</div>
</div>
@endsection