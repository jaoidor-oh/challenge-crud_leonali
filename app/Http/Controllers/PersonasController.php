<?php

namespace App\Http\Controllers;

use App\Personas;
use Validator;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['personas'] = Personas::paginate(5);

        return view('personas.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'nombre' => 'require|string|max:255',
            'apellidos' => 'require|string|max:255',
            'edad' => 'require|string|max:255',
            'sexo' => 'require|string|max:255',
            'cp' => 'require',
            'direccion' => 'require|string|max:1000'
        ];
        $mensaje = [
            'require' => 'El : attribute es requierido'
        ];

        $this->validate($request, $campos, $mensaje);
        // $datosPersonas = request()->all();
        $datosPersonas = request()->except('_token');
        Personas::insert($datosPersonas);
        // return response()->json($datosPersonas);
        return redirect('personas')->with('mensaje', 'Persona agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(Personas $personas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $persona = Personas::findOrFail($id);
        return view('personas.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $datosPersonas = request()->all();
        $datosPersonas = request()->except('_token', '_method');
        Personas::where('id', '=', $id)->update($datosPersonas);

        // $persona = Personas::findOrFail($id);
        // return view('personas.edit', compact('persona'));

        $datos['personas'] = Personas::paginate(5);

        return view('personas.index', $datos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id )
    {
        $datosPersonas = request()->except('_token', '_method');
        Personas::where('id', '=', $id)->delete();
        // dd($id);
        // Personas::destroy($id);
        return redirect('personas')->with('mensaje', 'Persona borrada con éxito');
    }
}
