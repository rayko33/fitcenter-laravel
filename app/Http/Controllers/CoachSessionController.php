<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingSession;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Exception;
use App\Models\CoachClientAssociation;

class CoachSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $assoc =CoachClientAssociation::join('clients','clients.idclient','=','client')
            ->where('coach','=',Auth::user()->idcoaches)
            ->select('clients.idclient','clients.nameclient','clients.lastnameclient','clients.rutclient')
            ->get();
            $clients=[];
            foreach($assoc as $client){
                $clients[]=[
                    'id'=>$client->idclient,
                    'name'=>$client->nameclient,
                    'lastname'=>$client->lastnameclient,
                    'rut'=> $client->rutclient
                ];
            }
            return view('coach.sessions',['clients'=>json_encode($clients),
                                        'assoc'=>$assoc]);
            
        }catch(Exception $e){
            return $e->getMessage();
        }
        return view('coach.sessions');
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
    public function show($id=null)
    {
        if($id==null){
           $sessios= TrainingSession::where('coach','=',Auth::user()->idcoaches)->get();
           $sessionsJson=[];
           foreach($sessios as $session){
                $start= Carbon::createFromDate($session->start);
                $end= Carbon::createFromDate($session->end);
                $sessionsJson []=['title'=>$session->title,
                                  'start'=>$start->format('Y-m-d H:i'),
                                  'end'=>$end->format('Y-m-d H:i'),
                                  'status'=>$session->status,
                                  'sessionType'=>$session->tipo_sesion];
            }

            return response()->json($sessionsJson);
        }

        $sessios= TrainingSession::where('coach','=',$id)->get();
        $sessionsJson=[];
        foreach($sessios as $session){
             $start= Carbon::createFromDate($session->start);
             $end= Carbon::createFromDate($session->end);
             $sessionsJson []=['id'=>$session->idsession,
                               'title'=>$session->title,
                               'start'=>$start->format('Y-m-d H:i'),
                               'end'=>$end->format('Y-m-d H:i')];
         }

         return response()->json($sessionsJson);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
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
