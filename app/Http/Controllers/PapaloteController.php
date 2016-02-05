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
    public function registrar_visitante(RegistrarRequest $request){
        $visitante = new Papalote();
        $visitante->email = $request->input('email');
        $visitante->nombre = $request->input('nombre');
        $visitante->edad = $request->input('edad');
        $visitante->genero = $request->input('genero');
        $date = Carbon::now();
        $visitante->fecha_visita = $date->toDateString(); // Imprime una fecha en el formato día/mes/año
        
        $file = $request->file('foto');
        $extension = $request->file('foto')->getClientOriginalExtension();
        $nombre = $visitante->id.'.'.$extension;
        Storage::put('Fotos_Perfil/'.$nombre, \File::get($file));
        $visitante->url_perfil = $nombre;
        $visitante->save();

        return 'Registro Completo';
    }
    
}
