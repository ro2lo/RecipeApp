@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="contentShow">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h2 class="media-middle text-center">Mon cercle</h2>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">

    <h3 class="text-center">Demandes d'ajout</h3>
    <hr>
    @foreach($friendRequest as $friend)
        <div class="col-md-3">
        {{$friend->user->name}}
        <div class="clearfix"></div>
        <div class="col-md-6">
            {!! Form::open(array(
            'url' => '/friends/friendship/'.$friend->id ,
            'method' => 'POST'
                     )) !!}
            {!! Form::hidden('validate',true) !!}
            {!! Form::hidden('visible',true) !!}
            {!! Form::submit('Accepter',['class' => 'btn btn-success col-md-12']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-md-6">
            {!! Form::open(array(
            'url' => '/friends/friendship/'.$friend->id ,
            'method' => 'POST'
                     )) !!}

            {!! Form::hidden('validate',false) !!}
            {!! Form::hidden('visible',false) !!}
            {!! Form::submit('Refuser',['class' => 'btn btn-danger col-md-12']) !!}
            {!! Form::close() !!}
        </div>
        </div>
    @endforeach
    <div class="clearfix"></div>
    <h3 class="text-center">Mes amis</h3>
    <a href="{{url('/friends/add')}}">
    <span type="submit" class="center-block btn btn-primary btn-sm">Ajouter des amis</span>
    </a>
    <hr>
    @foreach($friends as $friend)
        <div class="col-md-2">
            <div class="col-md-8">
            <a href="{{url('profile/'.$friend->id)}}">
        <img src="../uploads/avatars/{{$friend->avatar}}" class="img-circle" style="
        width: 100%; top: 10px; left: 10px;
        " alt="">
        <p class="text-center">{{$friend->name}}</p>
            </a>
            </div>
            <div class="col-md-4">
            {{ Form::open(['method'  => 'DELETE', 'url' => ['friends/destroy/'.$friend->id]])   }}
            {{ Form::submit('X',['class'=>'btn btn-danger']) }}
            {{ Form::close()}}
                <a class="btn btn-primary">
                    <i class="fa fa-envelope"></i>
                </a>
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

@endsection

