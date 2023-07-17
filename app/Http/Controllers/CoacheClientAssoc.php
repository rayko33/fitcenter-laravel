<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoachClientAssociation;
use App\Models\Client;
use App\Models\Coach;
use Exception;
use Illuminate\Support\Facades\Auth;
class CoacheClientAssoc extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $assoc =CoachClientAssociation::join('clients','clients.idclient','=','client')
            ->where('coach','=',Auth::user()->idcoaches)
            ->select('clients.idclient','clients.nameclient','clients.lastnameclient','clients.rutclient','status')
            ->get();
            $clients=[];
            foreach($assoc as $client){
                $clients[]=[
                    'id'=>$client->idclient,
                    'name'=>$client->nameclient,
                    'lastname'=>$client->lastnameclient,
                    'rut'=> $client->rutclient,
                    'status'=>$client->status
                ];
            }
            return view('coach.client',['clients'=>json_encode($clients),
                                        'assoc'=>$assoc]);
        }catch(Exception $e){
            return $e->getMessage();
        }
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $status)
    {
        switch($status){
            case 'active':
                    $assoc =CoachClientAssociation::join('clients','clients.idclient','=','client')
                    ->where(['coach'=>Auth::user()->idcoaches,'status'=>$status])
                    ->select('clients.idclient','clients.nameclient','clients.lastnameclient','clients.rutclient','status')
                    ->get();
                    $clients=[];
                    foreach($assoc as $client){
                        $clients[]=[
                            'id'=>$client->idclient,
                            'name'=>$client->nameclient,
                            'lastname'=>$client->lastnameclient,
                            'rut'=> $client->rutclient,
                            'status'=>$client->status
                        ];
                    }

                    return response()->json($clients);

                break;
            case 'inactive':
                    $assoc =CoachClientAssociation::join('clients','clients.idclient','=','client')
                    ->where(['coach'=>Auth::user()->idcoaches,'status'=>$status])
                    ->select('clients.idclient','clients.nameclient','clients.lastnameclient','clients.rutclient','status')
                    ->get();

                    $clients=[];
                    foreach($assoc as $client){
                        $clients[]=[
                            'id'=>$client->idclient,
                            'name'=>$client->nameclient,
                            'lastname'=>$client->lastnameclient,
                            'rut'=> $client->rutclient,
                            'status'=>$client->status
                        ];
                    }
                    
                    return response()->json($clients);

                break;
            default:
                    $assoc =CoachClientAssociation::join('clients','clients.idclient','=','client')
                    ->where('coach','=',Auth::user()->idcoaches)
                    ->select('clients.idclient','clients.nameclient','clients.lastnameclient','clients.rutclient','status')
                    ->get();

                    $clients=[];
                    foreach($assoc as $client){
                        $clients[]=[
                            'id'=>$client->idclient,
                            'name'=>$client->nameclient,
                            'lastname'=>$client->lastnameclient,
                            'rut'=> $client->rutclient,
                            'status'=>$client->status
                        ];
                    }
                    return response()->json($clients);

                break;    

        }
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
