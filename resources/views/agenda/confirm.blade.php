@extends('plantilla.plantilla')

@section('titulo','Confirme Eliminacion')

@section('contenido')
<div class="container py-5">
    <h1>¿Deseas realmente eliminar el registro de {{ $Agenda->nombres}}  {{ $Agenda->apellidos}}?</h1>

    <form method="post" action="{{ route('agenda.destroy', $Agenda->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="redondo btn btn-danger">
            <i class="fas fa-trash-alt">Eliminar</i>
        </button>
        <a class="redondo btn btn-secondary" href=" {{ route('cancelar') }}">
            <i class="fas fa-ban"></i> Cancelar
        </a>
    </form>
</div>

@include('plantilla.footer', ['container'=>'container'])

@endsection




