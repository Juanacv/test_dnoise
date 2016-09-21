@extends('layouts.master')

@section('content')

<h1>Lista de Empresas Relacionadas con {{ $empresa->nombre }}</h1>
<p class="lead">{{ $empresa->descripcion}}</p>
<label for="filtro">Mostrar sólo:</label>
<select class="filtro" id="filtro" name="filtro">
    <option value="todos" <?php if ($filter == "todos") { echo "selected"; } ?>>todos</option>
    <option value="clientes" <?php if ($filter == "clientes") { echo "selected"; } ?>>clientes</option>
    <option value="proveedores" <?php if ($filter == "proveedores") { echo "selected"; } ?>>proveedores</option>
</select>
<label for="primeros">Mostrar primero:</label>
<select class="primeros" id="primeros" name="primeros">
    <option value="clientes" <?php if ($primeros == "clientes") { echo "selected"; } ?>>clientes</option>
    <option value="proveedores" <?php if ($primeros == "proveedores") { echo "selected"; } ?>>proveedores</option>
</select>
<input id="eid" type="hidden" value="{{$empresa->empresa_id}}">
<hr>
 <table class="table table-bordered table-striped">
     <thead>
      <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Relación</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
<?php 
if ($primeros == "clientes") { 
    if (!empty($clientes)) { ?>
    @foreach($clientes as $cliente)
    <tr>
        <td>{{$cliente->nombre}}</td>
        <td>{{$cliente->descripcion}}</td>
        <td>Cliente</td>
        <td><a href="{{route('relaciones.destroyrelation',array('id'=>$empresa->empresa_id,'cid'=>$cliente->empresa_id,'pid'=>$empresa->empresa_id,'filtro'=>$filter,'primeros'=>$primeros))}}" class="btn btn-danger delete">Borrar relación</a></td>
    </tr>
    @endforeach
    <?php }
    if (!empty($proveedores)) { ?>
    @foreach($proveedores as $proveedor)
    <tr>
        <td>{{$proveedor->nombre}}</td>
        <td>{{$proveedor->descripcion}}</td>
        <td>Proveedor</td>
        <td><a href="{{route('relaciones.destroyrelation',array('id'=>$empresa->empresa_id,'cid'=>$empresa->empresa_id,'pid'=>$proveedor->empresa_id,'filtro'=>$filter,'primeros'=>$primeros))}}" class="btn btn-danger delete">Borrar relación</a></td>
    </tr>
    @endforeach
    <?php 

    } 
} else {
    if (!empty($proveedores)) { ?>
    @foreach($proveedores as $proveedor)
    <tr>
        <td>{{$proveedor->nombre}}</td>
        <td>{{$proveedor->descripcion}}</td>
        <td>Proveedor</td>
        <td><a href="{{route('relaciones.destroyrelation',array('id'=>$empresa->empresa_id,'cid'=>$empresa->empresa_id,'pid'=>$proveedor->empresa_id,'filtro'=>$filter,'primeros'=>$primeros))}}" class="btn btn-danger delete">Borrar relación</a></td>
    </tr>
    @endforeach
    <?php } 
     if (!empty($clientes)) { ?>
    @foreach($clientes as $cliente)
    <tr>
        <td>{{$cliente->nombre}}</td>
        <td>{{$cliente->descripcion}}</td>
        <td>Cliente</td>
        <td><a href="{{route('relaciones.destroyrelation',array('id'=>$empresa->empresa_id,'cid'=>$cliente->empresa_id,'pid'=>$empresa->empresa_id,'filtro'=>$filter,'primeros'=>$primeros))}}" class="btn btn-danger delete">Borrar relación</a></td>
    </tr>
    @endforeach
    <?php }
}
?>
    </tbody>
 </table>
<p >Lista con todas las empresas. <a href="{{ route('empresas.create') }}">Añada una nueva</a></p>
@stop