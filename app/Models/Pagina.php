<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa el trait que permite usar factories (datos falsos)

class Pagina extends Model
{
    // Habilita el uso de factories en este modelo
    // Permite usar Pagina::factory() para crear datos automáticamente
     use HasFactory;
    //Se especifica la tabla con la cual se pretende trabajar
    //Se recomienda que el modelo se escriba en singular y las tablas en plural
    protected $table='paginas';
    //Un proceso de trasformacion el casts
    protected function casts():array{
        return[
            'created_at'=>'datetime',
            'is_active'=>'boolean'
        ];
    }

    //Accesor solo afecta a la vista, no a la base de datos
    //Mutador si afecta la base de datos
    protected function name(): Attribute
    {
        return Attribute::make(//Mutador
            set: function ($value){
                return strtolower($value);
            },
            get: function ($value){//Accesor
                return ucfirst($value);
            }
        );
    }

    public function ObtenerListado(){
        $listadousuarios=Pagina::all();
        return $listadousuarios;
    }

    public function BuscarId($id){
        $registro=Pagina::find($id);
        return $registro;
    }
}