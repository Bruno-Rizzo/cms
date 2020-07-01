<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Page;

class PageController extends Controller{

    public function __construct(){
        $this->middleware('auth');
     }
     
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $pages = Page::paginate(5);
        return view('admin.pages.index',['pages'=>$pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'],'-');
        $validator = Validator::make($data,[
            'title'=>['required','string','max:100'],
            'body' =>['string'],
            'slug' =>['required','string','max:100','unique:pages'],
        ]);
        if($validator->fails()){
            return redirect()->route('pages.create')
                             ->withErrors($validator)
                             ->withInput();
        }
        $page = new Page;
        $page->title = $data['title'];
        $page->slug  = $data['slug'];
        $page->body  = $data['body'];
        $page->save();
        return redirect()->route('pages.index')->with('pageAdd','msg');
    }

    /**
     * Display the specified resource.
    */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit($id){
        $page = Page::find($id);
        return view('admin.pages.edit',['page'=>$page]);
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, $id){
        $page = Page::find($id);
        $dados = $request->only(['title','body']);

        if($page['title'] !== $dados['title']){

            $dados['slug'] = Str::slug($dados['title'],'-');

            $validator = Validator::make($dados,[
                'title'  => ['required','string','max:100'],
                'body'   => ['required','string'],
                'slug'   => ['required','string','max:100','unique:pages']
            ]);

        }else{
            $validator = Validator::make($dados,[
                'title'  => ['required','string','max:100'],
                'body'   => ['required','string']
            ]);
        }


        if($validator->fails()){
            return redirect()->route('pages.edit',$id)
                             ->withErrors($validator)
                             ->withInput();
        }

        $page->title = $dados['title'];
        $page->body  = $dados['body'];

        if(!empty($dados['slug'])){
            $page->slug = $dados['slug'];
        }

        $page->save();
        return redirect()->route('pages.index')->with('pageEdit','msg'); 
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy($id){
        
    }

    public function del(Request $request){
        $id = $request->input('id');
        Page::find($id)->delete();
        return redirect()->route('pages.index')->with('pageDel','msg');
    }


}
