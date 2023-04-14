@extends('layouts.app')
@section('content')

<div class="container">
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Formulario editar clientes</h5>
        <a href="{{route('clientes.index')}}" class="btn btn-primary ml-auto">
        <i class="fas fa-arrow-left"></i>
            Volver
            </a>
    </div>
    <div class="card-body">
        <form action="{{route('clientes.update', $cliente->idCliente)}}" method="POST" enctype="multipart/form-data" id="create">
        @method('PUT')
        @include('clientes.partials.form')
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" form="create">
        <i class="fas fa-pencil-alt"></i>
        Editar

        </button>
    </div>
</div>
<div>
@endsection