<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ProductoModel;
use Illuminate\Database\QueryException;
use App\Models\ProveedorModel;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $proveedores = ProveedorModel::select('*')->get();
        $productos = ProductoModel::select('*')->orderBy('idProducto', 'DESC');
        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $productos = $productos
            ->where('idProducto', 'like', '%'.$request->search.'%')
            ->orWhere('nombre', 'like', '%'.$request->search.'%')
            ->orWhere('descripcion', 'like', '%'.$request->search.'%')
            ->orWhere('precio', 'like', '%'.$request->search.'%')
            ->orWhere('expiracion', 'like', '%'.$request->search.'%')
            ->orWhere('stock', 'like', '%'.$request->search.'%')
            ->orWhere('idProveedor', 'like', '%'.$request->search.'%');
        }
        $productos = $productos->paginate($limit)->appends($request->all());
        return view('productos.index', compact('productos', 'proveedores'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores = ProveedorModel::select('*')->get();
        return view('productos.create', compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = new ProductoModel();
        $producto = $this->createUpdateProducto($request, $producto);
        return redirect()
        ->route('productos.index')
        ->with('message', 'Se ha creado el registro correctamente.');
    }

    public function createUpdateProducto(Request $request, $producto){
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $producto->precio=$request->precio;
        $producto->expiracion=$request->expiracion;
        $producto->stock=$request->stock;
        $producto->idProveedor=$request->idProveedor;
        $producto->save();
        return $producto;

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $proveedores = ProveedorModel::select('*')->get();
        $producto=ProductoModel::where('idProducto', $id)->firstOrFail();
        return view('productos.show', compact('producto', 'proveedores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $proveedores = ProveedorModel::select('*')->get();
        $producto=ProductoModel::where('idProducto', $id)->firstOrFail();
        return view('productos.edit', compact('producto', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $producto=ProductoModel::where('idProducto', $id)->firstOrFail();
        $producto=$this->createUpdateProducto($request, $producto);
        return redirect ()
        ->route('productos.index')
        ->with('message', 'Se ha actualizado el registro correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto=ProductoModel::findOrFail($id);
        try{
            $producto->delete();
            return redirect()
            ->route('productos.index')
            ->with('message', 'Registro eliminado correctamente.');
        }catch(QueryException $e){
            return redirect()
            ->route('productos.index')
            ->with('danger', 'Registro relacionado imposible de eliminar.');
        }
    }
}
