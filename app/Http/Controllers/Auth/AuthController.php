<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Auth;
use View;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function login()
    {

        return View::make('auth.login');

    }

    public function register()
    {
  
        return View::make('auth.register');

    }


    public function logout()
    {

    dd('logout');    
    }

    /**
     * Redirect the user to the authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();

    }

    /**
     * Obtain the user information from provider
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {

        if(!$provider){
            dd('no provider');
        }
        
        $providerUser = Socialite::driver($provider)->user();
 
       
        //get the unique user_id from provider
        $user_id = $providerUser->getId();

        $user = User::where('provider_id', $user_id)->first();
        

    
        if (!$user) {
            $user = new User;
            $user->name = $providerUser->name;
            $user->email = $providerUser->email;
            $user->provider_id = $user_id;
            $user->provider= $provider;
            $user->save();
        }


        // login
        Auth::loginUsingId($user->id);

        return redirect('/');
       

       
    }











}
