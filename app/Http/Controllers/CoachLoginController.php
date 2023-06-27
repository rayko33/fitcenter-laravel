<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\throwException;

class CoachLoginController extends Controller
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
        return view('coach.auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $credentials = ['emailaddrescoach'=>$request->email,
                            'password'=>$request->password];
        
            if (Auth::guard('coach')->attempt($credentials)) {
               
                $request->session()->regenerate();
            
                return redirect('/dashcoach');
            }
            return Redirect::back()->with('error','Error en las credenciales');
        }catch(Exception $e){
            return 'fail'.$e->getMessage();
        }
        return Redirect::back()->withErrors(['error'=>'Error en las credenciales']);
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
    public function destroy(Request $request)
    {
        //
        Auth::guard('coach')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
