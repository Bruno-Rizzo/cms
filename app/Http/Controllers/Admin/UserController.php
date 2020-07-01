<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller{

    public function __construct(){
        $this->middleware('auth');
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users    = User::paginate(5);
        $loggedId = Auth::id();

        $dados = [
            'users'    => $users,
            'loggedId' => $loggedId
        ];
        
        return view('admin.users.index',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $dados = $request->only('name','email','password','password_confirmation');
        $validator = Validator::make($dados,[
            'name'     => ['required','string','max:100'],
            'email'    => ['required','string','email','max:200','unique:users'],
            'password' => ['required','string','min:4','confirmed']
        ]);

        if($validator->fails()){
            return redirect()->route('users.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        $user = new User;
        $user->name     = $dados['name'];
        $user->email    = $dados['email'];
        $user->password = Hash::make($dados['password']);
        $user->save();

        return redirect()->route('users.index')->with('add','msg');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $user = User::find($id);
        return view('admin.users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $user = User::find($id);
        $dados = $request->only(['name','email']);

        $validator = Validator::make($dados,[
            'name'  => ['required','string','max:100'],
            'email' => ['required','string','email','max:200']
        ]);

        if($validator->fails()){
            return redirect()->route('users.edit',$id)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function del(Request $request){
        $id = $request->input('id');
        User::find($id)->delete();
        return redirect()->route('users.index')->with('del','msg');
    }
}
