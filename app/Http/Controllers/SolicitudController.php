<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Recurso;
use App\Models\Solicitud;
use DB;

class SolicitudController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('create', 'store');
        $this->middleware('role:admin')->only('destroy');
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
        $categorias = Categoria::all();
        return view('aoslearn.solicitar', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitud = new Solicitud;
        $solicitud->title = $request->input('title');
        $solicitud->video = $request->input('video');
        $solicitud->autor = $request->input('autor');
        $solicitud->id_categoria = $request->input('categorias');

        request()->validate([
            'title' => 'required',
            'video' => 'required',
            'autor' => 'required',
            'categorias' => 'required',
        ]);

        $solicitud->save();
        notify()->success('Solicitud enviada, en revision por Administrador');
        return redirect()->route('index');
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
        $solicitud = DB::table('solicitudes')->where('id', $id);
        $solicitud->delete();
        return redirect()->route('admin.index');
    }

    public function activeSolicitud(Request $request, $id){
        $solicitud = DB::table('solicitudes')->where('id', $id)->first();
        $values = array('title' => $solicitud->title, 'autor' => $solicitud->autor, 'video' => $solicitud->video, 'id_categoria' => $solicitud->id_categoria);
        DB::table('recursos')->insert($values);
        DB::table('solicitudes')->where('id', $id)->delete();
        return redirect()->route('admin.index');
    }
}
