<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Recurso;
use App\Models\Solicitud;
use DB;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Mostrar el panel de Administrador
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = DB::table('solicitudes')
        ->join('categorias', 'solicitudes.id_categoria', '=', 'categorias.id_categoria')
        ->select('solicitudes.*', 'categorias.nombre_categoria')
        ->get();
        return view ('aoslearn.admin', compact('solicitudes'));
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

    public function getAdminRecActual(){
        $recursos = DB::table('recursos')
        ->join('categorias', 'recursos.id_categoria', '=', 'categorias.id_categoria')
        ->select('recursos.*', 'categorias.nombre_categoria')
        ->get();
        return view ('aoslearn.adminRActuales', compact('recursos'));
    }
}
