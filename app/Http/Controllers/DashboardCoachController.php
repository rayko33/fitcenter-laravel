<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\TrainingSession;
use Illuminate\Http\Request;
use App\Models\CoachClientAssociation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardCoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today();
        
        $startWeek = $today->startOfWeek();
        $endtWeek = $today->copy()->endOfWeek();
        $sessions = TrainingSession::where(
                    ['coach'=>Auth::user()->idcoaches,
                    'status'=>'pendiente'])
                    ->whereBetween('start',[$startWeek,$endtWeek])
                    ->get();

        $activeClient = CoachClientAssociation::where(
                        ['coach'=>Auth::user()->idcoaches,
                        'status'=>'active'])->get()->count();
        
        return view('coach.dashboard',['activeClient'=>$activeClient,
                                        'startWeek'=>$startWeek,
                                         'endWeek'=>$endtWeek,
                                        'sessions'=>$sessions]);
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
    public function show(string $id)
    {
        //
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
