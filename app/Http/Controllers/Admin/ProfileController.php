<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

class ProfileController extends Controller{

    public function __construct(){
        $this->middleware('auth');
     }
    
    public function index(){
        $isLogged = intval(Auth::id());
        $user = User::find($isLogged);
        if($user){
            return view('admin.profile.profile',['user'=>$user]);
        }
    }


    public function update(Request $request){
        $user = Auth::user();
        $dados = $request->only(['name','email','password','password_confirmation']);

        $validator = Validator::make($dados,[
            'name'     => ['required','string','max:100'],
            'email'    => ['required','string','email','max:200'],
            'password' => ['required','min:4','max:20','confirmed'],
        ]);

        if($validator->fails()){
            return redirect()->route('profile')
                             ->withErrors($validator)
                             ->withInput();
        }

        $user->name = $dados['name'];

        if($user->email != $dados['email']){
            $hasEmail = User::where('email',$dados['email'])->get();
            if(count($hasEmail) === 0){
                $user->email = $dados['email'];
            }else{
                $validator->errors()->add('email', __('validation.unique',[
                    'attribute'=>'email'
                ]));
                return redirect()->route('users.edit',$id)
                             ->withErrors($validator)
                             ->withInput();
            }
        }

        $user->save();
        return redirect()->route('users.index')->with('edit','msg');   
    }

}
