<?php

namespace App\Http\Controllers;

use App\Mail\getListe;
use App\Models\CateForbiden;
use App\Models\Country;
use App\Models\Ingredient;
use App\Models\recette;
use App\Models\UsersListe;
use Illuminate\Http\Request;
use App\Models\NameList;
use App\Models\Listes;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



class ListesController extends Controller
{
    public function __construct()    {
        $this->middleware('AuthProperty', ['only' => ['index','updateList']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $auth = Auth::user()->id;
            $userListes1 = UsersListe::where('user_id',$auth)->where('validate',1)->get();
        $ListesID = [];
        foreach ($userListes1 as $userListe){
            $ListesID[] .= "". $userListe->nameList_id ."";
        }
            $userListes2 = UsersListe::where('user_id',$auth)->where('validate',2)->get();
        $othersListesID = [];
        foreach ($userListes2 as $userListe){
            $othersListesID[] .= "". $userListe->nameList_id ."";
        }

        $listes = NameList::where('user_id',$auth)->orderBy('id','desc')->get();
        $invited = NameList::WhereIn('id',$ListesID)->orderBy('id','desc')->get();

            $othersListes = NameList::all()->whereIn('id',$othersListesID);

            return view('listes.index', compact(
            'listes', 'othersListes','invited','userListes2'
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listes.create');
    }
    public function selectList(Request $request)
    {
        $this->validate($request,[
            'nameList_id' => 'required',
            'recette_id' => 'required',
        ]);
        $input = $request->input();
        $id = $input['nameList_id'];
        $recetteId = $input['recette_id'];
        return redirect()->route('createList',['id' => $id,'recetteId' => $recetteId]);
    }
    public function createList($id,$recetteId)
    {
        $liste = NameList::findOrFail($id);

        return view('listes.createList', compact(
            'liste','recetteId'
        ));
    }
    public function switchList(Request $request)
    {
        $this->validate($request,[
            'nameList_id' => 'required',
            'day' => 'required',
            'recette_id' => 'required',
            'nbPers' => 'required',
            'listToSwitch' => 'required'
        ]);
        $input = $request->input();
        $listToSwitch = Listes::findOrFail($input['listToSwitch']);
        $listToSwitch->nbPers = $input['nbPers'];
        $listToSwitch->recette_id = $input['recette_id'];
        $listToSwitch->save();
        $id = NameList::findOrFail($input['nameList_id']);
        return redirect()->route('userTimeline', ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNameList(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'date' => 'required',
        ]);
        $input = $request->input();

        $nameList = new NameList();

        $nbByDay = '';
        $nbTypes = '';
        if(isset($input['midi'])){$nbByDay = $nbByDay.'2';}
        if(isset($input['soir'])){$nbByDay = $nbByDay.'3';}
        if(isset($input['entree'])){$nbTypes = $nbTypes.'1';}
        if(isset($input['plat'])){$nbTypes = $nbTypes.'2';}
        if(isset($input['dessert'])){$nbTypes = $nbTypes.'3';}
        if (isset($input['regime']) && $input['regime']!= null){$nbByDay = 23; $nbTypes = 23;}

        $input['user_id'] = Auth::user()->id;
        if ($nbByDay == ''){$nbByDay = '2';}
        if ($nbTypes == ''){$nbTypes = '2';}
        $nameList->nbByDay = intval($nbByDay);
        $nameList->type = intval($nbTypes);
        $nameList->fill($input)->save();

        $nbByDay = strlen((string) $nameList->nbByDay);
        $nbTypes = strlen((string) $nameList->type);



        for($i = 0; $i < ($nameList->nbDay+1); $i++){
            for ($a = 0; $a < $nbByDay; $a++){

                for($y = $nbTypes;$y > 0; $y--){
                    $list = new Listes();
                    $list->nameList_id = $nameList->id;
                    $list->day = $i;
                    $list->nbPers = $nameList->usersListe->count()+1;
                    $list->recette_id =  null;
                    $list->save();
                }
            }
        }
        return redirect('/profile/liste/'.$nameList->id);
    }

    public function returnRecettes(Request $request)
    {
        $this->validate($request, [
            'time' ,
            'budget',
            'myIng',
            'nameList_id' => 'required'
        ]);

        $input = $request->input();

        $nameList = NameList::findOrFail($input['nameList_id']);
        $recettes = recette::all()->whereIn('cateRecette_id',[1,2,3]);

        $nbByDay = strlen((string) $nameList->nbByDay);
        $nbTypes = strlen((string) $nameList->type);
        $nb = ($nameList->usersListe->count()+1);

        if (Auth::check() && count(Auth::user()->regimeSpecial) > 0){
            $idRecettesRegimeSpecial = [];
            foreach (Auth::user()->regimeSpecial as $regimeSpecial){
                if(count($regimeSpecial->cateForbiden->player) > 0){
                    foreach ($regimeSpecial->cateForbiden->player as $player){
                    $idRecettesRegimeSpecial[] .= "" . $player->recette_id . "";
                }
            }else{
                return redirect()->back()->withErrors('Aucune recette disponible pour la selection :/ Pensez à vérifier la cohérence entre votre recherche et les filtres actuelle de votre profil.');
            }
            }
            $recettes = $recettes->whereIn('id',$idRecettesRegimeSpecial);
        }


        if (Auth::check() && count(Auth::user()->mieuxManger) > 0){
            $idRecettesMieuxManger = [];
            foreach (Auth::user()->mieuxManger as $regimeSpecial){
                if(count($regimeSpecial->cateForbiden->player) > 0){
                    foreach ($regimeSpecial->cateForbiden->player as $player){
                        $idRecettesMieuxManger[] .= "" . $player->recette_id . "";
                    }
                }else{
                    return redirect()->back()->withErrors('Aucune recette disponible pour la selection :/ Pensez à vérifier la cohérence entre votre recherche et les filtres actuelle de votre profil.');
                }

            }
            $recettes = $recettes->whereIn('id',$idRecettesMieuxManger);
        }

        if (Auth::check() && count(Auth::user()->CateIngredientsInterdits) > 0){
            $idRecettesCateIngredientsInterdits = [];
            if (count($recettes) > 0){
                foreach ($recettes as $recette){
                    $add = true;
                    foreach ($recette->aliments as $aliment){
                        foreach (Auth::user()->CateIngredientsInterdits as $cateInterdit){
                            if(isset($cateInterdit->cateAliment->id) && $aliment->ingredient->sousCateAlilment_id == $cateInterdit->cateAliment->id){
                                $add = false;
                            }
                        }
                    }
                    if ($add == true){
                        $idRecettesCateIngredientsInterdits[] .= "" . $recette->id . "";

                    }
                }

                $recettes = $recettes->whereIn('id',$idRecettesCateIngredientsInterdits);
            }else{
                return redirect()->back()->withErrors('Aucune recette disponible pour la selection :/ Pensez à vérifier la cohérence entre votre recherche et les filtres actuelle de votre profil.');
            }

        }



        if ($input['country'] != "0" && $input['country'] != null){
            $recettes = $recettes->whereIn('country_id',$input['country']);
            $country = $input['country'];
        }else{
            $country = null;
        }
        if (isset($input['time']) != "0"){
            $recettes = $recettes->where('time','<=',$input['time']);
            $time = intval($input['time']);
        }else{
            $time = 9999999999999999999999999;
        }

        if (isset($input['budget']) > 0) {
            $max = intval($input['budget']);
        }else{
            $max = 99999999999999999999999999;
        }

        if (isset($input['qt'])) {
            $qt = intval($input['qt']);
        }else{
            $qt =  null;
        }
        if (count($recettes) > 0) {
            if (isset($input['myIng']) == 1) {
                $ingId = [];
                foreach ($recettes as $recette) {
                    foreach ($recette->aliments as $ing) {
                        $ingId[] .= "" . $ing->ingredient->id . "";
                    }
                }
                $ingredients = Ingredient::all()->whereIn('id', $ingId);
                return view('listes.choiceIngredients', compact('ingredients', 'nameList', 'country', 'time', 'max', 'qt'));
            }
        }else{
            return redirect()->back()->withErrors('Aucune recette disponible pour la selection :/ Pensez à vérifier la cohérence entre votre recherche et les filtres actuelle de votre profil.');
        }

        $chekedRecettes = [];
        if (isset($input['mode']) == 'selection' && isset($input['selected'])){
            foreach($input['selected'] as $arr => $key) {
                $chekedRecettes[] .= "".$key."";
            }
        }

        $ingredientsId = [];
        $chekedIngredients = [];
        if (isset($input['mode']) == 'ingredient' && isset($input['selected'])){
                    foreach($input['selected'] as $arr => $key) {
                        $chekedIngredients[] .= "".$key."";
                    }
            foreach($recettes as $recette) {
                foreach ($recette->aliments as $aliment){
                    $in = false;
                    foreach ($ingredientsId as $key => $arr){
                        if ($arr == $aliment->ingredient->id){
                            $in = true;
                        }
                    }
                    if ($in == false){
                        $ingredientsId[]  .=  "".$aliment->ingredient->id."";
                    }
                }
            };
        }else{
            $ingredientsId = [];
            foreach($recettes as $recette) {
                foreach ($recette->aliments as $aliment){
                    $ingredientsId[]  .=  "".$aliment->ingredient->id."";
                }
            };
        }

        $ingredients = Ingredient::all()->whereIn('id',$ingredientsId);
        // Rajouter le if ingredients interdits dans le profile

        $arrToMix = [];
        foreach ($ingredients as $ingredient){
            array_push($arrToMix,[
                'prix' => $ingredient->prixMin,
                'prixGramme' => $ingredient->prixGramme,
                'id' => $ingredient->id,
                'qtMin' => $ingredient->qtMin,
                'qtMinToAdd' => $ingredient->qtMinToAdd,
            ]);
        }
        $selectIngredients = [];
        shuffle($arrToMix);
        foreach ($arrToMix as $key => $arr){
            array_push($selectIngredients,[
                $arrToMix[$key]['id'],
            ]);
        }

        if (isset($input['budget']) > 0 && $input['qt'] == 1 && count($recettes) > 0){
            $max = intval($input['budget']);
            $recettes = $this->recettesPrice($recettes,$max,$nbByDay,$nameList,$chekedRecettes,$selectIngredients,$nb);
        }elseif((isset($input['budget']) == null || isset($input['budget']) == 0 ) && $input['qt'] == 1 && count($recettes) > 0){
            $max = 999999999999999999999999999;
            $recettes = $this->recettesPrice($recettes,$max,$nbByDay,$nameList,$chekedRecettes,$selectIngredients,$nb);
        }elseif(isset($input['budget']) > 0 && $input['qt'] == 0 && count($recettes) > 0){
            $max = intval($input['budget']);
            $recettes = $this->recettesPriceGramme($recettes,$max,$nbByDay,$nameList,$chekedRecettes,$selectIngredients,$nb);
        }elseif((isset($input['budget']) == null || isset($input['budget']) == 0 ) && $input['qt'] == 0 && count($recettes) > 0){
            $max = 999999999999999999999999999;
            $recettes = $this->recettesPriceGramme($recettes,$max,$nbByDay,$nameList,$chekedRecettes,$selectIngredients,$nb);
        }else{
            return redirect()->back()->withErrors('Aucune recette disponible pour la selection :/ Pensez à vérifier la cohérence entre votre recherche et les filtres actuelle de votre profil.');
        }

        if (count($recettes) < 1){ return redirect()->back()->withErrors('Aucun résultat pour votre recherche'); }


        return view('listes.choiceRecettes',compact('recettes','nameList','nbByDay','nbTypes','chekedRecettes','country','time','max','fullPrice','qt'));

    }

    public function recettesPrice($recettes,$max,$nbByDay,$nameList,$chekedRecettes,$selectIngredients,$nb){

//  calculer le prix d'une recette dans show ($a->ingredient->prixG*$aliment->qt)
//        2nd temps
// créer une db product reliée aux ingrédients (ingrdients as many product)
// démarcher des marques



        $recettesId = [];
        foreach($recettes as $recette) {
            $count = 0;
            foreach ($recette->aliments as $aliment){
                foreach ($selectIngredients as $key => $arr){
                    if($arr[0] == $aliment->ingredient->id){
                        $count++;
                    }
                }
            }
            if($count == $recette->aliments->count()){
                $recettesId[] .= "".$recette->id."";
            }
        };

        $recettes = recette::all()->whereIn('id',$recettesId);

        $Idc = [];
        if (count($chekedRecettes) > 0){
            foreach ($chekedRecettes as $key => $arr){
            $Idc[] .= "".$arr."";
        }
        }

        $Idn = [];

        foreach ($recettes as $recette){
            $add = true;
            if (count($chekedRecettes) > 0){
                foreach ($chekedRecettes as $key => $arr){
                if ($recette->id == $arr){
                    $add = false;
                }
            }
            }
            if($add == true){
                $Idn[] .= "".$recette->id."";
            }
        }

        shuffle($Idn);
       $Ids = array_merge($Idc,$Idn);

        $prix = 0;
        $arrToCompare1 = [];
        foreach ($Ids as $key){
            $selection = 0;
            $recette = recette::findOrFail($key);
            if (count($chekedRecettes) > 0){
                foreach ($chekedRecettes as $ar => $ke){
                    if ($recette->id == $ke){
                        $selection = 1;
                    }
                }
            }
            foreach ($recette->aliments as $a){
                $isIn = false;
                foreach($arrToCompare1 as $key => $ar){
                    if($a->ingredient->id == $ar[0]['id']){
                        $isIn = true;
                        if (($arrToCompare1[$key][0]['qt'] + (($a->qt/$recette->nbPers)*$nb)) < $ar[0]['qtMin']){
                            $arrToCompare1[$key][0]['qt'] = $ar[0]['qt'] + (($a->qt/$recette->nbPers)*$nb);
                        }elseif ((((($a->qt/$recette->nbPers)*$nb)/$a->ingredient->qtMin)*$a->ingredient->prixMin) <= $max || $selection == 1){
                            $qt =  $ar[0]['qtMin'];
                            $y = 0;
                            while (($ar[0]['qt'] + (($a->qt/$recette->nbPers)*$nb)) > $qt){
                                $y++;
                                $qt += $a->ingredient->qtMinToAdd;
                            }
                            $prixTest = $max - ($a->ingredient->prixGramme*($a->ingredient->qtMinToAdd*$y));
                            if($prixTest >= 0)  {
                                $max -= ($a->ingredient->prixGramme*($a->ingredient->qtMinToAdd*$y));
                                $arrToCompare1[$key][0]['qt'] = $ar[0]['qt'] + (($a->qt/$recette->nbPers)*$nb);
                                $arrToCompare1[$key][0]['qtMin'] = $qt;
                                $arrToCompare1[$key][0]['prixMin'] = $ar[0]['prixMin']+($a->ingredient->prixGramme*($a->ingredient->qtMinToAdd*$y));
                            }
                        }
                    }
                }

                if($isIn == false){
                    if (($a->qt/$recette->nbPers)*$nb <= $a->ingredient->qtMin){
                        $arrToCompare1[] = array(
                            [
                                'id' => "".$a->ingredient->id."",
                                'qt' => "".($a->qt/$recette->nbPers)*$nb."",
                                'qtMin' => "".$a->ingredient->qtMin."",
                                'prixMin' => "".$a->ingredient->prixMin."",
                            ]
                        );
                    }elseif ((((($a->qt/$recette->nbPers)*$nb)/$a->ingredient->qtMin)*$a->ingredient->prixMin) <= $max || $selection == 1){
                        $qt = $a->ingredient->qtMin;
                        $y = 0;
                        while ((($a->qt/$recette->nbPers)*$nb) > $qt){
                            $y++;
                            $qt += $a->ingredient->qtMinToAdd;
                        }
                        $prixTest = $max - ($a->ingredient->prixGramme *($a->ingredient->qtMinToAdd*$y));
                        if($prixTest >= 0)  {
                            $max -= ($a->ingredient->prixGramme*($a->ingredient->qtMinToAdd*$y));
                            $arrToCompare1[] = array(
                                [
                                    'id' => "".$a->ingredient->id."",
                                    'qt' => "".($a->qt/$recette->nbPers)*$nb."",
                                    'qtMin' => "".$qt."",
                                    'prixMin' => "".($a->ingredient->prixMin+($a->ingredient->prixGramme*($a->ingredient->qtMinToAdd*$y)))."",
                                ]
                            );
                        }
                    }
                }
            }
        }

        foreach($arrToCompare1 as $key => $ar){
            if($arrToCompare1[$key][0]['qt'] <= $arrToCompare1[$key][0]['qtMin']){
                $prix += $arrToCompare1[$key][0]['prixMin'];
            }
        }
        $prixSupp = $max - $prix;
        $arrToCompare = [];
        $recettesIdFinal = [];
        $recettesIdTotal = [];

        foreach ($Ids as $keyId){
            $count = 0;
            $prixRecette =0;
            $recette = recette::findOrFail($keyId);
            foreach ($recette->aliments as $a){
                $isIn = false;
                foreach($arrToCompare as $key => $ar){

                    if($a->ingredient->id == $ar[0]['id']){
                        $isIn = true;
                        if (($arrToCompare[$key][0]['qt'] + ($a->qt/$recette->nbPers)*$nb) <= $ar[0]['qtMin']){
                            $arrToCompare[$key][0]['qt'] = $ar[0]['qt'] + (($a->qt/$recette->nbPers)*$nb);
                            $count++;
                            $prixRecette += $arrToCompare[$key][0]['prixMin'];
                        }elseif (((($ar[0]['qt'] + (($a->qt/$recette->nbPers)*$nb))/$a->ingredient->qtMin)*$a->ingredient->prixMin) <= $prixSupp){
                            $qt =  $ar[0]['qtMin'];
                            $y = 0;
                            while (($ar[0]['qt'] + ($a->qt/$recette->nbPers)*$nb) > $qt){
                                $y++;
                                $qt += $a->ingredient->qtMinToAdd;
                            }
                            $prixTest = $prixSupp - ($a->ingredient->prixGramme*($a->ingredient->qtMinToAdd*$y));
                            if($prixTest >= 0)  {
                                $count++;
                                $prixSupp -= ($a->ingredient->prixGramme*($a->ingredient->qtMinToAdd*$y));
                                $arrToCompare[$key][0]['qt'] = $ar[0]['qt'] + (($a->qt/$recette->nbPers)*$nb);
                                $arrToCompare[$key][0]['qtMin'] = $qt;
                                $arrToCompare[$key][0]['prixMin'] = $ar[0]['prixMin']+($a->ingredient->prixGramme*($a->ingredient->qtMinToAdd*$y));
                                $prixRecette += $arrToCompare[$key][0]['prixMin'];
                            }
                        }
                    }
                }
                if($isIn == false){
                    if (($a->qt/$recette->nbPers)*$nb <= $a->ingredient->qtMin){
                        $arrToCompare[] = array(
                            [
                                'id' => "".$a->ingredient->id."",
                                'qt' => "".($a->qt/$recette->nbPers)*$nb."",
                                'qtMin' => "".$a->ingredient->qtMin."",
                                'prixMin' => "".$a->ingredient->prixMin."",
                            ]

                        );
                        $prixRecette += $a->ingredient->prixMin;
                        $count++;
                    }elseif ((((($a->qt/$recette->nbPers)*$nb)/$a->ingredient->qtMin)*$a->ingredient->prixMin) <= $prixSupp){
                        $qt = $a->ingredient->qtMin;
                        $y = 0;
                        while (($a->qt/$recette->nbPers)*$nb > $qt){
                            $y++;
                            $qt += $a->ingredient->qtMinToAdd;
                        }
                        $prixTest = $prixSupp - ($a->ingredient->prixGramme *($a->ingredient->qtMinToAdd*$y));

                        if($prixTest >= 0)  {
                            $count++;
                            $prixSupp -= ($a->ingredient->prixGramme * ($a->ingredient->qtMinToAdd*$y));
                            $prixRecette += $a->ingredient->prixMin+($a->ingredient->prixGramme*($a->ingredient->qtMinToAdd*$y));
                            $arrToCompare[] = array(
                                [
                                    'id' => "".$a->ingredient->id."",
                                    'qt' => "".($a->qt/$recette->nbPers)*$nb."",
                                    'qtMin' => "".$qt."",
                                    'prixMin' => "".($a->ingredient->prixMin+($a->ingredient->prixGramme*($a->ingredient->qtMinToAdd*$y)))."",
                                ]
                            );
                        }
                    }
                }
            }
            if($count == $recette->aliments->count()){
                array_push($recettesIdTotal,[
                    0 => [
                        'recette_id' => $keyId
                    ],
                    1 => [
                        'total' => $prixRecette
                    ],
                    [
                        'cateRecette_id' => $recette->cateRecette_id
                    ]
                ]);
            }
        }
        $toHave = ($nameList->nbDay*$nbByDay);
        $try =0;
        $typePlat = array(1=>0,2=>0,3=>0);
        $fullPrice = 0;
//        while (($typePlat[1] < $toHave && $typePlat[2] < $toHave && $typePlat[3] < $toHave) or $try < 1 ){
//            $try++;
            foreach ($recettesIdTotal as $key => $arr){
                $price = $arr[1]['total'];
                $a = strstr($nameList->type,strval($arr[2]['cateRecette_id']));
                if($a != false and $max >= $price and $typePlat[$arr[2]['cateRecette_id']] < $toHave){
                    $max -= $price;
                        $fullPrice += $price;
                        $recettesIdFinal[] .= "".$arr[0]['recette_id']."";
                        $typePlat[$arr[2]['cateRecette_id']]++;
                    }
            }
//        }



        $recettes = recette::all()->whereIn('id',$recettesIdFinal);

        $Ids2 = [];
        foreach ($recettes as $recette){
            $Ids2[] .= "".$recette->id."";
        }



        $arrayForCate = array(0 => 0,1 => 0,2 => 0);
        $arrFin[] = array();

        foreach($Ids2 as $key) {
            $recette = recette::findOrFail($key);
            for ($y = 0;$y < 3; $y++)
                if($recette->cateRecette_id == ($y+1)){
                    $arrFin[$y][$arrayForCate[$y]][] = "".$recette->id."";
                    $arrayForCate[$y] += 1;
                }
        }

        $recettes = recette::all()->whereIn('id',$Ids2);


        return $recettes;


    }

    public function recettesPriceGramme($recettes,$max,$nbByDay,$nameList,$chekedRecettes,$selectIngredients,$nb){
        $recettesId = [];
        foreach($recettes as $recette) {
            $count = 0;
            foreach ($recette->aliments as $aliment){
                foreach ($selectIngredients as $key => $arr){
                    if($arr[0] == $aliment->ingredient->id){
                        $count++;
                    }
                }
            }
            if($count == $recette->aliments->count()){
                $recettesId[] .= "".$recette->id."";
            }
        };
        $recettes = recette::all()->whereIn('id',$recettesId);

        $Idc = [];
        if (count($chekedRecettes) > 0){
            foreach ($chekedRecettes as $key => $arr){
                $Idc[] .= "".$arr."";
            }
        }

        $Idn = [];
        foreach ($recettes as $recette){
            $add = true;
            if (count($chekedRecettes) > 0){
                foreach ($chekedRecettes as $key => $arr){
                    if ($recette->id == $arr){
                        $add = false;
                    }
                }
            }
            if($add == true){
                $Idn[] .= "".$recette->id."";
            }
        }

        shuffle($Idn);
        $Ids = array_merge($Idc,$Idn);




        $arrToCompare = [];
        $recettesIdFinal = [];
        $recettesIdTotal = [];
        $test = $max;

        foreach ($Ids as $keyId){
            $count = 0;
            $prixRecette =0;
            $recette = recette::findOrFail($keyId);
            foreach ($recette->aliments as $a){

                $isIn = false;
                foreach($arrToCompare as $key => $ar){
                    if($a->ingredient->id == $ar[0]['id']){
                        $isIn = true;
                        if ((($arrToCompare[$key][0]['qt'] + (($a->qt/$recette->nbPers)*$nb)) * $a->ingredient->prixGramme) <= $test){
                            $count++;
                            $test -= (($a->qt/$recette->nbPers)*$nb)*($a->ingredient->prixGramme);
                            $arrToCompare[$key][0]['qt'] = $ar[0]['qt'] + (($a->qt/$recette->nbPers)*$nb);
                            $arrToCompare[$key][0]['prix'] = $arrToCompare[$key][0]['qt'] * $a->prixGramme;
                            $prixRecette += (($a->qt/$recette->nbPers)*$nb) * $a->ingredient->prixGramme;
                        }
                    }
                }

                if($isIn == false){
                    if (((($a->qt/$recette->nbPers)*$nb) * $a->ingredient->prixGramme) <= $test){
                        $count++;
                        $test -= (($a->qt/$recette->nbPers)*$nb)*($a->ingredientprixGramme);
                        $arrToCompare[] = array(
                            [
                                'id' => "".$a->ingredient->id."",
                                'qt' => "".($a->qt/$recette->nbPers)*$nb."",
                                'prix' => "".(($a->qt/$recette->nbPers)*$nb)*$a->ingredient->prixGramme."",
                            ]
                        );
                        $prixRecette += (($a->qt/$recette->nbPers)*$nb)*$a->ingredient->prixGramme;
                    }
                }
            }
            if($count == $recette->aliments->count()){
                array_push($recettesIdTotal,[
                    0 => [
                        'recette_id' => $keyId
                    ],
                    1 => [
                        'total' => $prixRecette
                    ],
                    [
                        'cateRecette_id' => $recette->cateRecette_id
                    ]
                ]);
            }
        }
        $toHave = ($nameList->nbDay*$nbByDay);
//        $try =0;
        $typePlat = array(1=>0,2=>0,3=>0);
        $fullPrice = 0;
//        while (($typePlat[1] < $toHave && $typePlat[2] < $toHave && $typePlat[3] < $toHave) or $try < 1 ){
//            $try++;

        foreach ($recettesIdTotal as $key => $arr){
                $price = $arr[1]['total'];
            $a = strstr($nameList->type,strval($arr[2]['cateRecette_id']));
                        if($a != false and $max >= $price and $typePlat[$arr[2]['cateRecette_id']] < $toHave){
                            $max -= $price;
                            $fullPrice += $price;
                            $recettesIdFinal[] .= "".$arr[0]['recette_id']."";
                            $typePlat[$arr[2]['cateRecette_id']]++;
                        }
            }
//        }
        $recettes = recette::all()->whereIn('id',$recettesIdFinal);

        $Ids2 = [];
        foreach ($recettes as $recette){
            $Ids2[] .= "".$recette->id."";
        }



        $arrayForCate = array(0 => 0,1 => 0,2 => 0);
        $arrFin[] = array();

        foreach($Ids2 as $key) {
            $recette = recette::findOrFail($key);
            for ($y = 0;$y < 3; $y++)
                if($recette->cateRecette_id == ($y+1)){
                    $arrFin[$y][$arrayForCate[$y]][] = "".$recette->id."";
                    $arrayForCate[$y] += 1;
                }
        }

        $recettes = recette::all()->whereIn('id',$Ids2);
        return $recettes;
    }

    public function generateLists(Request $request)
    {
        $this->validate($request, [
            'nameList_id' => 'required',
            'recettesSelected' => 'required',
        ]);
        $input = $request->input();
        $nameList = NameList::findOrFail($input['nameList_id']);
        $listsToDelete = Listes::where('nameList_id',$nameList->id)->get();
        foreach ($listsToDelete as $listToDelete){
            $listToDelete->delete();
        }

        $idRecettes = [];
        $recettesSelected = unserialize($input['recettesSelected']);
        foreach($recettesSelected as $arr => $key) {
            $idRecettes[] .= "".$key."";
        }
        $recettes = recette::all()->whereIn('id',$idRecettes);

        $listsToDelete = Listes::where('nameList_id',$nameList->id)->get();

        foreach ($listsToDelete as $listToDelete){
            $listToDelete->delete();
        }

        $arrayForCate = array(0 => 0,1 => 0,2 => 0);
        $arr = array();
        foreach($recettes as $recette) {
            for ($y = 2;$y > -1; $y--)
                if($recette->cateRecette_id == ($y+1)){
                    $arr[$y][$arrayForCate[$y]][] = "".$recette->id."";
                    $arrayForCate[$y]++;
                }

        }

        $nbByDay = strlen((string) $nameList->nbByDay);
        $nbTypes = strlen((string) $nameList->type);
        $arrayForCate2 = array(0 => 0,1 => 0,2 => 0);

        for($i = 1; $i < ($nameList->nbDay+1); $i++){
            for ($a = 0; $a < $nbByDay; $a++){
                for($y = ($nbTypes-1);$y > -1; $y--){
                    $list = new Listes();
                    $list->nameList_id = $nameList->id;
                    $list->day = $i;
                    $list->nbPers = $nameList->usersListe->count()+1;
                    if(isset($arr[intval(strval($nameList->type)[$y])-1][$arrayForCate2[$y]][0])){

                        $list->recette_id = $arr[intval(strval($nameList->type)[$y])-1][$arrayForCate2[$y]][0];
                    }else{
                        $list->recette_id = 0;
                    }

                    $list->save();
                    $arrayForCate2[$y]++;
                }
            }
        }
        return redirect('profile/liste/'.$nameList->id);
    }


    public function storeListe(Request $request)
    {
        $this->validate($request,[
            'nameList_id' => 'required',
            'day' => 'required',
            'recette_id' => 'required',
            'nbPers' => 'required'
        ]);
        $List = new Listes();
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;
        $List->fill($input)->save();
        return redirect('profile/liste/'.$input['nameList_id']);
    }

    public function updateListe(Request $request, $id)
    {
        $this->validate($request,[
            'nbPers' => 'required',
        ]);
        $List = Listes::findOrFail($id);
        $input = $request->input();
        $List->fill($input)->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showTimeline($id)
    {
        $liste = NameList::findOrFail($id);
        $authorize = false;
        foreach ($liste->usersListe as $userListe){
            if(Auth::user()->id == $userListe->user_id){
                $authorize = true;
            }
        }

        if ($liste->user_id == Auth::user()->id || $authorize == true){
            $cateForbiden = CateForbiden::all()->pluck('name','id');
            $country = Country::all()->pluck('name','id');
            $country->prepend('Please Select');

            return view('listes.test', compact(
                'liste',
                'cateForbiden',
                'country'
            ));
        }else{
            return redirect('/home');
        }


    }

    public function showIngredients($id)
    {
        $liste = NameList::findOrFail($id);

            return view('listes.ingredients', compact(
                'liste'
            ));
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
    public function mailListe(Request $request){
        Mail::to($request->user())->send(new getListe($request));
    }
}
