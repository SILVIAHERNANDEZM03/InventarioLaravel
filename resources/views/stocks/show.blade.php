@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Formulario ver stock de productos id: {{$stock->idStock}}</h5>
            <a href="{{route('stocks.index')}}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('stocks.store')}}" method="POST" enctype="multipart/form-data" id="create">
                @include('stocks.partials.form')
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>
@endsection