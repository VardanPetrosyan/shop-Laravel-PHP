<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
use App\User;
use Illuminate\Http\Request;
use App\Services\SocialFacebookAccountService;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('provaider_user_id', $user->id)->first();

            if($finduser !== Null){
                Auth::login($finduser);
                $userinfo = $finduser;
                return view('home', ['userinfo'=>$userinfo]);

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => csrf_token(),
                    'provaider_user_id'=> $user->id,
                    'provaider' => 'google',
                    'avatar' => $user->avatar

                ]);

                Auth::login($newUser);
                $userinfo = $newUser;
                $newUser->makeEmployee("client",'true');
                return view('home', ['userinfo'=>$userinfo]);
            }

        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }

    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        $userinfo = $user;
        return view('home', ['userinfo'=>$userinfo]);
    }

    public function handleTelegramCallback(Request $user)
    {
        $accountTel = User::where('provaider_user_id', $user->id)->first();

        if ($accountTel) {
            Auth::login($accountTel);
            $userinfo = $accountTel;
            return view('home', ['userinfo'=>$userinfo]);
        }else{
            $userTel = User::create([
                'name' => $user->first_name." ".$user->last_name,
                'email' => $user->hash,
                'password'=> csrf_token(),
                'provaider_user_id' => $user->id,
                'provaider' => 'telegram',
                'avatar' => asset('img/default_profile_avatar.jpg')
            ]);

            $userTel->makeEmployee("client",'true');
            Auth::Login($userTel, true);
            $userinfo = $userTel;
            if(Auth::user()->name == 'admin'){
                return view('admin', ['userinfo'=>$userinfo]);
            }else{
                return view('home', ['userinfo'=>$userinfo]);
            }

        }
    }
}
