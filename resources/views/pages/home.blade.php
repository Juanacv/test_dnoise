@extends('layouts.master')

@section('content')

<h1>Prueba práctica DNOISE.</h1>
<hr>

<a href="{{ route('empresas.index') }}" class="btn btn-info">Ver Empresas</a>
<a href="{{ route('empresas.create') }}" class="btn btn-primary">Añadir Nueva Empresa</a>

@stop