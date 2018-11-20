<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friends;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class FriendController extends Controller
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
        $friendRequest = Friends::where('friend_id',Auth::user()->id)->where('validate',false)->where('visible',true)->get();
//        $idRequest = [];
//        foreach ( $friendRequest as $friend){
//            $idRequest[] .= "".$friend->user_id."";
//        }
//        $requestFriends = User::all()->whereIn('id',$idRequest);
        $userRequest = Friends::where('user_id',Auth::user()->id)->where('validate',false)->where('visible',true)->get();

        $friendsId = Friends::where('validate',1)->where('user_id',Auth::user()->id)->OrWhere('friend_id',Auth::user()->id)->get();
        $idfriends = [];
        foreach ( $friendsId as $friend) {
            if ($friend->validate == 1){
                if ($friend->friend_id != Auth::user()->id)
                    $idfriends[] .= "" . $friend->friend_id . "";
                elseif ($friend->user_id != Auth::user()->id)
                    $idfriends[] .= "" . $friend->user_id . "";
        }
        }

        $friends = User::all()->whereIn('id',$idfriends);

        return view('friends.index', compact(
          'friends',
          'friendRequest',
          'userRequest'
        ));
    }

    public function friendship(Request $request,$id){

        $this->validate($request,[
            'validate' => 'required',
            'visible' => 'required',
        ]);
        $input = $request->input();
        $friend = Friends::find($id);
        $friend->validate = $input['validate'];
        $friend->visible = $input['visible'];
        $friend->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $friendsId = Friends::where('user_id',Auth::user()->id)->get();
//        $idfriends = [];
//        foreach ( $friendsId as $friend){
//            $idfriends[] .= "".$friend->friend_id."";
//        }

        $friendsId = Friends::where('user_id',Auth::user()->id)->orWhere('friend_id',Auth::user()->id)->where('validate',true)->get();
        $idfriends = [];
        foreach ( $friendsId as $friend){
            if($friend->friend_id != Auth::user()->id)
                $idfriends[] .= "".$friend->friend_id."";
            elseif ($friend->user_id != Auth::user()->id)
                $idfriends[] .= "".$friend->user_id."";
        }

        $users = User::all()->whereNotIn('id',$idfriends)->whereNotIn('id',Auth::user()->id);
        $listUsers = [];
        foreach ( $users as $user){
            $listUsers[] .= "".$user->name."";
        }
        return view('friends.create', compact(
            'users',
            'listUsers'
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
                'friend_id' => 'required',
            ]);

            $friend = new Friends();
            $input = $request->input();
            $input['user_id'] = Auth::user()->id;
            $friend->fill($input)->save();
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
        $friendsId = Friends::where('validate', 1)->where('user_id', Auth::user()->id)->OrWhere('friend_id', Auth::user()->id)->where('user_id', $id)->OrWhere('friend_id', $id)->get();
        foreach ($friendsId as $friendId){
            $friendId->delete();
         }
        return redirect()->back();

    }
}
