<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrincipalController;
use App\Models\Pagina;
use Mockery\Generator\StringManipulation\Pass\Pass;

//Route::get('/pagina',[HomeController::class,'index'])
Route::get('/pagina',[HomeController::class,'index'])->name("pagina.index");

//Route::get('/pagina', [HomeController::class, 'nuevapagina']);
Route::get('/pagina/create', [HomeController::class, 'nuevapagina'])->name("pagina.create");

//Route::get('/pagina', [HomeController::class, 'guardarpagina']);

//Route::put('/pagina/actualizar/{pagina}',[HomeController::class, 'updatepaginaform']);



// GUARDAR (ESTA ES LA CLAVE)
Route::post('/pagina', [HomeController::class, 'guardarpagina'])->name("pagina.nueva");


Route::post('/pagina/edit/{id}', [HomeController::class, 'edit'])->name("pagina.edit");

Route::get('/pagina/{id}',[HomeController::class, 'detalle'])->name("pagina.detalle");

Route::get('/pagina/delete/{id}',[HomeController::class, 'eliminar'])->name("pagina.delete");

Route::put('/pagina/actualizar/{pagina}',[HomeController::class, 'updatepaginaform'])->name("pagina.actualizar");;


Route::get('/hello',HomeController::class);
Route::get('post/mensaje',[PostController::class, 'Mensaje']);
Route::get('post/about/{param}/{name}', [PostController::class, 'About']);
Route::get('post/contacto', [PostController::class,'Contacto']);
Route::get('/Principal',[PrincipalController::class,'index']);
Route::get('Llamado',[PostController::class, 'llamado_componente']);

Route::get('/principalpagina',[PrincipalController::class,'principal']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{d}', function ($d=null) {
    return "Hello, world! {$d}";
})->where('d','[0-9]+');

Route::get('/hello/{x}', function ($x=null) {
    return "Hello, world! {$x}";
})->where('x','\w+');

Route::get('/principal', function () {
    return "Bienvenido a la página principal";
});
Route::get('/about/{param?}', function ($p=null){
    if(($p==null)||(empty($p))){
    return "No se ingresó ningún parametro";
    }
return "El parametro ingresado es: {$p}";
});

Route::get('/empresa',[HomeController::class,'empresa'])->name('empresa');

Route::get('nuevoregistro', function(){
    $pagina=new Pagina;
    $pagina->name='Llesly Veronica Sosa Estrella';
    $pagina->email='llesly.estrella@gmail.com';
    $pagina->email_verifield_at=date('Y-m-d');
    $pagina->password='123456';
    $pagina->avatar='user.png';
    $pagina->telefono='999999';
    $pagina->calle='89';
    $pagina->save();
    return $pagina;
});
//Definimos el metodo para buscar por el id 
// para obtener unicamente un registro

Route::get('buscarpaginaid', function(){
    $post=Pagina::find(1);
    return $post;
});
//Definimo el metodo para buscar por un campo determinado

Route::get('buscarxname', function(){
    $post=Pagina::where('name', 'Paola Francelia Pech Rosado')->first();
    return $post;
});
//Para recuperar mas de un registro
Route::get('obtenertodos', function (){
    $post=Pagina::all();
    return $post;
});

//Definimos el metodo para cambiar un registro
Route::get('updatename', function(){
    $post=Pagina::where ('name', 'Maria')->first();
     $post->email='agongoraescalantel125@gmail.com';
      $post->save();
      return  $post;
});

//Definimos un metodo para obtener una lista conforme a un criterio determinado
//para obtener mas de un registro

Route::get('filter', function(){
    //$post=Pagina::where('calle','like','%123%')->get();
     $post=Pagina::where('calle','like','%123%')->orderBy("id","desc")->get();
     return $post;
});

//para especificar unicamente los campos que quiera
Route::get('trescampos', function(){
    $post=Pagina::select('name','email','telefono')->get();
    return $post;
});

//Conforme a una seleccion solamente traerme un cierto numero de registros

Route::get('filtroxnumreg', function(){
    $post=Pagina::select ("name", "email")->orderBy ("name")->take(5)->get();
    return $post;
});

//Para eliminar un determinado registro
Route::get('eliminar_registro',function(){
    $post=Pagina::find(4);
    $post->delete();
    return "Eliminado";
});

//Obtener la fecha conforme a un formato
Route::get('obtenerfechaformato', function(){
    $post=Pagina::select("name", "email", "created_at")->find(3);
    return $post; 
});

//Obtener el valor de is_active
Route::get('obtenerestatus', function(){
     $post=Pagina::find(1);
    //dd funcion de depuracion que muestra el contenido de una variable
    dd($post->is_active);
});

Route::put('/actualizar-dato/{id}', [HomeController::class, 'update'])->name('dato.update');
