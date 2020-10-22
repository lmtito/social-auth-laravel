<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller {

    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback() {
        if (!request('code')) {
            return redirect()->route('login')->with('warning', 'No pudimos determinar su inicio de sesión social.');
        }
        $facebookUser = Socialite::driver('facebook')->user();
        // dd($facebookUser);
        $user = User::firstOrNew(['facebook_id' => $facebookUser->getId()]);
        if (!$user->exists) {
            $user->name = $facebookUser->getName();
            $user->email = $facebookUser->getEmail();
            $user->avatar = $facebookUser->getAvatar();
            $user->save();
        }
        Auth::login($user);
        return redirect()->route('home')->with('success', 'Bienvenido' . $user->name);
    }
}
