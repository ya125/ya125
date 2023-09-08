<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Product;

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
        if(Auth::user()->role == 0){
            return view('owner/ownerpage');
        } else{
            $product = new Product;
        
            $all = $product->all();
    
            return view('user.main', [
                'products' => $all,
            ]);
        }
    }

    public function ownermainForm()
    {
        return view('owner/owner_main');
        
    }
  
    public function userlist(){
        return view('owner/user_list');
    }

    
}
