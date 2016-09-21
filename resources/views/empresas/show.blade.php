@extends('layouts.master')

@section('content')

<h1>{{ $empresa->nombre }}</h1>
<p class="lead">{{ $empresa->descripcion }}</p>
<hr>

<a href="{{ route('empresas.index') }}" class="btn btn-info">Volver listado de empresas</a>
<a href="{{ route('empresas.edit', $empresa->empresa_id) }}" class="btn btn-primary">Editar Empresa</a>

<div class="pull-right">
    <a href="{{route('empresas.showdestroy',$empresa->empresa_id)}}" class="btn btn-danger">Borre esta empresa</a>
</div>

@stop