<?php

namespace App\Http\Controllers;
use App\Models\Aliment;
use App\Models\CateAliment;
use App\Models\SousCateAliment;
use App\Models\Favoris;
use App\Models\NameList;
use App\Models\Player;
use App\Models\CateForbiden;
use App\Models\recette;
use App\Models\Grade;
use App\Models\Country;
use App\Models\TypePlat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent;

class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['cate']]);
    }


//    public function index()
//    {
//        $recettesStatus5count = recette::all()->where('cateRecette_id',5);
//        $recettesStatus4count = recette::all()->where('cateRecette_id',4);
//        $recettesStatus3count = recette::all()->where('cateRecette_id',3);
//        $recettesStatus2count = recette::all()->where('cateRecette_id',2);
//        $recettesStatus1count = recette::all()->where('cateRecette_id',1);
//
//            $active = Input::get('active');
//            $recettesStatus1 = recette::where('cateRecette_id',1)->paginate(8, ['*'], 'recettesStatus1');
//            $recettesTitle = recette::where('cateRecette_id',1)->get();
//            $listEntrée = [];
//            foreach ( $recettesTitle as $recetteTitle){
//                $listEntrée[] .= "".$recetteTitle->title."";
//            }
//            $recettesStatus2 = recette::where('cateRecette_id',2)->paginate(8, ['*'], 'recettesStatus2');
//            $recettesTitle = recette::where('cateRecette_id',2)->get();
//            $listPlats = [];
//            foreach ( $recettesTitle as $recetteTitle){
//                $listPlats[] .= "".$recetteTitle->title."";
//            }
//            $recettesStatus3 = recette::where('cateRecette_id',3)->paginate(8, ['*'], 'recettesStatus3');
//            $recettesTitle = recette::where('cateRecette_id',3)->get();
//            $listDesserts = [];
//            foreach ( $recettesTitle as $recetteTitle){
//                $listDesserts[] .= "".$recetteTitle->title."";
//            }
//            $recettesStatus4 = recette::where('cateRecette_id',4)->paginate(8, ['*'], 'recettesStatus4');
//            $recettesTitle = recette::where('cateRecette_id',4)->get();
//            $listBoissons = [];
//            foreach ( $recettesTitle as $recetteTitle){
//                $listBoissons[] .= "".$recetteTitle->title."";
//            }
//            $recettesStatus5 = recette::where('cateRecette_id',5)->paginate(8, ['*'], 'recettesStatus5');
//            $recettesTitle = recette::where('cateRecette_id',5)->get();
//            $listPatisseries = [];
//            foreach ( $recettesTitle as $recetteTitle){
//                $listPatisseries[] .= "".$recetteTitle->title."";
//            }
//            $country = Country::pluck('name', 'id');
//            $country->prepend('Please select');
//
//            $filter = false;
//            $titleEntree = null;
//            $lowCalEntree = null;
//            $cateAlimentEntree = null;
//            $countryEntree = null;
//            $timeEntree = null;
//            $prixEntree = null;
//            $ingredientEntree = null;
//            $titlePlats = null;
//            $lowCalPlats = null;
//            $cateAlimentPlats = null;
//            $countryPlats = null;
//            $timePlat = null;
//            $prixPlat = null;
//            $ingredientPlat = null;
//            $titleDesserts = null;
//            $lowCalDesserts = null;
//            $cateAlimentDesserts = null;
//            $countryDesserts = null;
//            $timeDessert = null;
//            $prixDessert = null;
//            $ingredientDessert = null;
//            $titleBoissons = null;
//            $lowCalBoissons = null;
//            $cateAlimentBoissons = null;
//            $countryBoissons = null;
//            $timeBoisson = null;
//            $prixBoisson = null;
//            $ingredientBoisson = null;
//            $titlePatisseries = null;
//            $lowCalPatisseries = null;
//            $cateAlimentPatisseries = null;
//            $countryPatisseries = null;
//            $timePatisserie = null;
//            $prixPatisserie = null;
//            $ingredientPatisserie = null;
//
//
//        $cateAliment[] = array();
//        $recettes = recette::all();
//        foreach ($recettes as $recette){
//            $as = $recette->aliments;
//            foreach ($as as $a){
//                $cateAliment[$recette->cateRecette_id][] =
//                    "".$a->ingredient->sousCateAliment_id."";
//            }
//        }
//        $cateAliments1 = CateAliment::whereIn('id',$cateAliment[1])->pluck('name','id');
//        $cateAliments1->prepend('Please select');
//        $cateAliments2 = CateAliment::whereIn('id',$cateAliment[2])->pluck('name','id');
//        $cateAliments2->prepend('Please select');
//        $cateAliments3 = CateAliment::whereIn('id',$cateAliment[3])->pluck('name','id');
//        $cateAliments3->prepend('Please select');
//        $cateAliments4 = CateAliment::whereIn('id',$cateAliment[4])->pluck('name','id');
//        $cateAliments4->prepend('Please select');
//        $cateAliments5 = CateAliment::whereIn('id',$cateAliment[5])->pluck('name','id');
//        $cateAliments5->prepend('Please select');
//
//
//
//        return view('recettes.index', compact(
//                'recettesStatus1',
//                'recettesStatus2',
//                'recettesStatus3',
//                'recettesStatus4',
//                'recettesStatus5',
//                'recettesStatus1count',
//                'recettesStatus2count',
//                'recettesStatus3count',
//                'recettesStatus4count',
//                'recettesStatus5count',
//                'active',
//                'filter',
//                'titleEntree',
//                'titlePlats',
//                'titleDesserts',
//                'titleBoissons',
//                'titlePatisseries',
//                'listEntrée',
//                'listPlats',
//                'listDesserts',
//                'listBoissons',
//                'listPatisseries',
//                'lowCalEntree',
//                'lowCalPlats',
//                'lowCalBoissons',
//                'lowCalDesserts',
//                'lowCalPatisseries',
//                'cateAlimentEntree',
//                'cateAlimentPlats',
//                'cateAlimentBoissons',
//                'cateAlimentDesserts',
//                'cateAlimentPatisseries',
//                'country',
//                'cateAliments1',
//                'cateAliments2',
//                'cateAliments3',
//                'cateAliments4',
//                'cateAliments5',
//                'countryEntree',
//                'countryPlats',
//                'countryDesserts',
//                'countryBoissons',
//                'countryPatisseries',
//                'timeEntree',
//                'timePlat',
//                'timeDessert',
//                'timeBoisson',
//                'timePatisserie',
//                'prixEntree',
//                'prixPlat',
//                'prixDessert',
//                'prixBoisson',
//                'prixPatisserie',
//                'ingredientEntree',
//                'ingredientPlat',
//                'ingredientDessert',
//                'ingredientBoisson',
//                'ingredientPatisserie'
//            ));
//    }


    public function index()
    {
        $recettesStatus5count = recette::all()->where('cateRecette_id',5);
        $recettesStatus4count = recette::all()->where('cateRecette_id',4);
        $recettesStatus3count = recette::all()->where('cateRecette_id',3);
        $recettesStatus2count = recette::all()->where('cateRecette_id',2);
        $recettesStatus1count = recette::all()->where('cateRecette_id',1);

        $active = Input::get('active');
        $recettesStatus1 = recette::all()->where('cateRecette_id',1);
        $recettesTitle = recette::where('cateRecette_id',1)->get();
        $listEntrée = [];
        foreach ( $recettesTitle as $recetteTitle){
            $listEntrée[] .= "".$recetteTitle->title."";
        }
        $recettesStatus2 = recette::all()->where('cateRecette_id',2);
        $recettesTitle = recette::where('cateRecette_id',2)->get();
        $listPlats = [];
        foreach ( $recettesTitle as $recetteTitle){
            $listPlats[] .= "".$recetteTitle->title."";
        }
        $recettesStatus3 = recette::all()->where('cateRecette_id',3);
        $recettesTitle = recette::where('cateRecette_id',3)->get();
        $listDesserts = [];
        foreach ( $recettesTitle as $recetteTitle){
            $listDesserts[] .= "".$recetteTitle->title."";
        }
        $recettesStatus4 = recette::all()->where('cateRecette_id',4);
        $recettesTitle = recette::where('cateRecette_id',4)->get();
        $listBoissons = [];
        foreach ( $recettesTitle as $recetteTitle){
            $listBoissons[] .= "".$recetteTitle->title."";
        }
        $recettesStatus5 = recette::all()->where('cateRecette_id',5);
        $recettesTitle = recette::where('cateRecette_id',5)->get();
        $listPatisseries = [];
        foreach ( $recettesTitle as $recetteTitle){
            $listPatisseries[] .= "".$recetteTitle->title."";
        }
        $country = Country::pluck('name', 'id');
        $country->prepend('Please select');

        $filter = false;
        $titleEntree = null;
        $lowCalEntree = null;
        $cateAlimentEntree = null;
        $countryEntree = null;
        $timeEntree = null;
        $prixEntree = null;
        $ingredientEntree = null;
        $titlePlats = null;
        $lowCalPlats = null;
        $cateAlimentPlats = null;
        $countryPlats = null;
        $timePlat = null;
        $prixPlat = null;
        $ingredientPlat = null;
        $titleDesserts = null;
        $lowCalDesserts = null;
        $cateAlimentDesserts = null;
        $countryDesserts = null;
        $timeDessert = null;
        $prixDessert = null;
        $ingredientDessert = null;
        $titleBoissons = null;
        $lowCalBoissons = null;
        $cateAlimentBoissons = null;
        $countryBoissons = null;
        $timeBoisson = null;
        $prixBoisson = null;
        $ingredientBoisson = null;
        $titlePatisseries = null;
        $lowCalPatisseries = null;
        $cateAlimentPatisseries = null;
        $countryPatisseries = null;
        $timePatisserie = null;
        $prixPatisserie = null;
        $ingredientPatisserie = null;


        $cateAliment[] = array();
        $recettes = recette::all();
        foreach ($recettes as $recette){
            $as = $recette->aliments;
            foreach ($as as $a){
                $cateAliment[$recette->cateRecette_id][] =
                    "".$a->ingredient->sousCateAliment_id."";
            }
        }
        $cateAliments1 = SousCateAliment::whereIn('id',$cateAliment[1])->pluck('name','id');
        $cateAliments1->prepend('Please select');
        $cateAliments2 = SousCateAliment::whereIn('id',$cateAliment[2])->pluck('name','id');
        $cateAliments2->prepend('Please select');
        $cateAliments3 = SousCateAliment::whereIn('id',$cateAliment[3])->pluck('name','id');
        $cateAliments3->prepend('Please select');
        $cateAliments4 = SousCateAliment::whereIn('id',$cateAliment[4])->pluck('name','id');
        $cateAliments4->prepend('Please select');
        $cateAliments5 = SousCateAliment::whereIn('id',$cateAliment[5])->pluck('name','id');
        $cateAliments5->prepend('Please select');



        return view('recettes.test', compact(
            'recettesStatus1',
            'recettesStatus2',
            'recettesStatus3',
            'recettesStatus4',
            'recettesStatus5',
            'recettesStatus1count',
            'recettesStatus2count',
            'recettesStatus3count',
            'recettesStatus4count',
            'recettesStatus5count',
            'active',
            'filter',
            'titleEntree',
            'titlePlats',
            'titleDesserts',
            'titleBoissons',
            'titlePatisseries',
            'listEntrée',
            'listPlats',
            'listDesserts',
            'listBoissons',
            'listPatisseries',
            'lowCalEntree',
            'lowCalPlats',
            'lowCalBoissons',
            'lowCalDesserts',
            'lowCalPatisseries',
            'cateAlimentEntree',
            'cateAlimentPlats',
            'cateAlimentBoissons',
            'cateAlimentDesserts',
            'cateAlimentPatisseries',
            'country',
            'cateAliments1',
            'cateAliments2',
            'cateAliments3',
            'cateAliments4',
            'cateAliments5',
            'countryEntree',
            'countryPlats',
            'countryDesserts',
            'countryBoissons',
            'countryPatisseries',
            'timeEntree',
            'timePlat',
            'timeDessert',
            'timeBoisson',
            'timePatisserie',
            'prixEntree',
            'prixPlat',
            'prixDessert',
            'prixBoisson',
            'prixPatisserie',
            'ingredientEntree',
            'ingredientPlat',
            'ingredientDessert',
            'ingredientBoisson',
            'ingredientPatisserie'
        ));
    }


    public function filterIngredients(Request $request){
        $this->validate($request, [
            'filtred' => 'required',
            'cate' => 'required',
        ]);

        $recettesTitle = recette::where('cateRecette_id',1)->get();
        $listEntrée = [];
        foreach ( $recettesTitle as $recetteTitle){
            $listEntrée[] .= "".$recetteTitle->title."";
        }
        $recettesTitle = recette::where('cateRecette_id',2)->get();
        $listPlats = [];
        foreach ( $recettesTitle as $recetteTitle){
            $listPlats[] .= "".$recetteTitle->title."";
        }
        $recettesTitle = recette::where('cateRecette_id',3)->get();
        $listDesserts = [];
        foreach ( $recettesTitle as $recetteTitle){
            $listDesserts[] .= "".$recetteTitle->title."";
        }
        $recettesTitle = recette::where('cateRecette_id',4)->get();
        $listBoissons = [];
        foreach ( $recettesTitle as $recetteTitle){
            $listBoissons[] .= "".$recetteTitle->title."";
        }
        $recettesTitle = recette::where('cateRecette_id',5)->get();
        $listPatisseries = [];
        foreach ( $recettesTitle as $recetteTitle){
            $listPatisseries[] .= "".$recetteTitle->title."";
        }

        $input = $request->input();
        $RecettesID[] = unserialize($input['filtred']);
        array_unique($RecettesID);
        $recettesStatus5count = recette::all()->whereIn('id',$RecettesID[0]);
        $recettesStatus4count = recette::all()->whereIn('id',$RecettesID[0]);
        $recettesStatus3count = recette::all()->whereIn('id',$RecettesID[0]);
        $recettesStatus2count = recette::all()->whereIn('id',$RecettesID[0]);
        $recettesStatus1count = recette::all()->whereIn('id',$RecettesID[0]);
        $recettesStatus5 = recette::where('cateRecette_id',5)->whereIn('id',$RecettesID[0])->paginate(8, ['*'], 'recettesStatus5');
        $recettesStatus4 = recette::where('cateRecette_id',4)->whereIn('id',$RecettesID[0])->paginate(8, ['*'], 'recettesStatus4');
        $recettesStatus3 = recette::where('cateRecette_id',3)->whereIn('id',$RecettesID[0])->paginate(8, ['*'], 'recettesStatus3');
        $recettesStatus2 = recette::where('cateRecette_id',2)->whereIn('id',$RecettesID[0])->paginate(8, ['*'], 'recettesStatus2');
        $recettesStatus1 = recette::where('cateRecette_id',1)->whereIn('id',$RecettesID[0])->paginate(8, ['*'], 'recettesStatus1');

        $country = Country::pluck('name', 'id');
        $country->prepend('Please select');

        $active = $input['cate'];
        $filter = false;
        $titleEntree = null;
        $lowCalEntree = null;
        $cateAlimentEntree = null;
        $countryEntree = null;
        $timeEntree = null;
        $prixEntree = null;
        $ingredientEntree = null;
        $titlePlats = null;
        $lowCalPlats = null;
        $cateAlimentPlats = null;
        $countryPlats = null;
        $timePlat = null;
        $prixPlat = null;
        $ingredientPlat = null;
        $titleDesserts = null;
        $lowCalDesserts = null;
        $cateAlimentDesserts = null;
        $countryDesserts = null;
        $timeDessert = null;
        $prixDessert = null;
        $ingredientDessert = null;
        $titleBoissons = null;
        $lowCalBoissons = null;
        $cateAlimentBoissons = null;
        $countryBoissons = null;
        $timeBoisson = null;
        $prixBoisson = null;
        $ingredientBoisson = null;
        $titlePatisseries = null;
        $lowCalPatisseries = null;
        $cateAlimentPatisseries = null;
        $countryPatisseries = null;
        $timePatisserie = null;
        $prixPatisserie = null;
        $ingredientPatisserie = null;


        $cateAliment[] = array();
        $recettes = recette::all();
        foreach ($recettes as $recette){
            $as = $recette->aliments;
            foreach ($as as $a){
                $cateAliment[$recette->cateRecette_id][] =
                    "".$a->sousCateAliment_id.""
                ;
            }
        }
        $cateAliments1 = SousCateAliment::whereIn('id',$cateAliment[1])->pluck('name','id');
        $cateAliments1->prepend('Please select');
        $cateAliments2 = SousCateAliment::whereIn('id',$cateAliment[2])->pluck('name','id');
        $cateAliments2->prepend('Please select');
        $cateAliments3 = SousCateAliment::whereIn('id',$cateAliment[3])->pluck('name','id');
        $cateAliments3->prepend('Please select');
        $cateAliments4 = SousCateAliment::whereIn('id',$cateAliment[4])->pluck('name','id');
        $cateAliments4->prepend('Please select');
        $cateAliments5 = SousCateAliment::whereIn('id',$cateAliment[5])->pluck('name','id');
        $cateAliments5->prepend('Please select');


        return view('recettes.index', compact(
            'recettesStatus1',
            'recettesStatus1count',
            'recettesStatus2',
            'recettesStatus2count',
            'recettesStatus3',
            'recettesStatus3count',
            'recettesStatus4',
            'recettesStatus4count',
            'recettesStatus5',
            'recettesStatus5count',
            'active',
            'filter',
            'titleEntree',
            'titlePlats',
            'titleDesserts',
            'titleBoissons',
            'titlePatisseries',
            'listEntrée',
            'listPlats',
            'listDesserts',
            'listBoissons',
            'listPatisseries',
            'lowCalEntree',
            'lowCalPlats',
            'lowCalBoissons',
            'lowCalDesserts',
            'lowCalPatisseries',
            'cateAlimentEntree',
            'cateAlimentPlats',
            'cateAlimentBoissons',
            'cateAlimentDesserts',
            'cateAlimentPatisseries',
            'country',
            'cateAliments1',
            'cateAliments2',
            'cateAliments3',
            'cateAliments4',
            'cateAliments5',
            'countryEntree',
            'timeEntree',
            'ingredientEntree',
            'prixEntree',
            'countryPlats',
            'timePlat',
            'ingredientPlat',
            'prixPlat',
            'countryDesserts',
            'timeDessert',
            'ingredientDessert',
            'prixDessert',
            'countryBoissons',
            'timeBoisson',
            'ingredientBoisson',
            'prixBoisson',
            'countryPatisseries',
            'timePatisserie',
            'ingredientPatisserie',
            'prixPatisserie'
        ));

    }


    public function filter(Request $request)
    {
       $url =  \URL::current();
       $RecettesID = [];


            $input = $request->input();
            if (strpos($url, 'filter1') !== false) {
                $input['mode'] = 1;
            } elseif (strpos($url, 'filter2') !== false) {
                $input['mode'] = 2;
            } elseif (strpos($url, 'filter3') !== false) {
                $input['mode'] = 3;
            } elseif (strpos($url, 'filter4') !== false) {
                $input['mode'] = 4;
            } elseif (strpos($url, 'filter5') !== false) {
                $input['mode'] = 5;
            } else {
                return $this->index();
            }
        if ($input['mode'] == 1 ) {
            $pagi = Input::get('recettesStatus1');
        }

        if ($input['mode'] == 2 ) {
            $pagi = Input::get('recettesStatus2');
        }

        if ($input['mode'] == 3 ) {
            $pagi = Input::get('recettesStatus3');
        }

        if ($input['mode'] == 4 ) {
            $pagi = Input::get('recettesStatus4');
        }

        if ($input['mode'] == 5 ) {
            $pagi = Input::get('recettesStatus5');
        }

        // TITLE
            if ($request->has('mode')) {
                $titleEntree = $input['titleEntree'];
                $titlePlats = $input['titlePlats'];
                $titleDesserts = $input['titleDesserts'];
                $titleBoissons = $input['titleBoissons'];
                $titlePatisseries = $input['titlePatisseries'];
            } else {
                $input['title'] = null;
                $titleEntree = Input::get('titleEntree');
                $titlePlats = Input::get('titlePlats');
                $titleDesserts = Input::get('titleDesserts');
                $titleBoissons = Input::get('titleBoissons');
                $titlePatisseries = Input::get('titlePatisseries');


            }
            if ($input['mode'] == 1 and isset($input['title'])) {
                $titleEntree = $input['title'];
            }

            if ($input['mode'] == 2 and isset($input['title'])) {
                $titlePlats = $input['title'];
            }

            if ($input['mode'] == 3 and isset($input['title'])) {
                $titleDesserts = $input['title'];
            }

            if ($input['mode'] == 4 and isset($input['title'])) {
                $titleBoissons = $input['title'];
            }

            if ($input['mode'] == 5 and isset($input['title'])) {
                $titlePatisseries = $input['title'];
            }

//LOW CALORIES

            if (isset($input['mode'])) {
                $lowCalEntree = $input['lowCalEntree'];
                $lowCalPlats = $input['lowCalPlats'];
                $lowCalDesserts = $input['lowCalDesserts'];
                $lowCalBoissons = $input['lowCalBoissons'];
                $lowCalPatisseries = $input['lowCalPatisseries'];
            } else {
                $lowCalEntree = Input::get('lowCalEntree');
                $lowCalPlats = Input::get('lowCalPlats');
                $lowCalDesserts = Input::get('lowCalDesserts');
                $lowCalBoissons = Input::get('lowCalBoissons');
                $lowCalPatisseries = Input::get('lowCalPatisseries');
            }


        if (isset($input['mode']) and $input['mode'] == 1 && isset($input['LowCal'])) {
            $lowCalEntree = $input['LowCal'];
        }elseif(isset($input['mode']) and $input['mode'] == 1 && isset($input['LowCal']) == null ){
            if($pagi > 1){
                $lowCalEntree = "1";
            }else{
                $lowCalEntree = null;
            }
        }elseif($lowCalEntree and isset($input['mode']) and $input['mode'] != 1){
            $lowCalEntree = "1";
        }elseif($lowCalEntree == null and isset($input['mode']) and $input['mode'] != 1){
            $lowCalEntree = null;
        }

        if (isset($input['mode']) and $input['mode'] == 2 && $request->has('LowCal')) {
            $lowCalPlats = $input['LowCal'];
        }elseif(isset($input['mode']) and $input['mode'] == 2 && isset($input['LowCal']) == null){
            if($pagi > 1){
                $lowCalPlats = "1";
            }else{
                $lowCalPlats = null;
            }
        }elseif($lowCalPlats == true and isset($input['mode']) and $input['mode'] != null ){
            $lowCalPlats = "1";
        }elseif($lowCalPlats == false and isset($input['mode']) and $input['mode'] != 2){
            $lowCalPlats = null;
        }

        if ($request->has('mode') == 3 && $request->has('LowCal')) {
            $lowCalDesserts = $input['LowCal'];
        }elseif($request->has('mode') == 3 && isset($input['LowCal']) == null){
            if($pagi > 1){
                $lowCalDesserts = "1";
            }else{
                $lowCalDesserts = null;
            }
        }elseif($lowCalDesserts and isset($input['mode']) and $input['mode'] != 3){
            $lowCalDesserts = "1";
        }elseif($lowCalDesserts == null and isset($input['mode']) and $input['mode'] != 3){
            $lowCalDesserts = null;
        }

        if ($request->has('mode') == 4  && $request->has('LowCal')){
            $lowCalBoissons = $input['LowCal'];
        }elseif($request->has('mode') == 4 && isset($input['LowCal']) == null){
            if($pagi > 1){
                $lowCalBoissons = "1";
            }else{
                $lowCalBoissons = null;
            }
        }elseif($lowCalBoissons and isset($input['mode']) and $input['mode'] != 4){
            $lowCalBoissons = "1";
        }elseif($lowCalBoissons == null and isset($input['mode']) and $input['mode'] != 4){
            $lowCalBoissons = null;
        }


        if ($request->has('mode') == 5 && $request->has('LowCal')) {
            $lowCalPatisseries = $input['LowCal'];
        }elseif($request->has('mode') == 5 && isset($input['LowCal']) == null){
            if($pagi > 1){
                $lowCalPatisseries = "1";
            }else{
                $lowCalPatisseries = null;
            }
        }elseif($lowCalPatisseries and isset($input['mode']) and $input['mode'] != 5){
            $lowCalPatisseries = "1";
        }elseif($lowCalPatisseries == null and isset($input['mode']) and $input['mode'] != 5){
            $lowCalPatisseries = null;
        }

// COUNTRY

            if ($request->has('mode') && isset($input['country_id'])) {
                if ($input['country_id'] == 0) {
                    $input['country_id'] = null;
                };
                $countryEntree = $input['countryEntree'];
                $countryPlats = $input['countryPlats'];
                $countryDesserts = $input['countryDesserts'];
                $countryBoissons = $input['countryBoissons'];
                $countryPatisseries = $input['countryPatisseries'];
            } else {
                $input['country_id'] = null;
                $countryEntree = Input::get('countryEntree');
                $countryPlats = Input::get('countryPlats');
                $countryDesserts = Input::get('countryDesserts');
                $countryBoissons = Input::get('countryBoissons');
                $countryPatisseries = Input::get('countryPatisseries');
            }

            if ($input['mode'] == 1 and isset($input['country_id']) != null) {
                $countryEntree = $input['country_id'];
            }
            if ($input['mode'] == 2 and isset($input['country_id']) != null) {
                $countryPlats = $input['country_id'];
            }
            if ($input['mode'] == 3 and isset($input['country_id']) != null) {
                $countryDesserts = $input['country_id'];
            }
            if ($input['mode'] == 4 and isset($input['country_id']) != null) {
                $countryBoissons = $input['country_id'];
            }
            if ($input['mode'] == 5 and isset($input['country_id']) != null) {
                $countryPatisseries = $input['country_id'];
            }


// CATE ALIMENT
            if ($request->has('mode') && isset($input['cateAliment'])) {
                if ($input['cateAliment'] == 0) {
                    $input['cateAliment'] = null;
                }
                $cateAlimentEntree = $input['cateAlimentEntree'];
                $cateAlimentPlats = $input['cateAlimentPlats'];
                $cateAlimentDesserts = $input['cateAlimentDesserts'];
                $cateAlimentBoissons = $input['cateAlimentBoissons'];
                $cateAlimentPatisseries = $input['cateAlimentPatisseries'];
            } else {
                $input['cateAliment'] = null;
                $cateAlimentEntree = Input::get('cateAlimentEntree');
                $cateAlimentPlats = Input::get('cateAlimentPlats');
                $cateAlimentDesserts = Input::get('cateAlimentDesserts');
                $cateAlimentBoissons = Input::get('cateAlimentBoissons');
                $cateAlimentPatisseries = Input::get('cateAlimentPatisseries');
            }

            if ($input['mode'] == 1 and isset($input['cateAliment']) != "") {
                $cateAlimentEntree = $input['cateAliment'];
            }
            if ($input['mode'] == 2 and isset($input['cateAliment']) != "") {
                $cateAlimentPlats = $input['cateAliment'];
            }
            if ($input['mode'] == 3 and isset($input['cateAliment']) != "") {
                $cateAlimentDesserts = $input['cateAliment'];
            }
            if ($input['mode'] == 4 and isset($input['cateAliment']) != "") {
                $cateAlimentBoissons = $input['cateAliment'];
            }
            if ($input['mode'] == 5 and isset($input['cateAliment']) != "") {
                $cateAlimentPatisseries = $input['cateAliment'];
            }

// TIME
        if ($request->has('mode') && isset($input['time'])) {

            $timeEntree = $input['timeEntree'];
            $timePlat = $input['timePlats'];
            $timeDessert = $input['timeDesserts'];
            $timeBoisson = $input['timeBoissons'];
            $timePatisserie = $input['timePatisseries'];
        } else {
            $input['time'] = null;
            $timeEntree = Input::get('timeEntree');
            $timePlat = Input::get('timePlats');
            $timeDessert = Input::get('timeDesserts');
            $timeBoisson = Input::get('timeBoissons');
            $timePatisserie = Input::get('timePatisseries');
        }

        if ($input['mode'] == 1 and isset($input['time']) != "") {
            $timeEntree = $input['time'];
        }

        if ($input['mode'] == 2 and isset($input['time']) != "") {
            $timePlat = $input['time'];
        }
        if ($input['mode'] == 3 and isset($input['time']) != "") {
            $timeDessert = $input['time'];
        }
        if ($input['mode'] == 4 and isset($input['time']) != "") {
            $timeBoisson = $input['time'];
        }
        if ($input['mode'] == 5 and isset($input['time']) != "") {
            $timePatisserie = $input['time'];
        }

        //PRIX
        if ($request->has('mode') && isset($input['prix'])) {

            $prixEntree = $input['prixEntree'];
            $prixPlat = $input['prixPlats'];
            $prixDessert = $input['prixDesserts'];
            $prixBoisson = $input['prixBoissons'];
            $prixPatisserie = $input['prixPatisseries'];
        } else {
            $input['prix'] = null;
            $prixEntree = Input::get('prixEntree');
            $prixPlat = Input::get('prixPlats');
            $prixDessert = Input::get('prixDesserts');
            $prixBoisson = Input::get('prixBoissons');
            $prixPatisserie = Input::get('prixPatisseries');
        }

        if ($input['mode'] == 1 and isset($input['prix']) != "") {
            $prixEntree = $input['prix'];
        }

        if ($input['mode'] == 2 and isset($input['prix']) != "") {
            $prixPlat = $input['prix'];
        }
        if ($input['mode'] == 3 and isset($input['prix']) != "") {
            $prixDessert = $input['prix'];
        }
        if ($input['mode'] == 4 and isset($input['prix']) != "") {
            $prixBoisson = $input['prix'];
        }
        if ($input['mode'] == 5 and isset($input['prix']) != "") {
            $prixPatisserie = $input['prix'];
        }

        //Ingrédient
        if ($request->has('mode') && isset($input['ingredient'])) {

            $ingredientEntree = $input['ingredientEntree'];
            $ingredientPlat = $input['ingredientPlats'];
            $ingredientDessert = $input['ingredientDesserts'];
            $ingredientBoisson = $input['ingredientBoissons'];
            $ingredientPatisserie = $input['ingredientPatisseries'];
        } else {
            $input['ingredient'] = null;
            $ingredientEntree = Input::get('ingredientEntree');
            $ingredientPlat = Input::get('ingredientPlats');
            $ingredientDessert = Input::get('ingredientDesserts');
            $ingredientBoisson = Input::get('ingredientBoissons');
            $ingredientPatisserie = Input::get('ingredientPatisseries');
        }

        if ($input['mode'] == 1 and isset($input['ingredient']) != "") {
            $ingredientEntree = $input['ingredient'];
        }

        if ($input['mode'] == 2 and isset($input['ingredient']) != "") {
            $ingredientPlat = $input['ingredient'];
        }
        if ($input['mode'] == 3 and isset($input['ingredient']) != "") {
            $ingredientDessert = $input['ingredient'];
        }
        if ($input['mode'] == 4 and isset($input['ingredient']) != "") {
            $ingredientBoisson = $input['ingredient'];
        }
        if ($input['mode'] == 5 and isset($input['ingredient']) != "") {
            $ingredientPatisserie = $input['ingredient'];
        }




            // ENTRÉES
            if ($titleEntree != null) {

                $entréesTitle = recette::where('title', 'like', '%' . $titleEntree . '%');
                $inputArray = explode(" ",$titleEntree);
                foreach ($inputArray as $keyword) {
                    $entréesTitle = $entréesTitle->orWhere('title', 'like', '%' . $keyword . '%');
                }
                $entréesTitle = $entréesTitle->where('cateRecette_id', 1)->get();
            } else {
                $titleEntree = null;
                $entréesTitle = recette::where('cateRecette_id', 1)->get();
            }

            foreach ($entréesTitle as $entréeTitle) {
                $RecettesID[] += $entréeTitle->id;
            }

        $recettesTitle = recette::where('cateRecette_id', 1)->get();
            $listEntrée = [];
            foreach ($recettesTitle as $recetteTitle) {
                $listEntrée[] .= "" . $recetteTitle->title . "";
            }

            // PLATS
            if ($titlePlats != null) {
                $platsTitle = recette::where('title', 'like', '%' . $titlePlats . '%');
                $inputArray = explode(" ",$titlePlats);
                foreach ($inputArray as $keyword) {
                    $platsTitle = $platsTitle->orWhere('title', 'like', '%' . $keyword . '%');
                }
                $platsTitle = $platsTitle->where('cateRecette_id', 2)->get();
            } else {
                $titlePlats = null;
                $platsTitle = recette::where('cateRecette_id', 2)->get();
            }
            foreach ($platsTitle as $platTitle) {
                $RecettesID[] += $platTitle->id;
            }
            $recettesTitle = recette::where('cateRecette_id', 2)->get();
            $listPlats = [];
            foreach ($recettesTitle as $recetteTitle) {
                $listPlats[] .= "" . $recetteTitle->title . "";
            }

            // DESSERTS
            if ($titleDesserts != null) {
                $DessertsTitle = recette::where('title', 'like', '%' . $titleDesserts . '%');
                $inputArray = explode(" ",$titleDesserts);
                foreach ($inputArray as $keyword) {
                    $DessertsTitle = $DessertsTitle->orWhere('title', 'like', '%' . $keyword . '%');
                }
                $DessertsTitle = $DessertsTitle->where('cateRecette_id', 3)->get();
            } else {
                $titleDesserts = null;
                $DessertsTitle = recette::where('cateRecette_id', 3)->get();
            }
            foreach ($DessertsTitle as $dessertTitle) {
                $RecettesID[] += $dessertTitle->id;
            }
            $recettesTitle = recette::where('cateRecette_id', 3)->get();
            $listDesserts = [];
            foreach ($recettesTitle as $recetteTitle) {
                $listDesserts[] .= "" . $recetteTitle->title . "";
            }

            // BOISSONS
            if ($titleBoissons != null) {
                $BoissonsTitle = recette::where('title', 'like', '%' . $titleBoissons . '%');
                $inputArray = explode(" ",$titleBoissons);
                foreach ($inputArray as $keyword) {
                    $BoissonsTitle = $BoissonsTitle->orWhere('title', 'like', '%' . $keyword . '%');
                }
                $BoissonsTitle = $BoissonsTitle->where('cateRecette_id', 4)->get();
            } else {
                $titleBoissons = null;
                $BoissonsTitle = recette::where('cateRecette_id', 4)->get();
            }
            foreach ($BoissonsTitle as $boissonTitle) {
                $RecettesID[] += $boissonTitle->id;
            }
            $recettesTitle = recette::where('cateRecette_id', 4)->get();
            $listBoissons = [];
            foreach ($recettesTitle as $recetteTitle) {
                $listBoissons[] .= "" . $recetteTitle->title . "";
            }

            // PATISSERIES
            if ($titlePatisseries != null) {
                $PatisseriesTitle = recette::where('title', 'like', '%' . $titlePatisseries . '%');
                $inputArray = explode(" ",$titlePatisseries);
                foreach ($inputArray as $keyword) {
                    $PatisseriesTitle = $PatisseriesTitle->orWhere('title', 'like', '%' . $keyword . '%');
                }
                $PatisseriesTitle = $PatisseriesTitle->where('cateRecette_id', 5)->get();
            } else {
                $titlePatisseries = null;
                $PatisseriesTitle = recette::where('cateRecette_id', 5)->get();
            }
            foreach ($PatisseriesTitle as $patisserieTitle) {
                $RecettesID[] += $patisserieTitle->id;
            }
            $recettesTitle = recette::where('cateRecette_id', 5)->get();
            $listPatisseries = [];
            foreach ($recettesTitle as $recetteTitle) {
                $listPatisseries[] .= "" . $recetteTitle->title . "";
            }


//RECETTESSTATUS1
            $recettesStatus1 = recette::where('cateRecette_id', 1)->whereIn('id', $RecettesID);
            if (isset($timeEntree) != null and $input['mode'] == 1) {
                if($timeEntree == 1){$recettesStatus1 = $recettesStatus1->where('time', '<=', 20);}
                elseif ($timeEntree == 2){$recettesStatus1 = $recettesStatus1->where('time', '<=', 60);}
                elseif ($timeEntree == 3){$recettesStatus1 = $recettesStatus1->where('time', '>', 60);}
            }
        if (isset($prixEntree) and $input['mode'] == 1) {
            $entreesIdPrix = [];
            $recettesStatus1For = $recettesStatus1->get();
            foreach ($recettesStatus1For as $recette){
                $prix = 0;
                foreach ($recette->aliments as $aliment){
                    $prix += ($aliment->qt * $aliment->ingredient->prixGramme);
                }
                if ($prix/($recette->nbPers) < ($prixEntree+0.1)){
                    $entreesIdPrix[] .= "".$recette->id."";
                }
            }
            $recettesStatus1 = $recettesStatus1->whereIn('id',$entreesIdPrix);
        }
        if (isset($ingredientEntree) and $input['mode'] == 1) {
            $entreesIdingredient = [];
            $recettesStatus1ingredient = $recettesStatus1->get();
            foreach ($recettesStatus1ingredient as $recette){
                $in = false;
                foreach ($recette->aliments as $aliment){
                    if($ingredientEntree == $aliment->ingredient->id || $ingredientEntree == 0){
                       $in = true;
                    };
                }
                if ($in == true){
                    $entreesIdingredient[] .= "".$recette->id."";
                }
            }
            $recettesStatus1 = $recettesStatus1->whereIn('id',$entreesIdingredient);
        }
        if ($lowCalEntree != null ) {
                $recettesStatus1 = $recettesStatus1->where('kcal', 1);
            }
            if (isset($countryEntree) != null and $input['mode'] == 1) {
                $recettesStatus1 = $recettesStatus1->where('country_id', $input['country_id']);
            }
            if ($cateAlimentEntree != null and $input['mode'] == 1) {
                $recettesStatus1P = $recettesStatus1->get();

                $recetteId1 = array();
                foreach ($recettesStatus1P as $recette) {
                    $as = $recette->aliments;

                    foreach ($as as $a) {
                        if ($cateAlimentEntree == $a->sousCateAliment_id) {
                            $recetteId1[] .= "" . $recette->id . "";
                        }
                    }
                }

                $recettesStatus1 = $recettesStatus1->whereIn('id', $recetteId1);
            }
            $recettesStatus1 = $recettesStatus1->get();


            $recettesStatus2 = recette::where('cateRecette_id', 2)->whereIn('id', $RecettesID);
            if (isset($timePlat) != null and $input['mode'] == 2) {
                if($timePlat == 1){$recettesStatus2 = $recettesStatus2->where('time', '<=', 20);}
                elseif ($timePlat == 2){$recettesStatus2 = $recettesStatus2->where('time', '<=', 60);}
                elseif ($timePlat == 3){$recettesStatus2 = $recettesStatus2->where('time', '>', 60);}
            }
        if (isset($prixPlat) and $input['mode'] == 2) {
            $platsIdPrix = [];
            $recettesStatus2For = $recettesStatus2->get();
            foreach ($recettesStatus2For as $recette){
                $prix = 0;
                foreach ($recette->aliments as $aliment){
                    $prix += ($aliment->qt * $aliment->ingredient->prixGramme);
                }
                if (($prix/$recette->nbPers) <= $prixPlat){
                    $platsIdPrix[] .= "".$recette->id."";
                }
                $recettesStatus2 = $recettesStatus2->whereIn('id',$platsIdPrix);
            }
        }
        if (isset($ingredientPlat) and $input['mode'] == 2) {
            $platIdingredient = [];
            $recettesStatus2ingredient = $recettesStatus2->get();
            foreach ($recettesStatus2ingredient as $recette){
                $in = false;
                foreach ($recette->aliments as $aliment){
                    if($ingredientPlat == $aliment->ingredient->id || $ingredientPlat == 0){
                        $in = true;
                    };
                }
                if ($in == true){
                    $platIdingredient[] .= "".$recette->id."";
                }
            }
            $recettesStatus2 = $recettesStatus2->whereIn('id',$platIdingredient);
        }
            if ($lowCalPlats != null) {
                $recettesStatus2 = $recettesStatus2->where('kcal', 1);
            }
            if (isset($input['country_id']) != null and $input['mode'] == 2) {
                $recettesStatus2 = $recettesStatus2->where('country_id', $input['country_id']);
            }
            if ($cateAlimentPlats != null and $input['mode'] == 2) {
                $recettesStatus2P = $recettesStatus2->get();

                $recetteId2 = array();
                foreach ($recettesStatus2P as $recette) {
                    $as = $recette->aliments;

                    foreach ($as as $a) {
                        if ($cateAlimentPlats == $a->sousCateAliment_id) {
                            $recetteId2[] .= "" . $recette->id . "";
                        }
                    }
                }

                $recettesStatus2 = $recettesStatus2->whereIn('id', $recetteId2);
            }
        $recettesStatus2 = $recettesStatus2->get();

            $recettesStatus3 = recette::where('cateRecette_id', 3)->whereIn('id', $RecettesID);
            if (isset($timeDessert) and $input['mode'] == 3) {
                if($timeDessert == 1){$recettesStatus3 = $recettesStatus3->where('time', '<=', 20);}
                elseif ($timeDessert == 2){$recettesStatus3 = $recettesStatus3->where('time', '<=', 60);}
                elseif ($timeDessert == 3){$recettesStatus3 = $recettesStatus3->where('time', '>', 60);}
            }
            if (isset($prixDessert) and $input['mode'] == 3) {
                $dessertsIdPrix = [];
                $recettesStatus3For = $recettesStatus3->get();
                foreach ($recettesStatus3For as $recette){
                    $prix = 0;
                foreach ($recette->aliments as $aliment){
                    $prix += ($aliment->qt * $aliment->ingredient->prixGramme);
                }
                if (($prix/$recette->nbPers) <= $prixDessert){
                    $dessertsIdPrix[] .= "".$recette->id."";
                }
                $recettesStatus3 = $recettesStatus3->whereIn('id',$dessertsIdPrix);
                }
            }
        if (isset($ingredientDessert) and $input['mode'] == 3) {
            $dessertIdingredient = [];
            $recettesStatus3ingredient = $recettesStatus3->get();
            foreach ($recettesStatus3ingredient as $recette){
                $in = false;
                foreach ($recette->aliments as $aliment){
                    if($ingredientDessert == $aliment->ingredient->id || $ingredientDessert == 0){
                        $in = true;
                    };
                }
                if ($in == true){
                    $dessertIdingredient[] .= "".$recette->id."";
                }
            }
            $recettesStatus3 = $recettesStatus3->whereIn('id',$dessertIdingredient);
        }
            if ($lowCalDesserts != null) {
                $recettesStatus3 = $recettesStatus3->where('kcal', 1);
            }
            if (isset($input['country_id']) and $input['mode'] == 3) {
                $recettesStatus3 = $recettesStatus3->where('country_id', $input['country_id']);
            }
            if ($cateAlimentDesserts != null and $input['mode'] == 3) {
                $recettesStatus3P = $recettesStatus3->get();

                $recetteId3 = array();
                foreach ($recettesStatus3P as $recette) {
                    $as = $recette->aliments;

                    foreach ($as as $a) {
                        if ($cateAlimentDesserts == $a->sousCateAliment_id) {
                            $recetteId3[] .= "" . $recette->id . "";
                        }
                    }
                }

                $recettesStatus3 = $recettesStatus3->whereIn('id', $recetteId3);
            }
        $recettesStatus3 = $recettesStatus3->get();


            $recettesStatus4 = recette::where('cateRecette_id', 4)->whereIn('id', $RecettesID);
            if (isset($timeBoisson) and $input['mode'] == 4) {
                if($timeBoisson == 1){$recettesStatus4 = $recettesStatus4->where('time', '<=', 20);}
                elseif ($timeBoisson == 2){$recettesStatus4 = $recettesStatus4->where('time', '<=', 60);}
                elseif ($timeBoisson == 3){$recettesStatus4 = $recettesStatus4->where('time', '>', 60);}
            }
        if (isset($prixBoisson) and $input['mode'] == 4) {
            $boissonsIdPrix = [];
            $recettesStatus4For = $recettesStatus4->get();
            foreach ($recettesStatus4For as $recette){
                $prix = 0;
                foreach ($recette->aliments as $aliment){
                    $prix += ($aliment->qt * $aliment->ingredient->prixGramme);
                }
                if (($prix/$recette->nbPers) <= $prixBoisson){
                    $boissonsIdPrix[] .= "".$recette->id."";
                }
                $recettesStatus4 = $recettesStatus4->whereIn('id',$boissonsIdPrix);
            }
            }
        if (isset($ingredientBoisson) and $input['mode'] == 4) {
            $boissonIdingredient = [];
            $recettesStatus4ingredient = $recettesStatus4->get();
            foreach ($recettesStatus4ingredient as $recette){
                $in = false;
                foreach ($recette->aliments as $aliment){
                    if($ingredientBoisson == $aliment->ingredient->id || $ingredientBoisson == 0){
                        $in = true;
                    };
                }
                if ($in == true){
                    $boissonIdingredient[] .= "".$recette->id."";
                }
            }
            $recettesStatus4 = $recettesStatus4->whereIn('id',$boissonIdingredient);
        }
            if ($lowCalBoissons != null) {
                $recettesStatus4 = $recettesStatus4->where('kcal', 1);
            }
            if (isset($input['country_id']) and $input['mode'] == 4) {
                $recettesStatus4 = $recettesStatus4->where('country_id', $input['country_id']);
            }
            if ($cateAlimentBoissons != null and $input['mode'] == 3) {
                $recettesStatus4P = $recettesStatus4->get();

                $recetteId4 = array();
                foreach ($recettesStatus4P as $recette) {
                    $as = $recette->aliments;

                    foreach ($as as $a) {
                        if ($cateAlimentBoissons == $a->sousCateAliment_id) {
                            $recetteId4[] .= "" . $recette->id . "";
                        }
                    }
                }

                $recettesStatus4 = $recettesStatus4->whereIn('id', $recetteId4);
            }
        $recettesStatus4 = $recettesStatus4->get();


            $recettesStatus5 = recette::where('cateRecette_id', 5)->whereIn('id', $RecettesID);
            if (isset($input['time']) and $input['mode'] == 5) {
                if($timePatisserie == 1){$recettesStatus5 = $recettesStatus5->where('time', '<=', 20);}
                elseif ($timePatisserie == 2){$recettesStatus5 = $recettesStatus5->where('time', '<=', 60);}
                elseif ($timePatisserie == 3){$recettesStatus5 = $recettesStatus5->where('time', '>', 60);}
            }
        if (isset($prixPatisserie) and $input['mode'] == 5) {
            $patisseriesIdPrix = [];
            $recettesStatus5For = $recettesStatus5->get();
            foreach ($recettesStatus5For as $recette){
                $prix = 0;
                foreach ($recette->aliments as $aliment){
                    $prix += ($aliment->qt * $aliment->ingredient->prixGramme);
                }
                if (($prix/$recette->nbPers) <= $prixPatisserie){
                    $patisseriesIdPrix[] .= "".$recette->id."";
                }
                $recettesStatus5 = $recettesStatus5->whereIn('id',$patisseriesIdPrix);
            }
        }
        if (isset($ingredientPatisserie) and $input['mode'] == 5) {
            $patisserieIdingredient = [];
            $recettesStatus5ingredient = $recettesStatus5->get();
            foreach ($recettesStatus5ingredient as $recette){
                $in = false;
                foreach ($recette->aliments as $aliment){
                    if($ingredientPatisserie == $aliment->ingredient->id || $ingredientPatisserie == 0){
                        $in = true;
                    };
                }
                if ($in == true){
                    $patisserieIdingredient[] .= "".$recette->id."";
                }
            }
            $recettesStatus5 = $recettesStatus5->whereIn('id',$patisserieIdingredient);
        }
            if ($lowCalPatisseries != null) {
                $recettesStatus5 = $recettesStatus5->where('kcal', 1);
            }
            if (isset($input['country_id']) and $input['mode'] == 5) {
                $recettesStatus5 = $recettesStatus5->where('country_id', $input['country_id']);
            }
            if ($cateAlimentPatisseries != null and $input['mode'] == 5) {
                $recettesStatus5P = $recettesStatus5->get();

                $recetteId5 = array();
                foreach ($recettesStatus5P as $recette) {
                    $as = $recette->aliments;

                    foreach ($as as $a) {
                        if ($cateAlimentPatisseries == $a->sousCateAliment_id) {
                            $recetteId5[] .= "" . $recette->id . "";
                        }
                    }
                }

                $recettesStatus5 = $recettesStatus5->whereIn('id', $recetteId5);
            }
        $recettesStatus5 = $recettesStatus5->get();


            $cateAliment[] = array();
            $recettes = recette::all();
            foreach ($recettes as $recette) {
                $as = $recette->aliments;
                foreach ($as as $a) {
                    $cateAliment[$recette->cateRecette_id][] =
                        "".$a->ingredient->sousCateAliment_id."";
                }
            }
            $cateAliments1 = SousCateAliment::whereIn('id', $cateAliment[1])->pluck('name', 'id');
            $cateAliments1->prepend('Please Select');

            $cateAliments2 = SousCateAliment::whereIn('id', $cateAliment[2])->pluck('name', 'id');
            $cateAliments2->prepend('Please Select');

            $cateAliments3 = SousCateAliment::whereIn('id', $cateAliment[3])->pluck('name', 'id');
            $cateAliments3->prepend('Please Select');

            $cateAliments4 = SousCateAliment::whereIn('id', $cateAliment[4])->pluck('name', 'id');
            $cateAliments4->prepend('Please Select');

            $cateAliments5 = SousCateAliment::whereIn('id', $cateAliment[5])->pluck('name', 'id');
            $cateAliments5->prepend('Please Select');


            $country = Country::pluck('name', 'id');
            $country->prepend('Please Select');

            $filter = true;
            if (Input::get('active') != null) {
                $active = Input::get('active');
            } else {
                $active = $input['mode'];
            }

        return view('recettes.test', compact(
            'recettesStatus1',
            'titleEntree',
            'listEntrée',
            'recettesStatus2',
            'titlePlats',
            'listPlats',
            'recettesStatus3',
            'titleDesserts',
            'listDesserts',
            'recettesStatus4',
            'titleBoissons',
            'listBoissons',
            'recettesStatus5',
            'titlePatisseries',
            'listPatisseries',
            'country',
            'active',
            'filter',
            'cateAliments1',
            'cateAliments2',
            'cateAliments3',
            'cateAliments4',
            'cateAliments5',
            'lowCalEntree',
            'lowCalPlats',
            'lowCalBoissons',
            'lowCalDesserts',
            'lowCalPatisseries',
            'cateAlimentEntree',
            'cateAlimentPlats',
            'cateAlimentBoissons',
            'cateAlimentDesserts',
            'cateAlimentPatisseries',
            'countryEntree',
            'countryPlats',
            'countryDesserts',
            'countryBoissons',
            'countryPatisseries',
            'timeEntree',
            'timePlat',
            'timeDessert',
            'timeBoisson',
            'timePatisserie',
            'prixEntree',
            'prixPlat',
            'prixDessert',
            'prixBoisson',
            'prixPatisserie',
            'ingredientEntree',
            'ingredientPlat',
            'ingredientDessert',
            'ingredientBoisson',
            'ingredientPatisserie'
        ));
    }

    public function cate($id)
    {
        $CF = CateForbiden::findOrFail($id);
        $CFName= $CF->name;
        $PL = Player::all()->where('cateForbiden_id',$CF->id);
        return view('recettes.special', compact('PL','CFName'));
    }









    public function filterFromHome(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:150',
        ]);

        $input = $request->input();

        $recettesTitle = recette::where('cateRecette_id',1)->get();
        $listEntrée = [];
        foreach ( $recettesTitle as $recetteTitle){
            $listEntrée[] .= "".$recetteTitle->title."";
        }

        $recettesTitle = recette::where('cateRecette_id',2)->get();
        $listPlats = [];
        foreach ( $recettesTitle as $recetteTitle){
            $listPlats[] .= "".$recetteTitle->title."";
        }

        $recettesTitle = recette::where('cateRecette_id', 3)->get();
        $listDesserts = [];
        foreach ($recettesTitle as $recetteTitle) {
            $listDesserts[] .= "" . $recetteTitle->title . "";
        }
        $recettesTitle = recette::where('cateRecette_id', 4)->get();
        $listBoissons = [];
        foreach ($recettesTitle as $recetteTitle) {
            $listBoissons[] .= "" . $recetteTitle->title . "";
        }
        $recettesTitle = recette::where('cateRecette_id', 5)->get();
        $listPatisseries = [];
        foreach ($recettesTitle as $recetteTitle) {
            $listPatisseries[] .= "" . $recetteTitle->title . "";
        }


