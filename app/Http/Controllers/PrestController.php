<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\client;
use App\guarantor;
use App\data;
use DB;

class PrestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


  public function index()
    {   
        
        $clients = DB::table('data')
            ->join('clients', 'data.id', '=', 'clients.data_id')
            ->paginate(3);

        $guarantors = DB::table('data')
        ->join('guarantors', 'data.id', '=', 'guarantors.data_id')
        ->get();
        return view('prestamo')->with('clients',$clients)->with('guarantors',$guarantors);
    
    }

}
