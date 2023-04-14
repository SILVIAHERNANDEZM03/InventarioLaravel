@extends('layouts.app')
@section('content')

<div class="container">
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Formulario editar stock de productos</h5>
        <a href="{{route('stocks.index')}}" class="btn btn-primary ml-auto">
        <i class="fas fa-arrow-left"></i>
            Volver
            </a>
    </div>
    <div class="card-body">
        <form action="{{route('stocks.update', $stock->idStock)}}" method="POST" enctype="multipart/form-data" id="create">
        @method('PUT')
        @include('stocks.partials.form')
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