<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class SocialiteController extends Controller
{
    //Google Auth
    public function redirectToGoogle () {
        return socialite::driver('google')->redirect();
    }

    public function handleGoogleCallBack () {
        $this->handleSocialCallBack('google');
    }

    //facebook Auth
    public function redirectToFacebook () {
        return socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallBack () {
        $this->handleSocialCallBack('facebook');
    }

    public function handleSocialCallBack ($provider) {
        try {
            $user = $this->findOrCreateUser(socialite::driver($provider)->user());

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);

        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function findOrCreateUser ($socialiteUser, $provider) {
        $user = User::where('social_id', $socialiteUser->id)->first();
        if ( $user )
        {
            return $user;
        }
        else
        {
            return User::create([
                'name' => $socialiteUser->name,
                'email' => $socialiteUser->email,
                'social_id' => $socialiteUser->id,
                'social_type' => $provider,
            ]);
        }
    }
}
