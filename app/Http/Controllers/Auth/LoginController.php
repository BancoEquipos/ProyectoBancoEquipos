<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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
                return view('peopleNotAutorithed');
            }

            $finduser = User::where('google_id', $user->id)->first();
            if (!$finduser) {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'lastLog' => date(),
                ]);
                $newUser->save();
            } else {
                $finduser->lastLog = date();
            }
            if (strpos($user->getEmail(),'alu.murciaeduca.es')) {
                $nre = explode("@", $user['email']);
                return view('alumno', array('userName' => $user['family_name'], 'surnames' => $user['given_name'], 'nre' => $nre[0]));
            } else {
                return view('profesor', array('user' => $user));
            }
    }
}