$RecettesID = [];
        $entréesTitle = recette::where('title', 'like', '%' . $input['title'] . '%');
        $inputArray = explode(" ",$input['title']);
        foreach ($inputArray as $keyword) {
            $entréesTitle = $entréesTitle->orWhere('title', 'like', '%' . $keyword . '%');
        }
        $entréesTitle = $entréesTitle->where('cateRecette_id', 1)->get();


foreach ($entréesTitle as $entréeTitle) {
    $RecettesID[] += $entréeTitle->id;
}


// PLATS
    $platsTitle = recette::where('title', 'like', '%' . $input['title'] . '%');
    $inputArray = explode(" ",$input['title']);
    foreach ($inputArray as $keyword) {
        $platsTitle = $platsTitle->orWhere('title', 'like', '%' . $keyword . '%');
    }
    $platsTitle = $platsTitle->where('cateRecette_id', 2)->get();

foreach ($platsTitle as $platTitle) {
    $RecettesID[] += $platTitle->id;
}


// DESSERTS
    $DessertsTitle = recette::where('title', 'like', '%' . $input['title'] . '%');
    $inputArray = explode(" ",$input['title']);
    foreach ($inputArray as $keyword) {
        $DessertsTitle = $DessertsTitle->orWhere('title', 'like', '%' . $keyword . '%');
    }
    $DessertsTitle = $DessertsTitle->where('cateRecette_id', 3)->get();

