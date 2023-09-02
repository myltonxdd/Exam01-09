<?php

namespace App\Http\Controllers;

use App\Models\deta_product;
use App\Models\producto;
use App\Models\venta;
use Exception;
use Illuminate\Http\Request;

class DetaProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(deta_product $deta_product)
    {
        $deta_product = deta_product::all();
        /* foreach($alumnos as $alumno){
            $alumno->cursos_alumno;
        } */
        return $deta_product;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $body)
    {
        try {
            $nuevaPersona = new deta_product();
            if($body->productos_id){
                $nuevaPersona->productos_id = $body->productos_id;
            }else{
                return "Debe tener el id de producto";
            }
            if($body->venta_id){
                $nuevaPersona->venta_id = $body->venta_id;
            }else{
                return "Debe tener el id de venta";
            }
            if($body->cantidad){
                $nuevaPersona->cantidad = $body->cantidad;
            }else{
                return "Debe tener una cantidad";
            }

        
            $nuevaPersona->save();
            return "El detalle del producto fue agregado correctamente";
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
        $mostrar_id = deta_product::find($id);
        return $mostrar_id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(deta_product $deta_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, deta_product $id)
    {
        try {
            if(deta_product::find($id) != null){

                $edita = deta_product::find($id);
                if($request->productos_id){
                    $alumAll = producto::where('state','=',1)->where('id','=',$request->productos_id)->get();
                    if(count($alumAll)== 0){
                        return "Verifica si el id del alumno es correcto o verifica si esta activo el alumno, Por favor vuelve a hacer la consulta con un id de alumno valido";
                    }else{
                        $edita ->productos_id = $request->productos_id;
                    }
                }
                if($request->venta_id){
                    $alumAll = venta::where('state','=',1)->where('id','=',$request->venta_id)->get();
                    if(count($alumAll)== 0){
                        return "Verifica si el id del alumno es correcto o verifica si esta activo el alumno, Por favor vuelve a hacer la consulta con un id de alumno valido";
                    }else{
                        $edita ->venta_id = $request->venta_id;
                    }
                }
                if($request->cantidad){
                    $edita ->cantidad = $request->cantidad;
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
    public function destroy(deta_product $deta_product)
    {
        $borra = deta_product::find($deta_product->id);
        $borra->state =0;

        $borra->save();
    }
}
