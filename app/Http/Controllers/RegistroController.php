<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Registro;
class RegistroController extends Controller
{
    public function Insertar(Request $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();
            
                $reg= new Registro;
                $reg->fecha_solicitud = $request->get('fecha_solicitud');
                $reg->cedula = $request->get('cedula');
                $reg->nombre = $request->get('nombre');
                $reg->ubicacion = $request->get('ubicacion');
                $reg->nomina = $request->get('nomina');
                $reg->vicepresidencia = $request->get('vicepresidencia');
                $reg->gerencia = $request->get('gerencia');
                $reg->departamento = $request->get('departamento');
                $reg->motivo = $request->get('motivo');
                $reg->supervisor = $request->get('supervisor');
                $reg->tiempo_inicio = $request->get('tiempo_inicio');
                $reg->tiempo_fin = $request->get('tiempo_fin');
                $reg->total_dias = $request->get('total_dias');
                $reg->total_horas = $request->get('total_horas');
                /*if($request->hasFile('pdf')){
                $archivo = $request->file('cargar_pdf');
                $destino = base_path('/Archivos/');
                $archivo->move($destino, $archivo->getClientOriginalName());
                $reg->pdf = $archivo->getClientOriginalName();*/
                if ($request->hasFile('pdf')) {
                    $image = $request->file('pdf');
                   //  print_r($image);
                    $image_name = time().'.'.$image->getClientOriginalName();
                   //  echo $image;
                   //  exit(0);
                    $destinationPath = base_path('public\Archivos');
                    $image->move($destinationPath, $image_name);
                    $reg->pdf = $image->getClientOriginalName();
                }
                $reg->save();
                DB::commit();
            } catch (Exception $e) {
            DB::rollback();
        }
        return redirect()->route('volver.permiso');
    }
}
