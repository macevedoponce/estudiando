<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Grado;
use App\Models\Seccion;
use Illuminate\Http\Request;

/**
 * Class MatriculaController
 * @package App\Http\Controllers
 */
class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matriculas = Matricula::paginate();

        return view('matricula.index', compact('matriculas'))
            ->with('i', (request()->input('page', 1) - 1) * $matriculas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matricula = new Matricula();
        $alumno = Alumno::pluck('aluDni','id');
        $grado = Grado::pluck('graNombre','id');
        $seccion = Seccion::pluck('secNombre','id');
        return view('matricula.create', compact('matricula','alumno','grado','seccion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Matricula::$rules);

        $matricula = Matricula::create($request->all());

        return redirect()->route('matriculas.index')
            ->with('success', 'Matricula created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matricula = Matricula::find($id);

        return view('matricula.show', compact('matricula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matricula = Matricula::find($id);
        $alumno = Alumno::pluck('aluDni','id');
        $grado = Grado::pluck('graNombre','id');
        $seccion = Seccion::pluck('secNombre','id');
        return view('matricula.create', compact('matricula','alumno','grado','seccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Matricula $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matricula $matricula)
    {
        request()->validate(Matricula::$rules);

        $matricula->update($request->all());

        return redirect()->route('matriculas.index')
            ->with('success', 'Matricula updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $matricula = Matricula::find($id)->delete();

        return redirect()->route('matriculas.index')
            ->with('success', 'Matricula deleted successfully');
    }
}
