<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SocialProfile;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller {

    public function redirectToSocialNetwork($socialNetwork) {
        return Socialite::driver($socialNetwork)->redirect();        
    }

    public function handleSocialNetworkCallback($socialNetwork) {
        try {
            $socialUser = Socialite::driver($socialNetwork)->user();
        }
        catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('login')->with('warning', 'No pudimos determinar su inicio de sesión social.');
        }

        // Verifica la existencia de un id de usuario de la red social
        $socialProfile = SocialProfile::firstOrNew([
            'social_network' => $socialNetwork,
            'social_network_user_id' => $socialUser->getId()
        ]);

        if (!$socialUser->exists) {
            // Verifica la existencia de un usuario con el email de la red social
            $user = User::firstOrNew(['email' => $socialUser->getEmail()]);

            if (!$user->exists) {
                $user->name = $socialUser->getName();
                $user->save();
            }

            $socialProfile->avatar = $socialUser->getAvatar();
            $user->profiles()->save($socialProfile);
        }

        Auth::login($socialProfile->$user);

        return redirect()->route('home')->with('success', 'Bienvenido' . $socialProfile->$user);
    }
}
