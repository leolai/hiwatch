<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Error;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Log\ErrorCode as ErrorCode;
use Socialite;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    
    public function __construct()
    {
//        $this->middleware('guest', ['except' => 'getLogout']);
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

    /**
     * FB登录回调
     */
    public function facebookCallback(){
        $facebook_user = Socialite::driver('facebook')->user();
        if(!$facebook_user || !$facebook_user->id){
            Log::error(ErrorCode::MISS_FACEBOOK_LOGIN_INFO);
            redirect('/');
        }
        $user = User::login($facebook_user);
        Auth::login($user);
        redirect('/');
    }

    /**
     * 登录跳转OAuth
     */
    public function getLogin()
    {
        Socialite::driver('facebook')->scopes(['email', 'public_profile'])->redirect();
    }

    /**
     * 注销
     */
    public function getLogout(){
        Auth::logout();
        redirect('/');
    }
}
