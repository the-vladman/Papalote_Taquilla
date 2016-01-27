<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaquillaController extends Controller
{
    //
    public function home(){
    	return view('Tauilla/home');
    }

    public function registro(){
    	return view('Tauilla/registro');
    }
}
