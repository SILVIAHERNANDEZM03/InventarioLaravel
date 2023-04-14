@csrf

<div class="container">
<div class= "row">
<div class="col-12">
        <div class="form-group">
            <label for="">Producto</label> 
            <select class="form-control" name="idProducto">
    	        <option value="0">Selecciona una opción</option>
    	        @foreach($productos as $producto)
    	        	<option value="{{$producto->idProducto}}" @isset($salida)
                            {{  ($salida->idProducto == $producto->idProducto)?'selected':''  }}
                        @endisset>{{ $producto->nombre }}</option>
    	        @endforeach
            </select>
        </div></div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Fecha de Salida</label>
            <input type="date" class="form-control" name="fechaSalida" value="{{(isset($salida))?$salida->fechaSalida:old('fechaSalida')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Cantidad</label>
            <input type="text" class="form-control" name="cantidad" value="{{(isset($salida))?$salida->cantidad:old('cantidad')}}" required>
        </div>
    