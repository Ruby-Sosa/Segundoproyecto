<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagina;

class HomeController extends Controller
{   //
    public function index(){
        //$pagina=Pagina::orderBy('id','desc')->get();
        $pagina=Pagina::orderBy('id','desc')->paginate(10);
        $datos["nombre"]="Ruby Esmeralda Sosa Estrella";
        $datos["fecha"]="2026-12-15";
        $datos["actividad"]="Desarrollo de software";
        $datos["descripcion_about"]="Empresa dedicada al desarrollo de software a la medida de sus clientes";
        $datos["texto_ejemplo"]="Aqui va la descripcion del texto de ejemplo";

        $datos['paginas']=$pagina;
        //return $pagina;
        //Tomo el nombre de la variable como referencia para mostrar la vista
        //$usuario=new Pagina();
        //$datos["listadousuarios"]=$usuario->ObtenerListado();
        return view('index',$datos);
    }

    public function __invoke(){
        return view('hello');
    }
    public function empresa(){
        $datos["nombre"]="Ruby Esmeralda Sosa Estrella";
        $datos["fecha"]="2026-12-15";
        $datos["actividad"]="Desarrollo de software";
        $datos["descripcion_about"]="Empresa dedicada al desarrollo de software a la medida de sus clientes";
        $datos["texto_ejemplo"]="Aqui va la descripcion del texto de ejemplo";

        $usuario=new Pagina();
        $datos["listadousuarios"]=$usuario->ObtenerListado();
        return view('principal',$datos);
    }
    public function update(Request $request){
        $usuarios=new Pagina();
        $respuesta=$usuarios->BuscarId($request->id);
        if(!empty($respuesta)){
            $respuesta->name=$request->name;
            $respuesta->calle=$request->calle;
            $respuesta->save();
        }
        return $respuesta;
    }

     public function nuevapagina(){
        $datos["nombre"]="Ruby Esmeralda Sosa Estrella";
        $datos["fecha"]="2026-12-15";
        $datos["actividad"]="Desarrollo de software";
        $datos["descripcion_about"]="Empresa dedicada al desarrollo de software a la medida de sus clientes";
        $datos["texto_ejemplo"]="Aqui va la descripcion del texto de ejemplo";    
        $datos['texto']="Aqui mostrara el formulario nuevo";    
        return view('frmnuevapagina',$datos);
    }

    public function guardarpagina(request $request){
        $pagina=new Pagina();
        $pagina->name=$request->name;
        $pagina->email=$request->email;
        $pagina->telefono=$request->telefono;
        $pagina->calle=$request->calle;
        $pagina->password=bcrypt('123456');
        $pagina->save();
        return redirect('/pagina');
    }

    public function detalle(Pagina $id){
        //Retorno todo el contenido de la tabla
    //$pagina = Pagina::find($id);
    //$datos['id']=$id;
    $datos["nombre"] = "Ruby Esmeralda Sosa Estrella";
    $datos["fecha"] = "2026-12-15";
    $datos["actividad"] = "Desarrollo de software";
    $datos["descripcion_about"] = "Empresa dedicada al desarrollo de software a la medida de sus clientes";
    $datos["texto_ejemplo"] = "Aqui va la descripcion del texto de ejemplo";

    $datos['paginas'] = $id; 

    return view('detalle', $datos);
}

}