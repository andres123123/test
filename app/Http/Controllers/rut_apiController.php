<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Response;
use App\models\respuestas;
use PDF;



class rut_apiController extends Controller
{
    public function index(){
    
        $data = respuestas::all();

        return view('rutapi/index')
              ->with('data',$data);
    }
    public function store(Request $request){

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://rut-api.herokuapp.com/api/person-rut', 
        ['headers' => ['Content-type: application/x-www-form-urlencoded'],
        'form_params' => [
             'rut' => $request->rut,
                 ],
        'timeout' => 20, // Response timeout
        'connect_timeout' => 20, // Connection timeout
         ]);
         
         //to json
         $result = json_decode($response->getBody()->getContents());

         //buscar usuario
         $buscar = respuestas::where('rut',$request->rut)->get();
         $cantidad=count($buscar);

         if($cantidad <= 0){     
             $respuesta = new respuestas;

             $respuesta->rut          =$result->rut;
             $respuesta->nombre       =$result->name;
             $respuesta->gender       =$result->gender;
             $respuesta->address      =$result->address;
             $respuesta->city         =$result->city;

             $respuesta->save();  
         }else{
                //session flash , devolver error
                return "ese usuario ya existe , por favor cree otro";
         }
      

         return redirect('index');
              

    } 
    public function modificar($rut){
    

        $data = respuestas::where('rut',$rut)->get();

        return view('rutapi/modificar')
               ->with('data',$data);

    }
    public function destroy($rut){

            $sql = respuestas::where('rut',$rut)->get();

            $cantidad=count($sql);

            if($cantidad>0) {
                $usuarios = respuestas::find($rut)->delete();
            }else{
                //session flash , devolver error
                return 'el usuario que desea borrar , ha sido borrado o no existe';
      
            }
            return redirect('index');
    }   
    public function update(Request $request){

       
        $Rut=$request->rut;

        $respuesta = respuestas::where('rut',$Rut)->get()->first();;
        
    
            $respuesta->rut          =$request->rut;
            $respuesta->nombre       =$request->name;
            $respuesta->gender       =$request->gender;
            $respuesta->address      =$request->address;
            $respuesta->city         =$request->city;

            $respuesta->save();  

        return redirect('index');
     
    }
    public function createPDF(){
        
        //Recuperar todos los usuarios de la db
        $respuesta = respuestas::all();

       
        $pdf = PDF::loadView('pdf',['respuesta'=>$respuesta]);
        return $pdf->stream();
        
    }
}
