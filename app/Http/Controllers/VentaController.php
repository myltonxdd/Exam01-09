<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\deta_product;
use App\Models\trabajador;
use App\Models\venta;
use Exception;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(venta $venta)
    {
        $venta = venta::all();
        /* foreach($alumnos as $alumno){
            $alumno->cursos_alumno;
        } */
        return $venta;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $body, venta $id)
    {
        try {
            $nuevaPersona = new venta();
            if($body->trabajador_id){
                $alumAll = trabajador::where('state','=',1)->where('id','=',$body->trabajador_id)->get();
                if(count($alumAll)== 0){
                    return "Verifica si el id del trabajador es correcto o verifica si esta activo el trabajador, Por favor vuelve a hacer la consulta con un id de trabajador valido";
                }else{
                    $nuevaPersona->trabajador_id = $body->trabajador_id;
                }
            }else{
                return "Debe tener un id de trabajador";
            }
            if($body->cliente_id){
                $alumAll = cliente::where('state','=',1)->where('id','=',$body->cliente_id)->get();
                if(count($alumAll)== 0){
                    return "Verifica si el id del cliente es correcto o verifica si esta activo el cliente, Por favor vuelve a hacer la consulta con un id de cliente valido";
                }else{
                    $nuevaPersona->cliente_id = $body->cliente_id;
                }
            }else{
                return "Debe tener id de cliente";
            }
            if($body->deta_id){
                $alumAll = deta_product::where('state','=',1)->where('id','=',$body->deta_id)->get();
                if(count($alumAll)== 0){
                    return "Verifica si el id del detalle de producto es correcto o verifica si esta activo el detalle de producto, Por favor vuelve a hacer la consulta con un id de detalle de producto valido";
                }else{
                    $nuevaPersona->deta_id = $body->deta_id;
                }
            }else{
                return "Debe tener id de detalle de producto";
            }
            if($body->cantidad){
                if($body->cantidad == 0){
                    return 'La cantidad de productos no puede ser igual a 0';
                }
                else{
                    $alumAll = deta_product::where('state','=',1)->where('id','=',$body->deta_id)->where('cantidad','>',$body->cantidad)->get();
                    if(count($alumAll)== 0){
                        return "Verifica la existe la cantidad de productos o verifica si está activo el producto, Por favor vuelve a hacer la consulta";
                    }else{
                        $edita = deta_product::find($body->deta_id);
                        $rest = $edita->cantidad - $body->cantidad;
                        $edita->cantidad = $rest;
                        $edita->save();
                        $nuevaPersona->cantidad = $body->cantidad;
                        return 'La venta fue agregada';
                    }
                }
            }else{
                return "Debe tener una cantidad de productos";
            }
            if($body->date){
                $nuevaPersona->date = $body->date;
            }else{
                return "Debe tener fecha";
            }
        
            $nuevaPersona->save();
            return "La venta fua agregada";
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
        $mostrar = venta::find($id);
        return $mostrar;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, venta $id)
    {
        try {
            if(venta::find($id) != null){

                $edita = venta::find($id);
                if($request->name){
                    $edita ->name = $request->name;
                }
                if($request->trabajador_id){
                    $alumAll = trabajador::where('state','=',1)->where('id','=',$request->trabajador_id)->get();
                    if(count($alumAll)== 0){
                        return "Verifica si el id del alumno es correcto o verifica si esta activo el alumno, Por favor vuelve a hacer la consulta con un id de alumno valido";
                    }else{
                        $edita ->trabajador_id = $request->trabajador_id;
                    }
                }
                if($request->cliente_id){
                    $alumAll = cliente::where('state','=',1)->where('id','=',$request->cliente_id)->get();
                    if(count($alumAll)== 0){
                        return "Verifica si el id del alumno es correcto o verifica si esta activo el alumno, Por favor vuelve a hacer la consulta con un id de alumno valido";
                    }else{
                        $edita ->cliente_id = $request->cliente_id;
                    }
                }
                if($request->cantidad){
                    $edita ->cantidad = $request->cantidad;
                }
                if($request->date){
                    $edita ->date = $request->date;
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
    public function destroy(venta $venta)
    {
        $borra = venta::find($venta->id);
        $borra->state =0;

        $borra->save();
    }
}
