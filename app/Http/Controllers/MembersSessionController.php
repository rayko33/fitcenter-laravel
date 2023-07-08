<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SessionMember;
use Carbon\Carbon;

class MembersSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        $sessions = SessionMember::where('client','=',$id)->
        join('training_sessions','training_sessions.idsession','=','session')
        ->get();
        
        $sessionsJson=[];
           foreach($sessions as $session){
                $start= Carbon::createFromDate($session->start);
                $end= Carbon::createFromDate($session->end);
                $sessionsJson []=['id'=>$session->idsession,
                                  'title'=>$session->title,
                                  'start'=>$start->format('Y-m-d H:i'),
                                  'end'=>$end->format('Y-m-d H:i'),
                                  'textColor'=>$session->textColor,
                                  'status'=>$session->status,
                                  'sessionType'=>$session->tipo_sesion];
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
