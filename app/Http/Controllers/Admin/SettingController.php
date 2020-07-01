<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Setting;

class SettingController extends Controller{

    public function __construct(){
        $this->middleware('auth');
     }

    public function index(){
        $settings = [];
        $dbsettings = Setting::all();

        foreach($dbsettings as $db){
            $settings[ $db['name'] ] = $db['content'];
        }

        return view('admin.settings.index',['settings'=>$settings]);

    }

    public function save(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,[
            'title'    => ['required','string','max:25'],
            'subtitle' => ['required','string','max:25'],
            'email'    => ['required','email'],
        ]);

        if($validator->fails()){
            return redirect()->route('settings')
                             ->withErrors($validator);
        }
        
        foreach($data as $item=>$value){
            Setting::where('name',$item)->update(['content'=>$value]);
        }

        return redirect()->route('settings')->with('config','msg');

    }
    
}
