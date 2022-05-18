<?php

namespace App\Http\Controllers;
use App\Imports\MatriculasImport;
use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Grado;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
    public function index(Request $request)
    {
        
/*
1. SE VALIDA SI EL DNI A MATRICULAR NO ESTA REGISTRADO ANTERIORMENTE
2. CUANDO SUBIMOS ARCHIVOI, SE VALIDA QUE EL PERIODO NO SEA EL MISMO (2022)
*/

        $busqueda = $request->busqueda;
        $matriculas = Matricula::where('graId','like','%'.$busqueda)
        ->orWhere('aluId','like','%'.$busqueda.'%')
        ->paginate(20);

        $data =[
            'matriculas'=>$matriculas,
            'busqueda'=>$busqueda,
        ];

        return view('matricula.index', $data)
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
        $alu = Alumno::all();
        $gra = Grado::all();
        $sec = Seccion::all();
        $alumno = Alumno::pluck('aluDni','id');
        $grado = Grado::pluck('graNombre','id');
        $seccion = Seccion::pluck('secNombre','id');
        return view('matricula.create', compact('matricula','alumno','grado','seccion','alu','gra','sec'));
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
            'aluId' => 'required|unique:matriculas',
		    'graId' => 'required',
		    'secId' => 'required',
        ];
        $mensaje=[
            'graId.required'=>'El Grado es requerido',
            'secId.required'=>'La seccion es requerida',
            'aluId.required'=>'El alumno es requerida',
            'aluId.unique'=>'El alumno ya fue registrado anteriormente',

        ];
        if($request->hasFile('import_file')){
            $campos=['import_file'=>'required|mimes:csv,txt,xlsx'];
            $mensaje=['import_file.required'=>'El archivo de importacion es necesario',
            'import_file.mimes'=>'Solo se acepta archivos csv, txt, xlsx'];
        }
        $this->validate($request,$campos,$mensaje);

        $file = $request->file('import_file');
        if($file){
            Excel::import(new MatriculasImport, $file);
        }else{
            request()->validate(Matricula::$rules);
            $matricula = Matricula::create($request->all());
        }
        
        return redirect()->route('matriculas.index')
            ->with('success', 'Matricula creada exitosamente !');

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
        $alu = Alumno::all();
        $gra = Grado::all();
        $sec = Seccion::all();
        $alumno = Alumno::pluck('aluDni','id');
        $grado = Grado::pluck('graNombre','id');
        $seccion = Seccion::pluck('secNombre','id');
        return view('matricula.edit', compact('matricula','alumno','grado','seccion','alu','gra','sec'));
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
        $campos=[
            'aluId' => 'required',
		    'graId' => 'required',
		    'secId' => 'required',
        ];
        $mensaje=[
            'graId.required'=>'El Grado es requerido',
            'secId.required'=>'La seccion es requerida',
            'aluId.required'=>'El alumno es requerida',

        ];
        
        $this->validate($request,$campos,$mensaje);

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
