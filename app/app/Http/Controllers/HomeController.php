<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    protected $redirectedTo = '/toppage';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')
        ->except('about');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(Auth::user()->role == 0){
            $user = User::where('role', '1')->get();
            return view('owner/ownerpage', [
                'users' => $user,
            ]);
        } else{
            $product = new Product;
        
            $word = $request->word; 
            $from = $request->from;
            $to = $request->to;
            if(isset($word)){
                $product = $product->where('name', 'LIKE', '%'.$word.'%')
                ->orWhere('text', 'LIKE', '%'.$word.'%');
            }
            
        //    if(isset($from) && isset($to)){
        //         $product = $product->where('amount', [$from, $to]);
        //    }
            if(isset($from)){
                $product = $product->where('amount', '>=', $from);
            }
            if(isset($to)){
                $product = $product->where('amount', '<=', $to);
            }
            $all = $product->where('del_flg', '=', '0')->get();

            // $product->where(function($product) use($from,$to){
            //     $product->where('amount', '>=', $from)
            //           ->orWhere('amount', '<=', $to)
            // });
            
            // dd($all);
            
            return view('user.main', [
                'products' => $all,
                'word' => $word,
                'from' => $from,
                'to' => $to,
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

    public function toppage(){
        return view('user.main');
    }
}
