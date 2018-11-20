<?php

namespace App\Http\Controllers\Auth;

use App\Models\SocialProvider;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;

// à refaire
//https://tutocode.fr/blog/authentification-via-facebook-twitter-google-avec-laravel-et-socialite/46

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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

    public function redirectToProvider()
    {
        return Socialite::with('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        try{
            $socialUser = Socialite::with('facebook')->user();
        }
        catch (\Exception $e){
            return redirect('login')->withErrors('Une erreur est survenue, veuillez réésayser.');
        }
        // check connexion
        $socialProvider = SocialProvider::where('provider_id',$socialUser->getId())->first();
        if($socialProvider == null){
            // create new provider
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                ['name' => $socialUser->getName()],
                ['avatar' => $socialUser->getAvatar()]
            );
            $user->socialProviders()->create([
                       'provider_id' => $socialUser->getId(), 'provider' => 'facebook'
            ]);
        }else{
            $user = $socialProvider->user;

        }
        Auth()->login($user);
        return redirect('/home');
    }

}
