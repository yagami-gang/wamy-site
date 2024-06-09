<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $user = Auth::user();
        $userType = $user->typeUser;
        $type_user = $userType->pluck('user.role')->toArray();

        if(in_array('admin',$type_user)){
            return view('admin.home');
        }else if (in_array('user',$type_user)){
            return view('user.home');
        } else if (in_array('informaticien',$type_user)){
            return view('informaticien.home');
        }
    }
}
