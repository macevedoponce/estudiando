<?php

namespace App\Http\Controllers;

use App\Imports\DocentesImport;
use App\Models\Docente;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
/**
 * Class DocenteController
 * @package App\Http\Controllers
 */
class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $docentes = Docente::where('docDni','like','%'.$busqueda.'%')
        ->orWhere('docNombres','like','%'.$busqueda.'%')
        ->paginate(5);

        $data =[
            'docentes'=>$docentes,
            'busqueda'=>$busqueda,
        ];

        return view('docente.index', $data)
            ->with('i', (request()->input('page', 1) - 1) * $docentes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docente = new Docente();
        return view('docente.create', compact('docente'));
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
            Excel::import(new DocentesImport, $file);
        }

        request()->validate(Docente::$rules);

        $docente = Docente::create([
            'docDni' => $request['docDni'],
            'docNombres' => $request['docNombres'],
            'docApellidoPaterno' => $request['docApellidoPaterno'],
            'docApellidoMaterno' => $request['docApellidoMaterno'],
            'docPassword' => Hash::make($request['docPassword']),
        ]);

        return redirect()->route('docentes.index')
            ->with('success', 'Docente agregado exitosamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docente::find($id);

        return view('docente.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::find($id);

        return view('docente.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Docente $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        request()->validate(Docente::$rules);

        $docente->update($request->all());

        return redirect()->route('docentes.index')
            ->with('success', 'Docente actualizado exitosamente !');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $docente = Docente::find($id)->delete();

        return redirect()->route('docentes.index')
            ->with('success', 'Docente eliminado exitosamente !');
    }
}
