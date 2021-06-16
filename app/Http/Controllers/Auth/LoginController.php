<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use \Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->with(["prompt" => "select_account"])->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        if (!strpos($user->getEmail(),'alu.murciaeduca.es') || !strpos($user->getEmail(),'murciaeduca.es')) {
            return redirect('correoRestringido');
        }

        $finduser = User::where('google_id', $user->id)->first();

        if (!$finduser) {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id'=> $user->id,
                'avatar' => $user->avatar,
            ]);
            $newUser->save();
            Auth::login($newUser);
        } else {
            $finduser->updated_at=date("Y-m-d H:i:s");
            $finduser->save();
            Auth::login($finduser);
        }
        if (strpos($user->getEmail(),'alu.murciaeduca.es')) {
            return redirect('vistaAlumno');
        } else {
            return redirect('vistaProfesor');
        }
    }
}
