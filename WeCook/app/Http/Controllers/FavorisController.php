<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favoris;
use App\Models\recette;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;



class FavorisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = Input::get('active');
        $favorisRecette = Favoris::where('user_id',Auth::user()->id)->get(['recette_id']);
        $favorisRecetteID = [];
        foreach ( $favorisRecette as $fr){
            $favorisRecetteID[] += $fr->recette_id;
        }
        //dd($favorisRecetteID);
        $recettesStatus1 = recette::where('cateRecette_id',1)->whereIn('id',$favorisRecetteID)->paginate(8, ['*'], 'recettesStatus1');
        $recettesStatus2 = recette::where('cateRecette_id',2)->whereIn('id',$favorisRecetteID)->paginate(8, ['*'], 'recettesStatus2');
        $recettesStatus3 = recette::where('cateRecette_id',3)->whereIn('id',$favorisRecetteID)->paginate(8, ['*'], 'recettesStatus3');
        $recettesStatus4 = recette::where('cateRecette_id',4)->whereIn('id',$favorisRecetteID)->paginate(8, ['*'], 'recettesStatus4');
        $recettesStatus5 = recette::where('cateRecette_id',5)->whereIn('id',$favorisRecetteID)->paginate(8, ['*'], 'recettesStatus4');
        return view('favs.index', compact('recettesStatus1','recettesStatus5','recettesStatus2','recettesStatus3','recettesStatus4','active'));
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
        $this->validate($request,[
            'recette_id' => 'required'
        ]);
        $favoris = new Favoris();
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;
        //dd($input);
        $favoris->fill($input)->save();
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
        $favoris = Favoris::findorfail($id);
        $favoris->delete();
        return redirect()->back();
    }
}
