<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Personaje;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personajes = Personaje::all();
        return $personajes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(
            [
            'nombre' => 'required|min:5'
            ]
        );

        $personaje = new Personaje();
        $personaje->nombre = $request->nombre;
        $personaje->usuario_id = $request->usuario_id;
        $personaje->fuerza = 5;
        $personaje->destreza = 5;
        $personaje->inteligencia = 5;
        $personaje->nivel = 1;
        $personaje->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personaje = Personaje::find($id);
        return $personaje;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        request()->validate(
            [
            'nombre' => 'required|min:5'
            ]
        );
        $personaje = Personaje::findOrFail($id);
        error_log($personaje->nombre);
        error_log($request->nombre);
        $personaje->nombre = $request->nombre;
        $personaje->save();
        return $personaje;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personaje = Personaje::destroy($id);
        return $personaje;
    }

    public function subirNivel(Request $request, $id)
    {
        $personaje = Personaje::findOrFail($request->id);
        $personaje->fuerza = $personaje->fuerza + 5;
        $personaje->destreza = $personaje->destreza + 5;
        $personaje->inteligencia = $personaje->inteligencia + 5;
        $personaje->nivel = $personaje->nivel + 1;
        $personaje->save();
        return $personaje;
    }
}
