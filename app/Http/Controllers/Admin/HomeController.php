<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Visitor;
use App\Page;
use App\User;

class HomeController extends Controller{

    public function __construct(){
      $this->middleware('auth');
    }
    
    public function index(){

        $visitsCount = 0;
        $onlineCount = 0;
        $pageCount   = 0;
        $userCount   = 0;

        $visitsCount = Visitor::count();

        $datelimit   = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $onlinelist  = Visitor::select('ip')->where('date_access','>=',$datelimit)->groupBy('ip')->get();
        $onlineCount = count($onlinelist);

        $pageCount = Page::count();
        $userCount = User::count();


        $pagePie = [];
        $visitsAll = Visitor::selectRaw('page,count(page) as c')->groupBy('page')->get();
        foreach($visitsAll as $visit){
            $pagePie[$visit['page']] = intval($visit['c']);
        }

        $pageLabels = json_encode(array_keys($pagePie));
        $pageValues = json_encode(array_values($pagePie));


        $data = [
          'visitsCount' => $visitsCount,
          'onlineCount' => $onlineCount,
          'pageCount'   => $pageCount,
          'userCount'   => $userCount,
          'userCount'   => $userCount,
          'pageLabels'  => $pageLabels,
          'pageValues'  => $pageValues,
        ];

        return view('admin.home',$data);
    }

    

}
