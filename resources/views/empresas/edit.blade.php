@extends('layouts.master')

@section('content')

<h1>Editar Empresa</h1>
<p class="lead">Editar esta empresa. <a href="{{ route('empresas.index') }}">Volver listado de empresas</a></p>
<hr>
{!! Form::model($empresa, [
    'method' => 'PATCH',
    'route' => ['empresas.update', $empresa->empresa_id]
]) !!}

<div class="form-group">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Actualizar Empresa', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
@stop