<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Photo;
use App\User;

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

   
    protected $redirectTo;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        if(Auth::check()){
            if(Auth::user()->is_admin()){
                $this->redirectTo = 'admin/dashboard';
            }else{
                $this->redirectTo = 'user/dashboard';
            }
        }
    }


    
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        $finduser = User::where('provider_id', $user->getId() )->first();

        if(!$finduser){
        $user = User::create([
            'name'=> $user->getNickname(),
            'email'=> $user->getEmail(),
            'role_id'=> 2,
            // 'photo_id'=>$photo_id,
            'status'=>1,
            'providier_id'=>$user->getId(),
            ]);
        }    
       
        Auth::login($user, true);    

        return redirect('/user/dashboard');
    }


}
