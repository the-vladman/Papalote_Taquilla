<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


// Nuevas clases
use App\Taquilla;
use App\Http\Requests\NuevoRequest;
use Carbon\Carbon;

// 
class TaquillaController extends Controller
{
    //
    public function home(){
    	return view('Tauilla/home');
    }

    public function registro(){
    	return view('Tauilla/registro');
    }

    public function registrar(NuevoRequest $request){
    	$visitante = new Taquilla();
    	$visitante->boleto = $request->input('boleto');
    	$visitante->email = $request->input('email');
    	$visitante->nombre = $request->input('nombre');
    	$visitante->edad = $request->input('edad');
    	$visitante->genero = $request->input('genero');
    	//Fecha
    	$date = Carbon::now();
    	$visitante->fecha_visita = $date->toDateString(); // Imprime una fecha en el formato día/mes/año
    	
    	$visitante->save();
    	return redirect('registro');
    }


    public function visitantes(){
    	$visitantes = Taquilla::all();
    	return $visitantes;
    }
}
