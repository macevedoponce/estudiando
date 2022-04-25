<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['docentes']=Docente::paginate(15);
        return view('docente.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('docente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    /*VALIDACION DE CAMPOS */
    $campos=[
        'Dni' => 'required|integer|max:99999999',
        'Nombres' => 'required|string|max:50',
        'ApellidoPaterno' => 'required|string|max:80',
        'ApellidoMaterno' => 'required|string|max:80',
        'Password' => 'required',
    ];
    $mensaje=[
        'required'=>'El :attribute es requerido',
        'Password.required'=>'La Contraseña es requerida'
    ];
    $this->validate($request, $campos,$mensaje);
        /* FIN DE VALIDACION*/ 

       // $datosDocente = request()->all();
       $datosDocente = request()->except('_token');
       Docente::insert($datosDocente);
        //return response()->json($datosDocente);
        return redirect('docente')->with('mensaje','Docente agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $docente = Docente::findOrFail($id);
        return view('docente.edit', compact('docente'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        /*VALIDACION DE CAMPOS */
        $campos=[
            'Dni' => 'required|integer|max:99999999',
            'Nombres' => 'required|string|max:50',
            'ApellidoPaterno' => 'required|string|max:80',
            'ApellidoMaterno' => 'required|string|max:80',
            'Password' => 'required',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Password.required'=>'La Contraseña es requerida'
        ];
        $this->validate($request, $campos,$mensaje);

        /* FIN DE VALIDACION*/ 
        //
        $datosDocente = request()->except(['_token','_method']);
        Docente::where('id','=',$id)->update($datosDocente);

        $docente = Docente::findOrFail($id);
       // return view('docente.edit', compact('docente'));
       return redirect('docente')->with('mensaje','Docente Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Docente::destroy($id);
        return redirect('docente')->with('mensaje','Docente Borrado');
    }
}
