<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Multipic;

class AboutusController extends Controller
{
    public function __construct(){
        $this ->middleware('auth');
    }

    public function index(){
       return view('about');
    }

    public function Portifolio() {
        $images = Multipic::all();
        return view('pages.portifolio', compact('images'));
    }
}
