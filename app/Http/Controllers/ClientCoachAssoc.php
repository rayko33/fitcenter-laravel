<?php

namespace App\Http\Controllers;

use App\Models\CoachClientAssociation;
use App\Models\SessionMember;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientCoachAssoc extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assoc= CoachClientAssociation::where('client','=',Auth::user()->idclient)
                                        ->join('coaches','coaches.idcoaches','coach_client_association.coach')
                                        ->get();
        return view('client.trainers',['trainers'=>$assoc]);
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
    public function show()
    {
        $sessions = SessionMember::where('client','=',Auth::user()->idclient)
                                   ->join('training_sessions','training_sessions.idsession','=','session')
                                   ->get();
        
        $sessionsJson =[];

        foreach($sessions as $session){
            $start= Carbon::createFromDate($session->start);
            $end= Carbon::createFromDate($session->end);
            $sessionsJson []=['id'=>$session->idsession,
                                'title'=>$session->title,
                                'start'=>$start->format('Y-m-d H:i'),
                                'end'=>$end->format('Y-m-d H:i'),
                                'textColor'=>$session->textColor,
                                'status'=>$session->status,
                                'sessionType'=>$session->tipo_sesion,
                                'mode'=>$session->mode];
        }
        return response()->json($sessionsJson);
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
