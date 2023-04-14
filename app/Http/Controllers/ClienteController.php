<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ClienteModel;
use App\Models\ProductoModel;
use Illuminate\Database\QueryException;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productos = ProductoModel::select('*')->get();
        $clientes = ClienteModel::select('*')->orderBy('idCliente', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $clientes = $clientes
            ->where('idCliente', 'like', '%'.$request->search.'%')
            ->orWhere('nombre', 'like', '%'.$request->search.'%')
            ->orWhere('apellidoPaterno', 'like', '%'.$request->search.'%')
            ->orWhere('apellidoMaterno', 'like', '%'.$request->search.'%')
            ->orWhere('rfc', 'like', '%'.$request->search.'%')
            ->orWhere('telefono', 'like', '%'.$request->search.'%')
            ->orWhere('correo', 'like', '%'.$request->search.'%')
            ->orWhere('direccion', 'like', '%'.$request->search.'%')
            ->orWhere('idProducto', 'like', '%'.$request->search.'%');
        }
        $clientes = $clientes->paginate($limit)->appends($request->all());
        return view('clientes.index', compact('clientes', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = ProductoModel::select('*')->get();
        return view('clientes.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = new ClienteModel();
        $cliente = $this->createUpdateCliente($request, $cliente);
        return redirect()
        ->route('clientes.index')
        ->with('message', 'Se ha creado el registro correctamente.');
    }

    public function createUpdateCliente(Request $request, $cliente){
        $cliente->nombre=$request->nombre;
        $cliente->apellidoPaterno=$request->apellidoPaterno;
        $cliente->apellidoMaterno=$request->apellidoMaterno;
        $cliente->rfc=$request->rfc;
        $cliente->telefono=$request->telefono;
        $cliente->correo=$request->correo;
        $cliente->direccion=$request->direccion;
        $cliente->idProducto=$request->idProducto;
        $cliente->save();
        return $cliente;

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $productos = ProductoModel::select('*')->get();
        $cliente=ClienteModel::where('idCliente', $id)->firstOrFail();
        return view('clientes.show', compact('cliente', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productos = ProductoModel::select('*')->get();
        $cliente=ClienteModel::where('idCliente', $id)->firstOrFail();
        return view('clientes.edit', compact('cliente', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cliente=ClienteModel::where('idCliente', $id)->firstOrFail();
        $cliente=$this->createUpdateCliente($request, $cliente);
        return redirect ()
        ->route('clientes.index')
        ->with('message', 'Se ha actualizado el registro correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente=ClienteModel::findOrFail($id);
        try{
            $cliente->delete();
            return redirect()
            ->route('clientes.index')
            ->with('message', 'Registro eliminado correctamente.');
        }catch(QueryException $e){
            return redirect()
            ->route('clientes.index')
            ->with('danger', 'Registro relacionado imposible de eliminar.');
        }
    }
}
