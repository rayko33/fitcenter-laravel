<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\CoachProfile;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterCoachController extends Controller
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
        return view('coach.auth.signin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $profile = CoachProfile::create([]);
            $profile->save();
            
            $user = Coach::create([
                'namecoach' => $request->input('name'),
                'lastnamecoach'=> $request->input('lastname'),
                'rutcoach'=> $request->input('rut'),
                'emailaddrescoach' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'profile' => $profile->iprofile
            ]);
            
            event(new Registered($user));
            Auth::guard('coach')->login($user);
            return redirect('/dashcoach');
        }catch(Exception $e){
            return $e->getMessage();
        }
       
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
