<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SalidaModel;
use App\Models\ProductoModel;
use Illuminate\Database\QueryException;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productos = ProductoModel::select('*')->get();
        $salidas = SalidaModel::select('*')->orderBy('idSalida', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $salidas = $salidas
            ->where('idSalida', 'like', '%'.$request->search.'%')
            ->orWhere('idProducto', 'like', '%'.$request->search.'%')
            ->orWhere('fechaSalida', 'like', '%'.$request->search.'%')
            ->orWhere('cantidad', 'like', '%'.$request->search.'%');
        }
        $salidas = $salidas->paginate($limit)->appends($request->all());
        return view('salidas.index', compact('salidas', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = ProductoModel::select('*')->get();
        return view('salidas.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $salida = new SalidaModel();
        $salida = $this->createUpdateSalida($request, $salida);
        return redirect()
        ->route('salidas.index')
        ->with('message', 'Se ha creado el registro correctamente.');
    }

    public function createUpdateSalida(Request $request, $salida){
        $salida->idProducto=$request->idProducto;
        $salida->fechaSalida=$request->fechaSalida;
        $salida->cantidad=$request->cantidad;
        $salida->save();
        return $salida;

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $productos = ProductoModel::select('*')->get();
        $salida=SalidaModel::where('idSalida', $id)->firstOrFail();
        return view('salidas.show', compact('salida', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productos = ProductoModel::select('*')->get();
        $salida=SalidaModel::where('idSalida', $id)->firstOrFail();
        return view('salidas.edit', compact('salida', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $salida=SalidaModel::where('idSalida', $id)->firstOrFail();
        $salida=$this->createUpdateSalida($request, $salida);
        return redirect ()
        ->route('salidas.index')
        ->with('message', 'Se ha actualizado el registro correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $salida=SalidaModel::findOrFail($id);
        try{
            $salida->delete();
            return redirect()
            ->route('salidas.index')
            ->with('message', 'Registro eliminado correctamente.');
        }catch(QueryException $e){
            return redirect()
            ->route('salidas.index')
            ->with('danger', 'Registro relacionado imposible de eliminar.');
        }
    }
}
