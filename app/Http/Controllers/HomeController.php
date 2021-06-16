<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    //

    public function index(Request $request)
    {
        $pagetitle = 'ホーム';
        $applies = \App\ClientApply::where('status',0)->get();
        
        // Blade への引数
        $bladeArgs = array(
            'pagetitle',
            'applies'
        );
       
        return view('home', compact($bladeArgs));
    }
}
