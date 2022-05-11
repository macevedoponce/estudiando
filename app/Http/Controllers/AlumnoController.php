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

        $campos=[
            'aluDni' => 'required|max:8|min:8|unique:alumnos',
            'aluNombres' => 'required|string|max:50',
            'aluApellidoPaterno' => 'required|string|max:50',
            'aluApellidoMaterno' => 'required|string|max:50',
            'aluPassword' => 'required|min:5|max:20',
        ];
        $mensaje=[
            'aluDni.required'=>'El DNI del alumno es requerido',
            'aluNombres.required'=>'Los Nombres del alumno son requeridos',
            'aluApellidoPaterno.required'=>'El Apellido Paterno del alumno es requerido',
            'aluApellidoMaterno.required'=>'El Apellido Matenro del alumno es requerido',
            'aluPassword.required'=>'La Contraseña del alumno es requerido',
            'aluDni.unique'=>'El DNI ya esta ocupado',
            'aluDni.min'=>'El DNI debe de tener al menos 8 caracteres',
            'aluDni.max'=>'El DNI no debe de tener más de 8 caracteres'
        ];
        if($request->hasFile('import_file')){
            $campos=['import_file'=>'required|mimes:csv,txt,xlsx'];
            $mensaje=['import_file.required'=>'El archivo de importacion es necesario',
            'import_file.mimes'=>'Solo se acepta archivos csv, txt, xlsx'];
        }
        $this->validate($request,$campos,$mensaje);

        $file = $request->file('import_file');
        if($file){
            Excel::import(new AlumnosImport, $file);
        }else{
            request()->validate(Alumno::$rules);

        $alumno = Alumno::create([
            'aluDni' => $request['aluDni'],
            'aluNombres' => $request['aluNombres'],
            'aluApellidoPaterno' => $request['aluApellidoPaterno'],
            'aluApellidoMaterno' => $request['aluApellidoMaterno'],
            'aluPassword' => Hash::make($request['aluPassword']),
        ]);

        }
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

        $campos=[
            'aluDni' => 'required|max:8|min:8',
            'aluNombres' => 'required|string|max:50',
            'aluApellidoPaterno' => 'required|string|max:50',
            'aluApellidoMaterno' => 'required|string|max:50',
            'aluPassword' => 'required|min:5',
        ];
        $mensaje=[
            'aluDni.required'=>'El DNI del alumno es requerido',
            'aluNombres.required'=>'Los Nombres del alumno son requeridos',
            'aluApellidoPaterno.required'=>'El Apellido Paterno del alumno es requerido',
            'aluApellidoMaterno.required'=>'El Apellido Matenro del alumno es requerido',
            'aluPassword.required'=>'La Contraseña del alumno es requerido',
            'aluDni.min'=>'El DNI debe de tener al menos 8 caracteres',
            'aluDni.max'=>'El DNI no debe de tener más de 8 caracteres'
        ];
        $this->validate($request,$campos,$mensaje);

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
