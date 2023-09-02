<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Exception;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente = cliente::all();
        /* foreach($alumnos as $alumno){
            $alumno->cursos_alumno;
        } */
        return $cliente;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $body)
    {
        try {
            $nuevaPersona = new cliente();
            if($body->name){
                $nuevaPersona->name = $body->name;
            }else{
                return "Debe tener nombre";
            }
            if($body->last_name){
                $nuevaPersona->last_name = $body->last_name;
            }else{
                return "Debe tener apellido";
            }
            if($body->email){
                $nuevaPersona->email = $body->email;
            }else{
                return "Debe tener email";
            }
            if($body->gender){
                $nuevaPersona->gender = $body->gender;
            }else{
                return "Debe tener genero";
            }
            if($body->birthday){
                $nuevaPersona->birthday = $body->birthday;
            }else{
                return "Debe tener cumpleaños";
            }
        
            $nuevaPersona->save();
            return "El Clientes fue agregado correctamente";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $trabajador = cliente::find($id);
        return $trabajador;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cliente $id)
    {
        try {
            if(cliente::find($id) != null){

                $edita = cliente::find($id);
                if($request->name){
                    $edita ->name = $request->name;
                }
                if($request->last_name){
                    $edita ->last_name = $request->last_name;
                }
                if($request->email){
                    $edita ->email = $request->email;
                }
                if($request->gender){
                    $edita ->gender = $request->gender;
                }
                if($request->birthday){
                    $edita ->birthday = $request->birthday;
                }
                if($request->state){
                    if($request->state != 0 || $request->state != 1){
                        return "Recuerda que solo puede ser 0 o 1. Donde 0 es desactivado y 1 activado";
                    }else{
                        $edita ->state = $request->state;    
                    }
                }
            
                $edita->save();
            }

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cliente $cliente)
    {
        $borra = cliente::find($cliente->id);
        $borra->state =0;

        $borra->save();
    }
}
