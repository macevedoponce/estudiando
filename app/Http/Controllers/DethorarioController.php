<?php

namespace App\Http\Controllers;

use App\Models\Dethorario;
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
        $dethorarios = Dethorario::paginate();
        return view('dethorario.index', compact('dethorarios'))
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
        $horario = Horario::pluck('horDia','id');
        return view('dethorario.create', compact('dethorario','curso','horario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Dethorario::$rules);

        $dethorario = Dethorario::create($request->all());

        return redirect()->route('dethorarios.index')
            ->with('success', 'Dethorario created successfully.');
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
        $dethorario = Dethorario::find($id);
        $curso = Curso::pluck('curNombre','id');
        $horario = Horario::pluck('horDia','id');
        return view('dethorario.edit', compact('dethorario','curso','horario'));
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
        request()->validate(Dethorario::$rules);

        $dethorario->update($request->all());

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
