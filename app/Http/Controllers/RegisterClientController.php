<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterClientController extends Controller
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
        return view('client.auth.signin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        try{
            $user = Client::create([
                'nameclient' => $request->input('name'),
                'lastnameclient'=> $request->input('lastname'),
                'rutclient'=> $request->input('rut'),
                'email_addres' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
            event(new Registered($user));
            Auth::guard('client')->login($user);
            return redirect('/dashclient');
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