foreach ($DessertsTitle as $dessertTitle) {
    $RecettesID[] += $dessertTitle->id;
}


// BOISSONS
    $BoissonsTitle = recette::where('title', 'like', '%' . $input['title'] . '%');
    $inputArray = explode(" ",$input['title']);
    foreach ($inputArray as $keyword) {
        $BoissonsTitle = $BoissonsTitle->orWhere('title', 'like', '%' . $keyword . '%');
    }
    $BoissonsTitle = $BoissonsTitle->where('cateRecette_id', 4)->get();

foreach ($BoissonsTitle as $boissonTitle) {
    $RecettesID[] += $boissonTitle->id;
}


// Patisseries
    $PatisseriesTitle = recette::where('title', 'like', '%' . $input['title'] . '%');
    $inputArray = explode(" ",$input['title']);
    foreach ($inputArray as $keyword) {
        $PatisseriesTitle = $PatisseriesTitle->orWhere('title', 'like', '%' . $keyword . '%');
    }
    $PatisseriesTitle = $PatisseriesTitle->where('cateRecette_id', 5)->get();

foreach ($PatisseriesTitle as $patisserieTitle) {
    $RecettesID[] += $patisserieTitle->id;
}


        $recettesStatus1 =  recette::where('cateRecette_id',1)->whereIn('id',$RecettesID)->get();
        $recettesStatus2 =  recette::where('cateRecette_id',2)->whereIn('id',$RecettesID)->get();
        $recettesStatus3 =  recette::where('cateRecette_id',3)->whereIn('id',$RecettesID)->get();
        $recettesStatus4 =  recette::where('cateRecette_id',4)->whereIn('id',$RecettesID)->get();
        $recettesStatus5 =  recette::where('cateRecette_id',5)->whereIn('id',$RecettesID)->get();

        $cateAliment[] = array();
        $recettes = recette::all();
        foreach ($recettes as $recette) {
            $as = $recette->aliments;
            foreach ($as as $a) {
                $cateAliment[$recette->cateRecette_id][] =
                    "".$a->ingredient->sousCateAliment_id."";
            }
        }

        $cateAliments1 = SousCateAliment::whereIn('id', $cateAliment[1])->pluck('name', 'id');
        $cateAliments1->prepend('Please Select');

        $cateAliments2 = SousCateAliment::whereIn('id', $cateAliment[2])->pluck('name', 'id');
        $cateAliments2->prepend('Please Select');

        $cateAliments3 = SousCateAliment::whereIn('id', $cateAliment[3])->pluck('name', 'id');
        $cateAliments3->prepend('Please Select');

        $cateAliments4 = SousCateAliment::whereIn('id', $cateAliment[4])->pluck('name', 'id');
        $cateAliments4->prepend('Please Select');

        $cateAliments5 = SousCateAliment::whereIn('id', $cateAliment[5])->pluck('name', 'id');
        $cateAliments5->prepend('Please Select');

        $country = Country::pluck('name', 'id');
        $country->prepend('Please Select');


        $titleEntree = $input['title'];
        $titlePlats = $input['title'];
        $titleBoissons = $input['title'];
        $titleDesserts = $input['title'];
        $titlePatisseries = $input['title'];
        $lowCalEntree = null;
        $cateAlimentEntree = null;
        $countryEntree = null;
        $timeEntree = null;
        $prixEntree = null;
        $lowCalPlats = null;
        $cateAlimentPlats = null;
        $countryPlats = null;
        $timePlat = null;
        $prixPlat = null;
        $lowCalDesserts = null;
        $cateAlimentDesserts = null;
        $countryDesserts = null;
        $timeDessert = null;
        $prixDessert = null;
        $lowCalBoissons = null;
        $cateAlimentBoissons = null;
        $countryBoissons = null;
        $timeBoisson = null;
        $prixBoisson = null;
        $lowCalPatisseries = null;
        $cateAlimentPatisseries = null;
        $countryPatisseries = null;
        $timePatisserie = null;
        $prixPatisserie = null;
        $ingredientEntree = null;
        $ingredientPlat = null;
        $ingredientDessert = null;
        $ingredientBoisson = null;
        $ingredientPatisserie = null;
        $active = 1;
        $filter = false;

        return view('recettes.test', compact(
            'recettesStatus1',
            'titleEntree',
            'listEntrée',
            'recettesStatus2',
            'titlePlats',
            'listPlats',
            'recettesStatus3',
            'titleDesserts',
            'listDesserts',
            'recettesStatus4',
            'titleBoissons',
            'listBoissons',
            'recettesStatus5',
            'titlePatisseries',
            'listPatisseries',
            'country',
            'active',
            'filter',
            'cateAliments1',
            'cateAliments2',
            'cateAliments3',
            'cateAliments4',
            'cateAliments5',
            'lowCalEntree',
            'lowCalPlats',
            'lowCalBoissons',
            'lowCalDesserts',
            'lowCalPatisseries',
            'cateAlimentEntree',
            'cateAlimentPlats',
            'cateAlimentBoissons',
            'cateAlimentDesserts',
            'cateAlimentPatisseries',
            'countryEntree',
            'countryPlats',
            'countryDesserts',
            'countryBoissons',
            'countryPatisseries',
            'timeEntree',
            'timePlat',
            'timeDessert',
            'timeBoisson',
            'timePatisserie',
            'prixPatisserie',
            'prixEntree',
            'prixPlat',
            'prixDessert',
            'prixBoisson',
            'prixPatisserie',
            'ingredientEntree',
            'ingredientPlat',
            'ingredientDessert',
            'ingredientBoisson',
            'ingredientPatisserie'
        ));
    }









    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'time' => 'max:100',
            'kcal' => 'max:100',
            'qtType' => 'max:100',
            'max:100' => 'max:100',
            'max:100' => 'max:100'
        ]);
        $input = $request->input();



        return view('home', compact('recetes'));

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
        if(Auth::check()){
            $nameListes = NameList::where('user_id',Auth::user()->id)->orderBy('id','desc')->pluck('name','id');
        }else{
            $nameListes = null;
        }
        $recetteGrades = $recette->grades;
        $i = 0;
        $grades = 0;
        foreach ($recetteGrades as $recetteGrade){
            $i++;
            $grades += $recetteGrade->grade;
        }



       if($i != 0){ $grade = $grades / $i; }else{$grade = 0;}
       if(Auth::check()){
           $user = User::findOrFail(Auth::user()->id);
           $favori = Favoris::all()->where('recette_id', $recette->id )->where('user_id',Auth::user()->id)->first();
           if($favori != null){
               $favoriCount = Favoris::all()->where('recette_id', $recette->id )->where('user_id',Auth::user()->id)->count();
           }else{
               $favoriCount = 0;
           }

       } else {
           $user = null;
           $favoriCount = null;
       }


        return view('recettes.show', compact('recette','user','favori','favoriCount','grade','nameListes'));

//        if( $recette->verify == 1 || ( Auth::check() )){
//            return view('recettes.show', compact('recette'));
//        }else{
//            return view('errors.404');
//        }
    }
    public function typePlatIndex($id){
        $typePlat = TypePlat::findOrFail($id);
        $recettesId = [];
        foreach ($typePlat->player as $player){
            $recettesId[] .= "".$player->recette_id."";
        }
        $recettes = recette::whereIn('id',$recettesId)->get();
        $TPname = $typePlat->name;
        return view('typePlat.index', compact('recettes','TPname'));


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
