<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friends;
use App\Models\NameList;
use App\Models\UsersListe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserListeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $liste = NameList::findOrfail($id);
//        $friendsId = Friends::where('user_id',Auth::user()->id)->orWhere('friend_id',Auth::user()->id)->where('validate',true)->get();
//        $idfriends = [];
//        foreach ( $friendsId as $friend){
//            if($friend->friend_id != Auth::user()->id)
//                $idfriends[] .= "".$friend->friend_id."";
//            elseif ($friend->user_id != Auth::user()->id)
//                $idfriends[] .= "".$friend->user_id."";
//        }
//
//        $userListId = UsersListe::all()->where('nameList_id',$id);
//        $idUserList = [];
//        foreach ( $userListId as $userlist){
//                $idUserList[] .= "".$userlist->user_id."";
//        }
//        $users = User::all()->whereIn('id',$idfriends)->whereNotIn('id',$idUserList);
        $inId = [];
        $inId[] .= "".Auth::user()->id."";
        foreach ($liste->usersListe as $userList){
            $inId[] .= "".$userList->user_id."";
        }
        $users = User::all()->where( 'groups_id' , Auth::user()->groups_id)->whereNotIn('id',$inId);
        return view('usersListe.store', compact(
            'users',
            'liste'
        ));
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
            'user_id' => 'required',
            'nameList_id' => 'required'
        ]);

        $userListe = new UsersListe();
        $input = $request->input();

        //dd($input);
        $listes = NameList::where('id',$input['nameList_id'])->get();

        foreach ($listes as $liste){
           $id = $liste->user_id;
        }

        if($input['user_id'] != $id){
            $userListe->fill($input)->save();
        }else{
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function validateUserList($id,Request $request)
    {
        $this->validate($request,[
            'validate' => 'required'
        ]);
        $input = $request->input();
        $userList = UsersListe::find($id);
        $userList->validate = $input['validate'];
        $userList->save();
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

        $userListe = UsersListe::findOrFail($id);
        $namesList = NameList::where('id', $userListe->nameList_id)->get();
        foreach ($namesList as $nameList){
            $name = NameList::findOrFail($nameList->id);
        }
        if (Auth::user()->id == $userListe->user_id || Auth::user()->id == $name->user_id){
            $userListe->delete();
        }

        return redirect()->back();
    }
}
