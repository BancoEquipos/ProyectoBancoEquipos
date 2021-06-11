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
            return view('notAuthorized');
        }

        $finduser = User::where('google_id', $user->id)->first();
        if (!$finduser) {
            $formatDate = "Y-m-d H:i:s";
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id'=> $user->id,
                'lastLog' => date($formatDate),
            ]);
            $newUser->save();
            Auth::login($newUser);
        } else {
            $formatDate = "Y-m-d H:i:s";
            $finduser->lastLog = date($formatDate);
            $finduser->save();
            Auth::login($finduser);
        }
        if (strpos($user->getEmail(),'alu.murciaeduca.es')) {
            $nre = explode("@", $user['email']);
            return view('vistaAlumno', array('userName' => $user['family_name'], 'email' => $user->getEmail(), 'nre' => $nre[0], 'lastLog' => Auth::user()->updated_at));
        } else {
            return view('vistaProfesor', array('user' => $user));
        }
    }
}
