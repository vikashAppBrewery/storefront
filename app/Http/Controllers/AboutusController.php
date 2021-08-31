<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function __construct(){
        $this ->middleware('auth');
    }

    public function index(){
       return view('about');
    }
}
