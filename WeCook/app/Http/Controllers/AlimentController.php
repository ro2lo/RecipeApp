<?php

namespace App\Http\Controllers;

use App\Models\Aliment;
use App\Models\Ingredient;
use App\Models\recette;
use Illuminate\Http\Request;

class AlimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter = false;
        $aliments =  Ingredient::orderBy('name', 'ASC')->get();
        $recettes = recette::all()->where('id',0);

        $listIngredients = [];
        foreach ( $aliments as $aliment){
            $listIngredients[] .= "".$aliment->name."";
        }
        return view('aliments.index', compact(
            'aliments',
            'filter',
            'recettes',
            'listIngredients'
        ));
    }


    public function filter(Request $request)
    {

        $input = $request->input();

        $al = [];
        if(isset($input['al'])){
            $al = unserialize($input['al']);
        }
        $add = true;
        $i = null;

        foreach ($al as $key => $arr){

            if($input['name'] == $arr){
                $i = $key;
                $add = false;
            }
        }

        if ($add == true){
            $al[] .= "".$input['name']."";
        }else{
            unset($al[$i]);
        }
        $countAl = count($al);
        $recettesBefore = recette::all();
        $filtred = [];
        $cate = [];
        foreach ($recettesBefore as $recette){
            $aliments = $recette->aliments;
            $i = 0;
            $a = 0;
            foreach ($aliments as $aliment){

                 if($countAl > 0){
                       foreach ($al as $a){
                     if($a === $aliment->ingredient->name){
                         $i++;
                     }
                     }
                 }else{
                         if($aliment->ingredient->name == $input['name']){
                             $filtred[] .= "".$recette->id."";
                             if($recette->cateRecette_id == 1){
                                 $cate += [$recette->cateRecette_id => "Entrée"];
                             }elseif($recette->cateRecette_id == 2){
                                 $cate += [$recette->cateRecette_id => "Plats"];
                             }elseif($recette->cateRecette_id == 3){
                                 $cate += [$recette->cateRecette_id => "Desserts"];
                             }elseif($recette->cateRecette_id == 4){
                                 $cate += [$recette->cateRecette_id => "Boissons"];
                             }elseif($recette->cateRecette_id == 5){
                                 $cate += [$recette->cateRecette_id => "Patisseries"];
                             }
                         }
                     }
             }
            if($i == $countAl){
                $filtred[] .= "".$recette->id."";
                if($recette->cateRecette_id == 1){
                    $cate += [$recette->cateRecette_id => "Entrée"];
                }elseif($recette->cateRecette_id == 2){
                    $cate += [$recette->cateRecette_id => "Plats"];
                }elseif($recette->cateRecette_id == 3){
                    $cate += [$recette->cateRecette_id => "Desserts"];
                }elseif($recette->cateRecette_id == 4){
                    $cate += [$recette->cateRecette_id => "Boissons"];
                }elseif($recette->cateRecette_id == 5){
                    $cate += [$recette->cateRecette_id => "Patisseries"];
                }
            }else{
                //do nothing
            }
        }
        $cate = array_unique($cate);
        $recettes = recette::whereIn('id', $filtred);

        $aliments =  Ingredient::orderBy('name', 'ASC')->get();
        $listIngredients = [];
        foreach ( $aliments as $aliment){
            $listIngredients[] .= "".$aliment->name."";
        }
        $filter = true;
        return view('aliments.index', compact(
            'aliments',
            'recettes',
            'al',
            'filter',
            'filtred',
            'listIngredients',
            'cate'
        ));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
