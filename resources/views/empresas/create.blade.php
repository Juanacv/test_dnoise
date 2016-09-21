@extends('layouts.master')

@section('content')

<h1>Añadir Nueva Empresa</h1>
<p class="lead">Añada una empresa a la lista de empresas.</p>
<hr>

{!! Form::open([
    'route' => 'empresas.store'
]) !!}

<div class="form-group">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>
<div class="col-md-6 text-left">
{!! Form::submit('Crear Nueva Empresa', ['class' => 'btn btn-primary text-left']) !!}
</div>
{!! Form::close() !!}

<div class="col-md-6 text-right">
    <a href="{{ route('empresas.index') }}" class="btn btn-info">Volver listado de empresas</a>
</div>
@stop