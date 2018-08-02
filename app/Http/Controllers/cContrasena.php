<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\contrasenaRequest;

class cContrasena extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getReset()
    {
        return view('reset');
    }

    
    protected function postReset(contrasenaRequest $requests)
    {

        
        Auth::user()->password = bcrypt($requests->password);

        Auth::user()->save();
        
        return redirect('home');
    }
}


    