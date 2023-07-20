<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Coach;
use App\Models\Region;
use App\Models\TrainerCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $client = Client::find(Auth::user()->idclient);
        $trainersAssoc = $client->coaches();
        $coaches=Coach::whereNotIn('idcoaches',$trainersAssoc->pluck('coach'))
                        ->join('coach_profile','coach_profile.idprofile','coaches.profile')->get();
        
        $region = Region::all();
        $categories = TrainerCategory::all();        
        foreach($coaches as $coach){
            if($coach->yearexperience!=null){
                $currentDate= Carbon::now()->format('Y-m-d');
                $startYearsExperience= Carbon::createFromFormat('Y-m-d',$coach->yearexperience) ;
                $yearsExperience= $startYearsExperience->diffInYears($currentDate);
                $coach->years=$yearsExperience;
            }
            
            
        }
        return view('client.searchCoach',['coaches'=>$coaches,
                                              'regions'=>$region,
                                              'categories'=>$categories]);
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
    public function show(Request $request )
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
