<?php

namespace App\Http\Controllers;

use App\Models\Dethorario;
use App\Rules\LessonTimeAvailabilityRule;
use App\Models\Curso;
use App\Models\Horario;
use Illuminate\Http\Request;

/**
 * Class DethorarioController
 * @package App\Http\Controllers
 */
class DethorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dethorarios = Dethorario::paginate(5);
        $curso = Curso::all();
        $hor = Horario::all();
        return view('dethorario.index', compact('dethorarios','curso','hor'))
            ->with('i', (request()->input('page', 1) - 1) * $dethorarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dethorario = new Dethorario();
        $curso = Curso::pluck('curNombre','id');
        //$horario = Horario::pluck('horDia','id');
        $hor = Horario::all();
        $cur = Curso::all();
        return view('dethorario.create', compact('dethorario','curso','hor','cur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //request()->validate(Dethorario::$rules);

        /*$dethorario = Dethorario::create($request->all());*/
        $campos=[
            'dia' => 'required|integer|min:1|max:7',
            'hora_inicio' => ['required', new LessonTimeAvailabilityRule(),'date_format:' . config('panel.lesson_time_format')],
            'hora_fin' => ['required','after:start_time','date_format:'.config('panel.lesson_time_format')],
            'curId' => 'required',

            

           // 'curId' => 'required|unique:dethorarios',
		    //'horario' => 'required',
        ];
        $mensaje=[
            'curId.required'=>'El Curso es requerido',
            'horario.required'=>'El horario es requerido',
            'curId.unique'=>'El Curso ya tiene registrado un horario',
        ];
        
        $this->validate($request,$campos,$mensaje);
        $dethorario = Dethorario::create($request->all());
        /*
        $dethorario = Dethorario::create([
            
            //'horId' => $request->horId,
            'curId' => $request->curId,      
            'horario' => implode(',', $request->horario),     
        ]);*/

        return redirect()->route('dethorarios.index')
            ->with('success', 'DetHorario creado exitosamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dethorario = Dethorario::find($id);
        return view('dethorario.show', compact('dethorario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hor = Horario::all();
        $cur = Curso::all();
        $dethorario = Dethorario::find($id);
        $curso = Curso::pluck('curNombre','id');
       // $horario = Horario::pluck('horDia','id');
        return view('dethorario.edit', compact('dethorario','curso','hor','cur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dethorario $dethorario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dethorario $dethorario)
    {

        $campos=[
            'curId' => 'required',
		    'horario' => 'required',
        ];
        $mensaje=[
            'curId.required'=>'El Curso es requerido',
            'horario.required'=>'La horario es requerida',
            
        ];
        
        $this->validate($request,$campos,$mensaje);

        $dethorario->update([
            
            //'horId' => $request->horId,
            'curId' => $request->curId,      
            'horario' => implode(',', $request->horario),     
        ]);


        //request()->validate(Dethorario::$rules);

        //$dethorario->update($request->all());

        return redirect()->route('dethorarios.index')
            ->with('success', 'Dethorario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dethorario = Dethorario::find($id)->delete();

        return redirect()->route('dethorarios.index')
            ->with('success', 'Dethorario deleted successfully');
    }
}
