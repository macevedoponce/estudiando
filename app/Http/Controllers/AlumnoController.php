<?php

namespace App\Http\Controllers;

use App\Imports\AlumnosImport;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;

/**
 * Class AlumnoController
 * @package App\Http\Controllers
 */
class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $alumnos = Alumno::where('aluDni','like','%'.$busqueda.'%')
        ->orWhere('aluNombres','like','%'.$busqueda.'%')
        ->paginate(5);

        $data =[
            'alumnos'=>$alumnos,
            'busqueda'=>$busqueda,
        ];

        return view('alumno.index', $data)
            ->with('i', (request()->input('page', 1) - 1) * $alumnos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumno = new Alumno();
        return view('alumno.create', compact('alumno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('import_file');
        if($file){
            Excel::import(new AlumnosImport, $file);
        }

        request()->validate(Alumno::$rules);

        $alumno = Alumno::create([
            'aluDni' => $request['aluDni'],
            'aluNombres' => $request['aluNombres'],
            'aluApellidoPaterno' => $request['aluApellidoPaterno'],
            'aluApellidoMaterno' => $request['aluApellidoMaterno'],
            'aluPassword' => Hash::make($request['aluPassword']),
        ]);


        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno creado exitosamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::find($id);

        return view('alumno.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);

        return view('alumno.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        request()->validate(Alumno::$rules);

        $alumno->update($request->all());

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno editado exitosamente !');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id)->delete();

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno eliminado exitosamente !');
    }
}
