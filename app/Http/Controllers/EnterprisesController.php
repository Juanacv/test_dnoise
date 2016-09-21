<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
 
use App\Empresa;

class EnterprisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $empresas = Empresa::all();

       return view('empresas.index')->withEmpresas($empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
          'nombre' => 'required|unique:empresas|max:50',
          'descripcion' => 'required|max:150'
       ]);
       
       $input = $request->all();

       Empresa::create($input);

       $request->session()->flash('flash_message', 'Nueva empresa añadida con éxito');
       
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $empresa = Empresa::findOrFail($id);

       return view('empresas.show')->withEmpresa($empresa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $empresa = Empresa::findOrFail($id);

       return view('empresas.edit')->withEmpresa($empresa);
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
       $empresa = Empresa::findOrFail($id);

       $this->validate($request, [
          'nombre' => 'required|max:50',
          'descripcion' => 'required|max:150'
       ]);

        $input = $request->all();

        $empresa->fill($input)->save();

        $request->session()->flash('flash_message', 'Empresa correctamente actualizada');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       $empresa = Empresa::findOrFail($id);

       $empresa->delete();

       $request->session()->flash('flash_message', 'Empresa correctamente borrada');

       return redirect()->route('empresas.index');
    }
    
    public function showdestroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('empresas.showdestroy')->withEmpresa($empresa);
    }
}
