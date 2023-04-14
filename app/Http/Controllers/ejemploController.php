<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ejemploController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('ejemplovista');
    }
    public function recibirParametros($id){
        return "El id recibido es: ".$id; //concatenar es .$id
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Soy la vista crear";
    }
//manda a traer la vista a crear
    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        
    }
//quien guarda los registros es store 
    /**
     * Display the specified resource.
     */
    public function show()
    {
        return "Soy la vista show";
    }
//manda a traer la vista ver
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return "Soy la vista editar";
    }
//manda a traer la vista que quieres cambiar
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }
//es el que actualiza la vista 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        return "Soy la funcion eliminar";
    }
    //el que destruye o elimina 
}
