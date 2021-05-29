<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use App\Models\Team;

class LoginController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                if (!strpos($user->getEmail(),'alu.murciaeduca.es') || !strpos($user->getEmail(),'murciaeduca.es')) {
                    return view('peopleNotAutorithed');
                } if (strpos($user->getEmail(),'alu.murciaeduca.es')){
                    $nre = explode("@", $user['email']);
                    return view('alumno', array('userName' => $user['family_name'], 'surnames' => $user['given_name'], 'nre' => $nre[0]));
                } else {
                    return view('profesor', array('user' => $user));
                }
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('')
                ]);
                Auth::login($newUser);
                return "Hola";
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
