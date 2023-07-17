<?php

use App\Http\Controllers\CoacheClientAssoc;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoachLoginController;
use App\Http\Controllers\CoachSessionController;
use App\Http\Controllers\RegisterCoachController;
use App\Http\Controllers\LoginClientController;
use App\Http\Controllers\RegisterClientController;
use App\Http\Controllers\DashboardCoachController;
use App\Http\Controllers\MembersSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardCoach;
use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\throwException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('home');
});

/*Route::get('/dashcoach',function(){
    return view('coach.dashboard');
})->middleware('auth:coach')->name('coachdashbord');*/

/*Route::get('/clientes',function(){
    return view('coach.client');
})->middleware('auth:coach')->name('clientes');*/
/*
Route::get('/login',[CoachLoginController::class,'create'])->name('login')->middleware('guest');
Route::get('/login2',[CoachLoginController::class,'store'])->name('loginpost')->middleware('guest');
Route::get('singin',[RegisterCoachController::class,'create'])->name('singin')->middleware('guest');
Route::get('register',[RegisterCoachController::class,'store'])->name('register')->middleware('guest');*/


Route::middleware('guest')->group(function(){
    if(Auth::guard('coach')->check()||Auth::guard('client')->check()){
        return abort(403,'Acceso restringido');
    }
    if(Auth::guard('client')->check()){
        return abort(403,'Acceso restringido');
    }
    Route::get('/logincoach',[CoachLoginController::class,'create'])->name('login');
    Route::get('/authcoach',[CoachLoginController::class,'store'])->name('authenticatecoach');
    Route::get('singincoach',[RegisterCoachController::class,'create'])->name('singin');
    Route::get('registercoach',[RegisterCoachController::class,'store'])->name('register');
    

    #----------------------------------     --------------------------------------------------------

    Route::get('/singinclient',[RegisterClientController::class,'create'])->name('singinclient');
    Route::get('/register',[RegisterClientController::class,'store'])->name('registerclient');
    Route::get('/loginclient',[LoginClientController::class,'create'])->name('loginclient');
    Route::get('/authclient',[LoginClientController::class,'store'])->name('authenticateclient');
    //Route::get('logout',[LoginClientController::class,'destroy'])->name('logoutclient');
});

Route::get('/check',function(){
    return(Auth::guard('coach')->check());
});

Route::middleware(['auth:coach'])->group(function () {
    Route::get('/dashcoach',[DashboardCoachController::class,'index'])->name('coachdashbord');

    Route::get('/clientes',[CoacheClientAssoc::class,'index'])->name('clientes');

    Route::get('/home',function(){
        return view('coach.dashboard');
    })->name('home');
    
    Route::get('logoutcoach',[CoachLoginController::class,'destroy'])->name('outcoach');

    Route::get('/sesiones',[CoachSessionController::class,'index'])->name('sessions');
    Route::get('/trainingsessions/{id?}',[CoachSessionController::class,'show'])->name('trainingsession');
    Route::get('/trainingsessions/member/{id?}',[MembersSessionController::class,'show'])->name('sessionMember');
    Route::get('/profile',[ProfileController::class,'index'])->name('coach.profile');
    Route::get('/clients/status/{status?}',[CoacheClientAssoc::class,'show'])->name('client.status');
    
});


Route::middleware(['auth:client'])->group(function () {
    Route::get('/dashclient',function(){
        return view('client.dashboard');
    })->name('dashbordclient');

    Route::get('logout',[LoginClientController::class,'destroy'])->name('logoutclient');
    
});