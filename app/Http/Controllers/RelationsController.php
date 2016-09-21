<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Empresa;

use App\EmpresaRelacion;

class RelationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexrelationship($id, $filtro, $primeros)
    {
        $empresa = Empresa::findOrFail($id);
        $clientes = NULL;
        $proveedores = NULL;

        if ($filtro == 'todos') {
            $clientes = $empresa->providersOf;
            $proveedores = $empresa->clientsOf;
        }
        if ($filtro == 'clientes') {
            $clientes = $empresa->providersOf;
        }
        if ($filtro == 'proveedores') {
            $proveedores = $empresa->clientsOf;
        } 
        $data['empresa'] = $empresa;
        $data['clientes'] = $clientes;
        $data['proveedores'] = $proveedores;
        $data['filter'] = $filtro;
        $data['primeros'] = $primeros;
        return view('relaciones.indexrelationship',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createrelationship($id) {
        $main_empresa = Empresa::findOrFail($id);
        $empresas = Empresa::where('empresa_id','<>',$id)->get(array('empresa_id','nombre'));
        $data['main_empresa'] = $main_empresa;
        $data['empresas'] = $empresas;
        return view('relaciones.createrelationship',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $empresa_id = $input['empresa_id'];
        $otra_id = $input['otra_id'];
        $relacion_tipo = $input['relacion_tipo'];
        $empresa_relacion = new EmpresaRelacion;
        try {
            if ($relacion_tipo == "cliente") {
                $empresa_relacion->cliente_id = $otra_id;
                $empresa_relacion->proveedor_id = $empresa_id;
                $empresa_relacion->save();
            }
            else if ($relacion_tipo == "proveedor") {
                $empresa_relacion->cliente_id = $empresa_id;
                $empresa_relacion->proveedor_id = $otra_id;
                $empresa_relacion->save();            
            }
            $request->session()->flash('flash_message', 'Nueva relación añadida con éxito');
        } catch ( \Illuminate\Database\QueryException $e) {
            $request->session()->flash('flash_message', 'La relación ya existe');
        }
        
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
    public function destroyrelation(Request $request, $id, $cid, $pid, $filtro, $primeros)
    {
       $relacion = EmpresaRelacion::where('cliente_id',$cid)->where('proveedor_id',$pid)->first();
       $relacion->delete();

       $request->session()->flash('flash_message', 'Relación correctamente borrada');

       return redirect()->route('relaciones.indexrelationship',array('id'=>$id,'filtro'=>$filtro,'primeros'=>$primeros));
    }
}
