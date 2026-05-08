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
    <a href="{{route('pagina.create')}}">Nueva página</a>
    <!-- Genero un listado de los elementos obtenidos de la consulta -->
    <ul>
        @foreach ($paginas as $pagina)
            <li>
                <a href='{{route("pagina.detalle",$pagina->id)}}'>
                    {{$pagina->name}}
                </a>
            </li>
        @endforeach
    </ul>
 {{$paginas->links()}}

@endsection