<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
            $user = Socialite::driver('google')->user();

            if (!strpos($user->getEmail(),'alu.murciaeduca.es') || !strpos($user->getEmail(),'murciaeduca.es')) {

                return view('peopleNotAutorithed');

            }

            if (strpos($user->getEmail(),'alu.murciaeduca.es')) {

                $nre = explode("@", $user['email']);
                return view('alumno', array('userName' => $user['family_name'], 'surnames' => $user['given_name'], 'nre' => $nre[0]));

            } else {

                return view('profesor', array('user' => $user));

            }
    }
}
