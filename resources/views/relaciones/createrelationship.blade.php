@extends('layouts.master')

@section('content')

<h1>Añadir Nueva Relación</h1>
<p class="lead">Añada una relación con la empresa {{$main_empresa->nombre}}.</p>
<hr>
{!! Form::open([
    'route' => 'relaciones.store'
]) !!}

<div class="form-group">
    {!! Form::label('empresas', 'Empresas:', ['class' => 'control-label']) !!}
    {!! Form::hidden('empresa_id', $main_empresa->empresa_id) !!}
    <select id="otra_id" name="otra_id" class="form-control">
    @foreach($empresas as $empresa)
    <option value="{{$empresa->empresa_id}}">{{$empresa->nombre}}</option>
    @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('relacion', 'Relación:', ['class' => 'control-label']) !!}
    <select class="form-control" id="relacion_tipo" name="relacion_tipo">
        <option value="cliente">cliente</option>
        <option value="proveedor">proveedor</option>
    </select>
</div>

{!! Form::submit('Crear Nueva Relación', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}


@stop