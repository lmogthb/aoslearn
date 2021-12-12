<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Recurso;
use App\Models\Solicitud;
use DB;

class RecursoController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('edit', 'update', 'destroy');
        $this->middleware('role:admin')->only('edit', 'update', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recursos = Recurso::all();
        return view('aoslearn.index', compact('recursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recurso = DB::table('recursos')
        ->join('categorias', 'recursos.id_categoria', '=', 'categorias.id_categoria')
        ->select('recursos.*', 'categorias.nombre_categoria')
        ->where('recursos.id', '=', $id)->first();
        $categorias = Categoria::all();
        return view ('aoslearn.edit', compact('recurso', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recurso = Recurso::find($id);
        $recurso->title = $request->input('title');
		$recurso->video = $request->input('video');
		$recurso->autor = $request->input('autor');
        $recurso->id_categoria = $request->input('categorias');

        //validar
        request()->validate([
            'title' => 'required',
            'video' => 'required',
            'autor' => 'required',
            'categorias' => 'required',
        ]);
        
        $recurso->save();
        return redirect()->route('adminActuales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recurso = DB::table('recursos')->where('id', $id);
        $recurso->delete();
        return redirect()->route('adminActuales');
    }
}
