@csrf

<div class="container">
<div class= "row">
    <div class="col-12">
    <div class="col-12">
        <div class="form-group">
            <label for="">Producto</label> 
            <select class="form-control" name="idProducto">
    	        <option value="0">Selecciona una opción</option>
    	        @foreach($productos as $producto)
    	        	<option value="{{$producto->idProducto}}" @isset($stock)
                            {{  ($stock->idProducto == $producto->idProducto)?'selected':''  }}
                        @endisset>{{ $producto->nombre }}</option>
    	        @endforeach
            </select>
        </div></div>
        <div class="form-group">
            <label for="">Cantidad</label>
            <input type="text" class="form-control" name="cantidad" value="{{(isset($stock))?$stock->cantidad:old('cantidad')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Productos Disponibles</label>
            <input type="text" class="form-control" name="dispobible" value="{{(isset($stock))?$stock->disponible:old('disponible')}}" required>
        </div>
    </div>
