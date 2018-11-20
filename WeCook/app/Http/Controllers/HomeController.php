<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\CateForbiden;
use App\Models\recette;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CF = CateForbiden::all()->where('status',1)->pluck('name','id');
        $bests = CateForbiden::all()->where('status',2)->pluck('name','id');
        $latests = recette::orderBy('created_at')->take(3)->get();
        $country = Country::all()->pluck('name','id');
        $recettes = recette::all();
        $listRecettes = [];
        foreach ($recettes as $recetteTitle) {
            $listRecettes[] .= "" . $recetteTitle->title . "";
        }
        return view('home.home',compact('CF','latests','bests','country','listRecettes'));

    }

    public function regimeSpe(){
        $CF = CateForbiden::all()->where('status',1)->pluck('name','id');
        return view('homePlus.regimes',compact('CF'));
    }
    public function country(){
        $CF = Country::all()->pluck('name','id');
        return view('homePlus.country',compact('CF'));
    }
}
