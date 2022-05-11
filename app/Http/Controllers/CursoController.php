<?php

namespace App\Http\Controllers;

use App\Imports\CursosImport;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Grado;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class CursoController
 * @package App\Http\Controllers
 */
class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $cursos = Curso::where('curNombre','like','%'.$busqueda.'%')
        /*->orWhere('docId','like','%'.$busqueda.'%')
        ->orWhere('graId','like','%'.$busqueda.'%')*/
        ->orWhere('secId','like','%'.$busqueda.'%')
        ->paginate(5);

        $data =[
            'cursos'=>$cursos,

            'busqueda'=>$busqueda,
        ];

        return view('curso.index', $data)
            ->with('i', (request()->input('page', 1) - 1) * $cursos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = new Curso();
        $docente = Docente::pluck('docNombres','id');
        $grado = Grado::pluck('graNombre','id');
        $seccion = Seccion::pluck('secNombre','id');
        $doc = Docente::all();
        $gra = Grado::all();
        $sec = Seccion::all();
        return view('curso.create', compact('curso','docente','grado','seccion','doc','gra','sec'));
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
            'curNombre' => 'required|unique:cursos',
            'docId' => 'required|string|max:50',
            'graId' => 'required|string|max:50',
            'secId' => 'required|string|max:50',
        ];
        $mensaje=[
            'curNombre.required'=>'El Nombre del Curso es requerido',
            'docId.required'=>'El Docente es requerido',
            'graId.required'=>'El Grado es requerido',
            'secId.required'=>'La seccion es requerida',
            'curNombre.unique'=>'El Nombre del curso ya esta ocupado'
            
        ];
        $this->validate($request,$campos,$mensaje);

        $file = $request->file('import_file');
        if($file){
            Excel::import(new CursosImport, $file);
        }


        request()->validate(Curso::$rules);

        $curso = Curso::create($request->all());

        return redirect()->route('cursos.index')
            ->with('success', 'Curso creado exitosamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::find($id);

        return view('curso.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);
        $docente = Docente::pluck('docNombres','id');
        $grado = Grado::pluck('graNombre','id');
        $seccion = Seccion::pluck('secNombre','id');
        $doc = Docente::all();
        $gra = Grado::all();
        $sec = Seccion::all();
        return view('curso.edit', compact('curso','docente','grado','seccion','doc','gra','sec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Curso $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $campos=[
            'curNombre' => 'required',
        ];
        $mensaje=[
            'curNombre.required'=>'El Nombre del Curso es requerido'
        ];
        $this->validate($request,$campos,$mensaje);
        request()->validate(Curso::$rules);

        $curso->update($request->all());

        return redirect()->route('cursos.index')
            ->with('success', 'Curso editado exitosamente !');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $curso = Curso::find($id)->delete();

        return redirect()->route('cursos.index')
            ->with('success', 'Curso eliminado exitosamente !');
    }
}
