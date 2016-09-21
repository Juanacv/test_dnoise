@extends('layouts.master')

@section('content')

<h1>Lista de Empresas</h1>
<p class="lead">Lista con todas las empresas. <a href="{{ route('empresas.create') }}">Añada una nueva</a></p>
<hr>
@foreach($empresas as $empresa)
    <h3>{{ $empresa->nombre }}</h3>
    <p>{{ $empresa->descripcion}}</p>
    <p>
        <a href="{{ route('empresas.show', $empresa->empresa_id) }}" class="btn btn-info">Ver Empresa</a>
        <a href="{{ route('empresas.edit', $empresa->empresa_id) }}" class="btn btn-primary">Editar Empresa</a>
        <a href="{{ route('relaciones.createrelationship', $empresa->empresa_id) }}" class="btn btn-primary">Crear Relacion</a>
        <a href="{{ route('relaciones.indexrelationship', array('id'=>$empresa->empresa_id,'filter'=>'todos','primeros'=>'clientes')) }}" class="btn btn-primary">Ver Relaciones</a>
    </p>
    <hr>
@endforeach
@stop