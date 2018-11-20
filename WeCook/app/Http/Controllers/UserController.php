<?php

namespace App\Http\Controllers;

use App\Models\SousCateAliment;
use App\Models\recette;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Forbiden;
use App\Models\CateForbiden;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{



    public function __construct()    {
       $this->middleware('AuthProperty', ['only' => ['edit']]);
           }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

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
    public function storeRSP(Request $request)
    {
        $this->validate($request,[
        'cateForbiden_id' => 'required',
    ]);
        $input = $request->input();
        $forbiden = Forbiden::all()->where('user_id', Auth::user()->id)->where('cateForbiden_id',$input['cateForbiden_id']);
        foreach ($forbiden as $value){
               $value->delete();
        }

        $a = new Forbiden();
        $input['user_id'] = Auth::user()->id;
        $input['status'] = 1;
        //dd($input);
        $a->fill($input)->save();
        return $this->edit();
    }
    public function storeMM(Request $request)
    {
        $this->validate($request,[
        'cateForbiden_id' => 'required',
    ]);
        $input = $request->input();
        $forbiden = Forbiden::all()->where('user_id', Auth::user()->id)->where('cateForbiden_id',$input['cateForbiden_id']);
        foreach ($forbiden as $value){
               if ($input['cateForbiden_id'] == $value->cateForbiden_id){
                   return redirect()->back();
               }
        }

        $a = new Forbiden();
        $input['user_id'] = Auth::user()->id;
        $input['status'] = 2;
        $a->fill($input)->save();
        return $this->edit();

    }
    public function storeCAI(Request $request)
    {
        $this->validate($request,[
        'cateAliment_id' => 'required',
    ]);
        $input = $request->input();
        $forbiden = Forbiden::all()->where('user_id', Auth::user()->id)->where('cateAliment_id',$input['cateAliment_id']);
        foreach ($forbiden as $value){
               if ($input['cateAliment_id'] == $value->cateAliment_id){
                   return redirect()->back();
               }
        }

        $a = new Forbiden();
        $input['user_id'] = Auth::user()->id;
        $input['status'] = 3;
        $a->fill($input)->save();
        return $this->edit();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::findOrFail($id);
        $recettes = recette::all();
        $favoris = $user->favoris;
        $favos = [];
        foreach($recettes as $recette){
           foreach($favoris as $favori){
                if($favori->recette_id == $recette->id){
                    $favos[] .= "".$recette->id."";
                }
           }
        }
        $favs = recette::all()->whereIn('id',$favos);
        return view('profile.show', compact('user','allCateForbiden','cateForbiden1','cateForbiden2','favs'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $regimeSpecial = CateForbiden::all()->where('status', 1)->pluck('name', 'id');
        $mieuxManger = CateForbiden::all()->where('status', 2)->pluck('name', 'id');
        $regimeSpecial->prepend('Please Select','1');
        $cateIngredientInterdit = SousCateAliment::all()->pluck('name', 'id');
        $cateIngredientInterdit->prepend('Please Select');
        $user = Auth::user();
        return view('profile.edit', compact('user','regimeSpecial','cateIngredientInterdit','mieuxManger'));
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
    public function uploadAvatar(Request $request)
    {
        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return $this->show(Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $f = Forbiden::findOrFail($id);
        $f->delete();
        return redirect()->back();
    }
}
