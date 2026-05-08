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
    <div class="row">
        <div class="col-6">
            <form action="{{route('pagina.actualizar',$paginas->id)}}" method="post">
                <!-- Generacion oculta del token -->
                @csrf
                <!-- Especificamos el metodo oculto-->

                @method('PUT')
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control">
                <label for="email" class="form-label">Correo</label>
                <input type="text" name="email" id="email" class="form-control">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control">
                <label for="calle" class="form-label">Calle</label>
                <input type="text" name="calle" id="calle" class="form-control"><br>
                <button class='btn btn-primary'>Crea pagina</button>
            </form>
        </div>
    </div>
@endsection