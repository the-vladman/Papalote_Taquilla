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

            // :::::::::::::::: Imagen Adquirir :::::::::::::::: 
            $path = public_path();
            $file = $request->file('foto');
            $extension = 'png';
            $nombre = $visitante->id.'.'.$extension;
            Storage::put('Fotos/'.$nombre, \File::get($file));
            // :::::::::::::::: File ancho y largo ::::::::::::::::
            $v = Storage::get($path.'/Papalote/Fotos/'.$nombre);
            $d = base64_decode($v);
            $vieja =  imagecreatefrompng($d);
            $f_w = imagesx($vieja);
            $f_h = imagesy($vieja);
            // :::::::::::::::: dimensionees de la imagen ::::::::::::::::
            $n_w = $f_w;
            $n_h = $f_h;
            // :::::::::::::::: crear nueva imagen ::::::::::::::::
            $image = imagecreatetruecolor($n_w, $n_h);
            imagealphablending($image,true);
            imagecopyresampled($image,$vieja,0,0,0,0,$n_w,$n_h,$f_w,$f_h);
            // :::::::::::::::: crear mascara ::::::::::::::::
            $mask = imagecreatetruecolor($f_w, $f_h);
            $mask = imagecreatetruecolor($n_w, $n_h);
            // :::::::::::::::: crear trasnparencia ::::::::::::::::
            $transparent = imagecolorallocate($mask, 255, 0, 0);
            imagecolortransparent($mask, $transparent);
            // :::::::::::::::: crear circulo ::::::::::::::::
            imagefilledellipse($mask, $n_w/2, $n_h/2, $n_w, $n_h, $transparent);

            $red = imagecolorallocate($mask, 0, 0, 0);
            imagecopy($image, $mask, 0, 0, 0, 0, $n_w, $n_h);
            imagecolortransparent($image, $red);
            imagefill($image,0,0, $red);

            // output and free memory
            header('Content-type: image/png');
            imagepng($image);
            imagedestroy($mask);    

            // :::::::::::::::: Imagen Guardar :::::::::::::::: 
            Storage::put('Fotos_Perfil/'.$nombre, \File::get($image));
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



