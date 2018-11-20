@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="contentShow">
                <div class="panel panel-default">
                    <div class="panel-heading "><h2 class="media-middle text-center">{{$liste->name}}</h2>
                        <a href="{{url('profile/liste/'.$liste->id)}}"><span class="btn btn-default left col-md-4 col-md-offset-4">Retour</span></a>
                </div>
                    <div class="clearfix"></div>
                    <div class="panel-body">
                    @foreach($users as $user)
                        <div class="col-md-3">
                            {{$user->name}}
                            {!! Form::open(array(
                             'action' => 'UserListeController@store' ,
                             'method' => 'POST'
                             )) !!}
                            {!! Form::hidden('user_id',$user->id) !!}
                            {!! Form::hidden('nameList_id',$liste->id) !!}
                            {!! Form::submit('Ajouter',['class' => 'btn btn-primary col-md-8 col-md-offset-2']) !!}
                            {!! Form::close() !!}
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('jquery.fixedTop')
@endsection