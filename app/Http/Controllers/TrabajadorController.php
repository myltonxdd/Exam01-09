<?php

namespace App\Http\Controllers;

use App\Models\trabajador;
use Exception;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(trabajador $trabajador)
    {
        $trabajador = trabajador::all();
        /* foreach($alumnos as $alumno){
            $alumno->cursos_alumno;
        } */
        return $trabajador;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $body)
    {
        try {
            $nuevaPersona = new trabajador();
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
            return "El Alumno fue agregado correctamente";
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
        $trabajador = trabajador::find($id);
        return $trabajador;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(trabajador $trabajador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, trabajador $id)
    {
        try {
            if(trabajador::find($id) != null){

                $edita = trabajador::find($id);
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
    public function destroy(trabajador $trabajador)
    {
        $borra = trabajador::find($trabajador->id);
        $borra->state =0;

        $borra->save();
    }
}
