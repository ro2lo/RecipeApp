@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="contentShow">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h2 class="media-middle text-center">Ajouter des amis</h2>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">

    <div class="form-group">
        <label for="searchFriends">Rechercher un pseudo</label>
        <input type="text" class="form-control" id="searchFriends">
    </div>
    @foreach($users as $user)
        <div class="col-md-2">
        <div class="users" id="users" >
            <p class="text-center">
        {{$user->name}}
            </p>
            <div class="clearfix"></div>
            {!! Form::open(array(
            'url' => '/friends/store' ,
            'method' => 'POST'
                     )) !!}
            {!! Form::hidden('friend_id',$user->id) !!}
            {!! Form::submit('Ajouter',['class' => 'btn btn-primary col-md-8 col-md-offset-2']) !!}

            {!! Form::close() !!}
        </div>
        </div>
        @endforeach

        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    @include('jquery.fixedTop')

    @include('jquery.friendsAutocomplete')
@endsection