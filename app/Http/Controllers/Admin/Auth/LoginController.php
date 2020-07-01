<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/painel';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function index(){
        return view('admin.login');
    }


    public function authenticate(Request $request){
        $creds = $request->only(['email','password']);

        $validator = $this->validator($creds);

        $remember = $request->input('remember',false);

        if($validator->fails()){

            return redirect()->route('login')
                             ->withErrors($validator)
                             ->withInput();

        }else{

            if(Auth::attempt($creds,$remember)){
                return redirect()->route('admin');
            }else{
                return redirect()->route('login')
                                 ->with('log','Email ou Senha incorretos');
            }

        }
        

    }


    public function logout(){
        Auth::logout();
        return redirect()->route('site');
    }


    protected function validator(array $data){
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:100'],
            'password' => ['required', 'string', 'min:4'],
        ]);
    }


}
