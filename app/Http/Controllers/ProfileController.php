<?php

namespace App\Http\Controllers;
use App\Models\Coach;
use App\Models\TrainerCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $coach = Coach::find(Auth::user()->idcoaches);
        $profile = $coach->coach_profile;
        $categoriesCoach = $coach->trainer_category_assocs()
                                 ->select('trainer_category.category as categoryName','trainer_category.idcategory','trainer_category_assoc.idtrainer_category_assoc as idAssoc')
                                 ->join('trainer_category','trainer_category.idcategory','trainer_category_assoc.category')
                                 ->get();
        $assocCategories = $coach->trainer_category_assocs();
        $categories = TrainerCategory::whereNotIn('idcategory',$assocCategories->pluck('category'))->get();
        
        
      
        $currentDate= Carbon::now()->format('Y-m-d');
        $startYearsExperience= $profile->yearexperience;
        $yearsExperience= $startYearsExperience->diffInYears($currentDate);
        $profile->years=$yearsExperience;
        
        
        return view('coach.profile',['profile'=>$profile,
                                     'categories'=>$categories,
                                     'categoriesCoach'=>$categoriesCoach]);
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
