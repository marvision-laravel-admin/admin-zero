<?php

namespace MarvisionLaravelAdmin\AdminZero\Http\Controllers;

use App\Http\Controllers\Controller;
class DashboardController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');

    }

	public function index(){
		// \App::setLocale('fr');  
		return view('AdminZeroView::dashboard'); 
 

	}
}