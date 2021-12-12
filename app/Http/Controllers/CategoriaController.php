<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Recurso;
use App\Models\Solicitud;
use DB;

class CategoriaController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->only('create', 'store');
        $this->middleware('role:admin')->only('create', 'store');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aoslearn.addCat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria;
        $categoria->nombre_categoria = $request->input('nombre_categoria');

        request()->validate([
            'nombre_categoria' => 'required',
        ]);

        $categoria->save();
        return redirect()->route('adminActuales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriaInfo = DB::table('categorias')->where('id_categoria', $id)->get();
        $categoriaRecursos = DB::table('recursos')->where('id_categoria', $id)->get();
        return view('aoslearn.categoria', compact('categoriaRecursos', 'categoriaInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
