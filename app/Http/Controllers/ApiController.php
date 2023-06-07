<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pai;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listaPaises()
    {
        $respuesta = array();
        $list = Pai::all();
        //dd($list);

        $respuesta['status'] = 'ok';
        $respuesta['mensaje'] = 'listado de datos';
        $respuesta['data'] = $list;
        return response()->json($respuesta);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function crearPaises(Request $request)
    {
        //dd('hola');
        $respuesta = array();
        $pais  = new Pai();
        $pais->nomPais = $request->nomPais;
        $pais->save();

        $respuesta['status'] = 'ok';
        $respuesta['mensaje'] = 'dato registrado';
        $respuesta['respuesta DB'] = $pais;
        return response()->json($respuesta);

    }

    /**
     * Display the specified resource.
     */
    public function verPaises(Request $request)
    {
        $respuesta = array();
        $pais = Pai::where('id', '=', $request->id)->first();

        $respuesta['status'] = 'ok';
        $respuesta['mensaje'] = 'mostrando registro';
        $respuesta['data'] = $pais;
        return response()->json($respuesta);

    }

    /**
     * Update the specified resource in storage.
     */
    public function actualizarPaises(Request $request)
    {
        $respuesta = array();
        $respuestaDB = Pai::find($request->id);

        if ($respuestaDB) {
            // Modificar los atributos del modelo con los nuevos valores
            $respuestaDB->nomPais = $request->nomPais;
            
            // Guardar los cambios en la base de datos
            $respuestaDB->save();

            $respuesta['status'] = 'ok';
            $respuesta['mensaje'] = 'actualizado';
            return response()->json($respuesta);
            
        } else {
            $respuesta['status'] = 'fail';
            $respuesta['mensaje'] = 'registro no encontrado';
            return response()->json($respuesta);        }


        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function eliminarPaises(Request $request)
    {
        $respuesta = array();
        $respuestaDB = Pai::find($request->id);
       

       
        if ($respuestaDB) {
            $respuestaDB = Pai::destroy($request->id);            

            $respuesta['status'] = 'ok';
            $respuesta['mensaje'] = 'registro eliminado';
            return response()->json($respuesta);
            
        } else {
            $respuesta['status'] = 'fail';
            $respuesta['mensaje'] = 'registro no encontrado';
            return response()->json($respuesta);        }


    }

    
}
