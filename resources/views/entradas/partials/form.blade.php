@csrf
<div class="container">
<div class= "row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Fecha de Entrada</label>
            <input type="date" class="form-control" name="fechaEntrada" value="{{(isset($entrada))?$entrada->fechaEntrada:old('fechaEntrada')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Cantidad</label>
            <input type="text" class="form-control" name="cantidad" value="{{(isset($entrada))?$entrada->cantidad:old('cantidad')}}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Producto</label> 
            <select class="form-control" name="idProducto">
    	        <option value="0">Selecciona una opción</option>
    	        @foreach($productos as $producto)
    	        	<option value="{{$producto->idProducto}}" @isset($entrada)
                            {{  ($entrada->idProducto == $producto->idProducto)?'selected':''  }}
                        @endisset>{{ $producto->nombre }}</option>
    	        @endforeach
            </select>
        </div></div>
