<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        return view('frontend.layout.home');
    }

    public function redirect(){

        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }
        else{
            return view('dashboard');
            // return view('frontend.layout.home');
        }

    }
}
