@extends('layouts.master')

@section('content')

<h1>{{ $empresa->nombre }}</h1>
<p class="lead">{{ $empresa->descripcion }}</p>
<hr>

<div class="row">
    <div class="col-md-6 text-left">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['empresas.destroy', $empresa->empresa_id]
        ]) !!}
            {!! Form::submit('¿Seguro que quiere borrar esta empresa?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-6">
        <a href="{{ route('empresas.index') }}" class="btn btn-info">Volver listado de empresas</a>
        <a href="{{ route('empresas.edit', $empresa->empresa_id) }}" class="btn btn-primary">Editar Empresa</a>
    </div>
</div>

@stop