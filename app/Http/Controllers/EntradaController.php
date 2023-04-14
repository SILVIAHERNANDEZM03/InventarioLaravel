<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\EntradaModel;
use App\Models\ProductoModel;
use Illuminate\Database\QueryException;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productos = ProductoModel::select('*')->get();
        $entradas = EntradaModel::select('*')->orderBy('idEntrada', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $entradas = $entradas
            ->where('idEntrada', 'like', '%'.$request->search.'%')
            ->orWhere('fechaEntrada', 'like', '%'.$request->search.'%')
            ->orWhere('cantidad', 'like', '%'.$request->search.'%')
            ->orWhere('idProducto', 'like', '%'.$request->search.'%');
        }
        $entradas = $entradas->paginate($limit)->appends($request->all());
        return view('entradas.index', compact('entradas', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = ProductoModel::select('*')->get();
        return view('entradas.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $entrada = new EntradaModel();
        $entrada = $this->createUpdateEntrada($request, $entrada);
        return redirect()
        ->route('entradas.index')
        ->with('message', 'Se ha creado el registro correctamente.');
    }

    public function createUpdateEntrada(Request $request, $entrada){
        $entrada->fechaEntrada=$request->fechaEntrada;
        $entrada->cantidad=$request->cantidad;
        $entrada->idProducto=$request->idProducto;
        $entrada->save();
        return $entrada;

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $productos = ProductoModel::select('*')->get();
        $entrada=EntradaModel::where('idEntrada', $id)->firstOrFail();
        return view('entradas.show', compact('entrada', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productos = ProductoModel::select('*')->get();
        $entrada=EntradaModel::where('idEntrada', $id)->firstOrFail();
        return view('entradas.edit', compact('entrada', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $entrada=EntradaModel::where('idEntrada', $id)->firstOrFail();
        $entrada=$this->createUpdateEntrada($request, $entrada);
        return redirect ()
        ->route('entradas.index')
        ->with('message', 'Se ha actualizado el registro correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $entrada=EntradaModel::findOrFail($id);
        try{
            $entrada->delete();
            return redirect()
            ->route('entradas.index')
            ->with('message', 'Registro eliminado correctamente.');
        }catch(QueryException $e){
            return redirect()
            ->route('entradas.index')
            ->with('danger', 'Registro relacionado imposible de eliminar.');
        }
    }
}
