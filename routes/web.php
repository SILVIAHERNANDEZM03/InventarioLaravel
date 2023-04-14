<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\StockController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome1');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta para enviar un mensaje por URL
Route::get('/ruta', function (){
    return "Hola mundo";
});

//Ruta para mostrar una vista, primero hay que crear la vista
Route::view('/ruta-vista', 'ejemplovista');

//Ruta para enviar parametros por medio de la URL
Route::view('/ruta-vista', 'ejemplovista', ['nombresistema' => 'Sistema Gestión de Inventarios']);
/*POST, UPDATE*/

//Ruta que llama a una vista por medio de un controlador
//Primero hay que crear el controlador
use App\Http\Controllers\ejemploController;
Route::get('/ruta-controller', [ejemploController::class,'index']);

//Ruta para recibir para recibir parámetros por URL
Route::get('/ruta-vista', function(Request $request){
    return "Producto Código: ".$request->get('parametro');

});
//http://proyecto01.test/ruta-vista?parametro=16526

//Ruta para recibir para recibir parámetros por URL por medio de controlador
route::get('/parametro/{id}', [ejemploController::class, 'recibirParametros']);

//Grupo de rutas desde una vista 
Route::prefix('/ruta')->group(function(){
    Route::name('ruta.')->group(function(){
        Route::get('users', function(){
            return view('ejemplovista', ['nombresistema'=> 'Sistema gestión']);
        })->name('users');
        Route::get('/users/create',[ejemploController::class, 'create'])->name('users.create');
        Route::get('/users/show',[ejemploController::class, 'show'])->name('users.show');
        Route::get('/users/edit',[ejemploController::class, 'edit'])->name('users.edit');
        Route::get('/users/destroy',[ejemploController::class, 'destroy'])->name('users.destroy');
    });

});
Auth::routes();
Route::group(['middleware'=>['auth']], function(){
    Route::resource('/prueba', ejemploController::class);
    Route::resource('/proveedores', ProveedorController::class);
    Route::resource('/productos', ProductoController::class);
    Route::resource('/clientes', ClienteController::class);
    Route::resource('/entradas', EntradaController::class);
    Route::resource('/salidas', SalidaController::class);
    Route::resource('/stocks', StockController::class);

//rutas con todo es resource
//rutas especificas con get 
});

/*Ruta que manda a traer un CRUD completo de un controlador */
