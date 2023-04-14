<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>{{-- $nombresistema --}}</h1> 
    <p>Ejemplo Primera Vista</p>
    <h3>Mi primer proyecto en laravel</h3>

    <a href="{{-- route('ruta.users.create') --}}">Crear usuario</a>    
    <br>
    <a href="{{-- route('ruta.users.show') --}}">Ver usuario</a>
    <br>
    <a href="{{-- route('ruta.users.edit') --}}">Editar usuario</a>  
    <br>
    <a href="{{-- route('ruta.users.destroy') --}}">Eliminar usuario</a>
    

</body>
</html>