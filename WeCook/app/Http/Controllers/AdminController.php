<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\recette;
use App\Models\Aliment;
use App\Models\CateAliment;
use App\Models\CateForbiden;
use App\Models\Player;
use App\Models\Country;
use App\Models\CateRecette;
use App\Models\TypePlat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recettes = recette::all()->where('visible',0);
        return view('admin.index', compact('recettes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::pluck('name', 'id');
        $cateRecette = CateRecette::pluck('name', 'id');
        $cateForbiden = CateForbiden::pluck('name', 'id');
        $aliments = Ingredient::pluck('name', 'id');
        return view('admin.create', compact('country','cateRecette','aliments','cateForbiden'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->input();
        $this->validate($request,[
            'mode' => 'required',
        ]);
        if($input['mode'] == "1"){
            return $this->storeCateForbiden($request);
        }elseif($input['mode'] == "2"){
           return  $this->storeForbidenByPlayer($request);
        }elseif($input['mode'] == "3"){
            return $this->storeCateAliments($request);
        }elseif($input['mode'] == "4"){
            return $this->storeAliments($request);
        }elseif($input['mode'] == "5"){
            return $this->storeIngredient($request);
        }elseif($input['mode'] == "6"){
            return $this->storeTypePlat($request);
        }elseif($input['mode'] == "7"){
            return $this->storePlayerTypePlat($request);
        }elseif ($input['mode'] == "create"){
            $this->validate($request,[

                'title' => 'required|unique:recettes|max:100',
                'description' => 'required|Between:1,300',
                'toknow' => 'required|Between:1,300',
                'time' => 'required|Between:1,300',
                'iframe' => 'required|Between:1,10000',
                'picture' => 'required|Between:1,10000',
                'vid' => 'required|Between:1,300',
                'nbPers' => 'required',
                'visible',
                'cateRecette_id' => 'required',
                'country_id'
            ]);
            $recette = new recette();
            $input = $request->input();
            $input['user_id'] = Auth::user()->id;
            //dd($input);
            $recette->fill($input)->save();
            return redirect()->route('admin.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCateForbiden($request)
    {
        $this->validate($request,[

            'name' => 'required|max:100',
            'status' => 'required',
        ]);
        $cateForbiden = new CateForbiden();
        $input = $request->input();
        $cateForbiden->fill($input)->save();
        return redirect()->back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeForbidenByPlayer(Request $request)
    {
        $this->validate($request,[

            'cateForbiden_id' => 'required',
            'recette_id' => 'required',
        ]);
        $player = new Player();
        $input = $request->input();
        $player->fill($input)->save();
        return redirect()->back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAliments(Request $request)
    {
        $this->validate($request,[
            'qt' => 'required|Between:1,20',
            'qtType' => 'Between:1,200',
            'qtToShow' => 'required|Between:1,200',
            'recette_id' => 'required',
            'ingredient_id' => 'required'
        ]);
        $aliment = new Aliment();
        $input = $request->input();
        //dd($input);
        $aliment->fill($input)->save();
        return redirect()->back();
    }
    public function storeIngredient(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'cateAliment_id' => 'required',
        ]);
        $aliment = new Ingredient();
        $input = $request->input();
        //dd($input);
        $aliment->fill($input)->save();
        return redirect()->back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCateAliments(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:cateAliments'
        ]);
        $aliment = new CateAliment();
        $input = $request->input();
        //dd($input);
        $aliment->fill($input)->save();
        return redirect()->back();
    }
    public function storeTypePlat(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:typePlats'
        ]);
        $typePlat = new TypePlat();
        $input = $request->input();
        //dd($input);
        $typePlat->fill($input)->save();
        return redirect()->back();
    }

    public function storePlayerTypePlat(Request $request)
    {
        $this->validate($request,[
            'typeplat_id' => 'required'
        ]);
        $playerTP = new Player();
        $input = $request->input();
        //dd($input);
        $playerTP->typePlat_id = $input['typeplat_id'];
        $playerTP->recette_id = $input['recette_id'];
        $playerTP->save();
        return redirect()->back();
    }


    public function storeIndexCate(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:caterecettes'
        ]);
        $aliment = new CateRecette();
        $input = $request->input();
        //dd($input);
        $aliment->fill($input)->save();
        return redirect()->back();
    }
    public function storeCountry(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:Country'
        ]);
        $aliment = new Country();
        $input = $request->input();
        //dd($input);
        $aliment->fill($input)->save();
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recette = Recette::findOrFail($id);
        return view('admin.show')->with('recette',$recette);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recette = Recette::findOrFail($id);
        $country = Country::pluck('name', 'id');
        $cateRecette = CateRecette::pluck('name', 'id');
        $cateForbiden = CateForbiden::pluck('name', 'id');
        $allCateForbiden = CateForbiden::all();
        $cateAliment = CateAliment::pluck('name', 'id');
        $typesPlat = TypePlat::pluck('name', 'id');
        $ingredients = Ingredient::pluck('name', 'id');
        $player = Player::all()->where('recette_id',$id);
        return view('admin.edit', compact('recette','typesPlat','country','cateRecette','cateForbiden','cateAliment','player','allCateForbiden','ingredients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'title' => 'required|max:1000',
            'description' => 'required|Between:1,300',
            'toknow' => 'required|Between:1,300',
            'time' => 'required|Between:1,300',
            'iframe' => 'required|Between:1,10000',
            'vid' => 'Between:1,300',
            'kcal' => 'Between:1,300',
            'nbPers' => 'required',
            'visible',
            'cateRecette_id' => 'required',
            'country_id'
        ]);
        $recette = recette::findOrFail($id);
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;
        //dd($input);
        $recette->fill($input)->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
