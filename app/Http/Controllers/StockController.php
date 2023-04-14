<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\StockModel;
use App\Models\ProductoModel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productos = ProductoModel::select('*')->get();
        $stocks = StockModel::select('*')->orderBy('idStock', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $stocks = $stocks
            ->where('idStock', 'like', '%'.$request->search.'%')
            ->orWhere('idProducto', 'like', '%'.$request->search.'%')
            ->orWhere('cantidad', 'like', '%'.$request->search.'%')
            ->orWhere('disponible', 'like', '%'.$request->search.'%');
        }
        $stocks = $stocks->paginate($limit)->appends($request->all());
        return view('stocks.index', compact('stocks', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = ProductoModel::select('*')->get();
        return view('stocks.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $stock = new StockModel();
        $stock = $this->createUpdateStock($request, $stock);
        return redirect()
        ->route('stocks.index')
        ->with('message', 'Se ha creado el registro correctamente.');
    }

    public function createUpdateStock(Request $request, $stock){
        $stock->idProducto=$request->idProducto;
        $stock->cantidad=$request->cantidad;
        $stock->disponible=$request->disponible;
        $stock->save();
        return $stock;
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $productos = ProductoModel::select('*')->get();
        $stock=StockModel::where('idStock', $id)->firstOrFail();
        return view('stocks.show', compact('stock', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productos = ProductoModel::select('*')->get();
        $stock=StockModel::where('idStock', $id)->firstOrFail();
        return view('stocks.edit', compact('stock', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $stock=StockModel::where('idStock', $id)->firstOrFail();
        $stock=$this->createUpdateStock($request, $stock);
        return redirect ()
        ->route('stocks.index')
        ->with('message', 'Se ha actualizado el registro correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stock=StockModel::findOrFail($id);
        try{
            $stock->delete();
            return redirect()
            ->route('stocks.index')
            ->with('message', 'Registro eliminado correctamente.');
        }catch(QueryException $e){
            return redirect()
            ->route('stocks.index')
            ->with('danger', 'Registro relacionado imposible de eliminar.');
        }

    }
}


