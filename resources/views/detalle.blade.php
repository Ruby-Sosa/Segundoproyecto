@extends('layouts.base')
@section('titulopaginas', 'Empresa UADY')
@push('css')
    <style>
        .fondo{
            background: #302886;
        }

        img-responsible{
            width: 100%;
            height: 100%;
        }
    </style>
@endpush  

@section('titulo')
    Bienevido a la pagina de Uady
@endsection


@section('subtitulo')
    Explorando las oportunidades con Laravel 12
@endsection



@section("contenido_cuerpo")
    <a href="{{route('pagina.index')}}">Volver a la pagina anterior</a>
    <h1>{{$paginas->id}} : {{$paginas->name}}</h1>
    <h3>Email:{{$paginas->email}}</h3>
    <p>{{$paginas->calle}}</p>
    <a href="route('pagina.edit', $paginas->id)}}">Editar</a>
    <form action="route('pagina.delete', $paginas->$id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class= 'btn btn-danger'>Eliminar página</button>
    </form>

@endsection