<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\client;
use App\guarantor;
use App\data;
use DB;

class clientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $clients = DB::table('data')
            ->join('clients', 'data.id', '=', 'clients.data_id')
            ->paginate(3);

        $guarantors = DB::table('guarantors');
        return view('home')->with('clients',$clients)->with('guarantors',$guarantors);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crearPersona');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new client();
        $guarantor = new guarantor();
        $dataClient = new data();
        $dataGuarantor = new data();
        $dataClient->cedula = $request->cedula;
        $dataClient->name = $request->name;
        $dataClient->lastName = $request->lastName;
        $dataClient->phone = $request->phone;
        $dataClient->email = $request->email;
        $dataClient->address = $request->address;
        $dataGuarantor->name = $request->guarantorName;
        $dataGuarantor->lastName = $request->guarantorLastName;
        $dataGuarantor->phone = $request->guarantorPhone;
        $dataClient->save();
        $dataGuarantor->save();
        $client->data_id=$dataClient->id;
        $guarantor->data_id=$dataGuarantor->id;
        $client->wallet_id=1;
        $guarantor->save();
        $client->guarantor_id=$guarantor->id;
        $client->save();
        return redirect('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        client::destroy($id);
        return redirect('home');
    }
    public function eliminar(Request $id)
    {
        client::destroy($id->id);
        return redirect('home');
    }
}
