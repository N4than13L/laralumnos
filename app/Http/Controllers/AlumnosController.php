<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;
use App\Models\Carreras;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // instanciando el modelo.

        /*
        para hacer el joun de las tablas mas comodamente a la hora de hacerlas.
        $alumnos = Alumnos::select('alumnos.id', 'nombre', 'correo', 'id_carrera', 'carrera')->join('carreras', 'carreras.id', '=', 'alumnos.id_carrera')->get();

        */
        $alumnos = Alumnos::all();
        $carreras = Carreras::all();
        return view("alumnos", compact("alumnos", "carreras"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $alumno = new Alumnos($request->input());
        $alumno->saveOrFail();
        return redirect('alumnos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alumno = Alumnos::find($id);
        $carreras = Carreras::all();
        return view("editarAlumno", compact("alumno", "carreras"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $alumno = Alumnos::find($id);
        $alumno->fill($request->input())->saveOrFail();
        return redirect('alumnos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumno = Alumnos::find($id);
        $alumno->delete();
        return redirect('alumnos');
    }
}
