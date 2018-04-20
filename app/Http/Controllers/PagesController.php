<?php

namespace App\Http\Controllers;
use App\UserInfo;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title='welcome to the Homepage';

  
        return view('pages.index')->with('title', $title);
            
       
    }
    public function user()
    {   
        return view('pages.user',[
            'userinfo'=> UserInfo::all(),
        ]);
           
    }
    public function contact()
    {
        return view('pages.service');
       
    }
    public function blog()
    {
        return view('pages.blog');
       
    }
}
