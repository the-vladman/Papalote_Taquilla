<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// REQUESTS
// 
use App\Http\Requests\RegistrarRequest;
//
use Storage;
use Carbon\Carbon;
//
// Clases
use App\Papalote;


class PapaloteController extends Controller
{
    //
    //
    public function registrar(Request $request){
            $visitante = new Papalote();
            $visitante->email = $request->input('email');
            $visitante->nombre = $request->input('nombre');
            $visitante->edad = $request->input('edad');
            $visitante->genero = $request->input('genero');
           $visitante->rfid = $request->input('rfid');
            $date = Carbon::now();
            $visitante->fecha_visita = $date->toDateString(); // Imprime una fecha en el formato día/mes/año
            $visitante->save();
            $path = public_path();
            $file = $request->file('foto');
            $extension = $request->file('foto')->getClientOriginalExtension();
            $nombre = $visitante->id.'.'.$extension;
            Storage::put('Fotos_Perfil/'.$nombre, \File::get($file));
            $visitante->url_perfil = 'http://papalote.cocoplan.mx/Papalote/Fotos_Perfil/'. $nombre;
            $visitante->save();

            return 'Saved!';
    }

    public function visitante(Request $request){
        $visitante = Papalote::where('rfid',$request->input('rfid'))->first();
        if($visitante){
            return $visitante;
        }
        else{
            return ('NO ENCONTRADO');
        }
    }   
    public function sumar_puntos(Request $request){
        $visitante = Papalote::where('rfid',$request->input('rfid'))->first();
        if($visitante){
            $total = $visitante->puntos;
            $visitante->puntos = $total + $request->input('puntos');
            $visitante->save();
            return ('Suma Exitosa!');
        }
        else{
            return ('NO ENCONTRADO');
        }
    }

public function mostrar_fotos(){
        $papalotes = Papalote::all();
        return view('Tauilla/gal',compact('papalotes'));
    }
 
}



