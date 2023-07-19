<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\TrainerCategoryAssoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoachCategoryAssocController extends Controller
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
        $assoc= TrainerCategoryAssoc::create([
                    'trainer'=>Auth::user()->idcoaches,
                    'category'=>$request->category_id 
                ]);
        $assoc->save();
        return(['status'=>200,'message'=>'recibido','info'=>$assoc]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $coach = Coach::find(Auth::user()->idcoaches);
        $categoriesCoach = $coach->trainer_category_assocs()
                                 ->select('trainer_category.category as categoryName','trainer_category.idcategory','trainer_category_assoc.idtrainer_category_assoc as idAssoc')
                                 ->join('trainer_category','trainer_category.idcategory','trainer_category_assoc.category')
                                 ->get();
        
        return(['categories'=>$categoriesCoach]);
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
    public function destroy($id)
    {
        $assoc=TrainerCategoryAssoc::find($id);
        $assoc->delete();
        return (['status'=>200,'message'=>'categoria desvinculada','assoc'=>$assoc]);
    }
}
