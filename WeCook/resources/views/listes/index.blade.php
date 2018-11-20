@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="contentShow">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h2 class="media-middle text-center">Mes Listes</h2>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">

                            <div class="col-md-12">
                                <a href="{{url('profile/liste/'.Auth::user()->id.'/create')}}" class="btn btn-primary center-block">Créer une liste</a>
                            </div>
    @foreach ($listes as $liste)
                                <div class="col-md-4 ">
                                    <div class="card-list">
                                        <h3 class="card-title"><i class="fa fa-btn fa-list pull-left"></i>{{$liste->name}}</h3>
                                    <div class="card-body">
                                        <p class="card-text"><i class="fa fa-users"></i> {{$liste->usersListe->count()+1}}</p>
                                        <p class="card-text"><i class="fa fa-cutlery"></i> {{$liste->listes->count()}}</p>
                                        <p class="card-text">Par <a href="{{url('profile/'.$liste->user->id)}}">{{$liste->user->name}}</a></p>
                                        <a href="{{route('userTimeline', ['id' => $liste->id])}}" class="btn btn-primary" ><i class="fa fa-eye"></i>  Voir</a>
                                    </div>
                                    </div>
                                </div>

    @endforeach
                            <div class="clearfix"></div>
                            <div class="panel-heading ">
                                <h2 class="media-middle text-center">Je participe !</h2>
                            </div>
                            @foreach ($invited as $otherListe)
                                <a href="{{route('userTimeline', ['id' => $otherListe->id])}}" class="text-left"><h3 class=""><i class="fa fa-btn fa-list pull-left"></i>{{$otherListe->name}}</h3></a>
                                <p><i class="fa fa-users"></i> {{$otherListe->usersListe->count()}}</p>
                                <p><i class="fa fa-cutlery"></i> {{$otherListe->listes->count()}}</p>
                                <p class="text-right">Par <a href="{{url('profile/'.$otherListe->user->id)}}">{{$otherListe->user->name}}</a></p>
                                <hr>
                            @endforeach

                            <div class="panel-heading ">
                                <h2 class="media-middle text-center">Invitations</h2>
                            </div>
    @foreach ($othersListes as $otherListe)
                                @foreach($userListes2 as $ul)
                                    @if($ul->nameList_id == $otherListe->id && Auth::user()->id == $ul->user_id)
                                        <a href="{{route('userTimeline', ['id' => $otherListe->id])}}" class="text-left"><h3 class=""><i class="fa fa-btn fa-list pull-left"></i>{{$otherListe->name}}</h3></a>
                                        <div class="col-md-2">
                                        <p><i class="fa fa-users"></i> {{$otherListe->usersListe->count()}}</p>
                                        <p><i class="fa fa-cutlery"></i> {{$otherListe->listes->count()}}</p>
                                        </div>
                                    <div class="col-md-10">
                                        <div class="col-md-6">
                                            {!! Form::open(array(
                                            'url' => 'profile/liste/validateUserList/'.$ul->id ,
                                            'method' => 'POST'
                                                     )) !!}
                                            {!! Form::hidden('validate',1) !!}
                                            {!! Form::submit('Accepter',['class' => 'btn btn-success col-md-8 col-md-offset-2']) !!}

                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::open(array(
                                            'url' => 'profile/liste/validateUserList/'.$ul->id ,
                                            'method' => 'POST'
                                                     )) !!}

                                            {!! Form::hidden('validate',3) !!}
                                            {!! Form::submit('Refuser',['class' => 'btn btn-danger col-md-8 col-md-offset-2']) !!}

                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                        <p class="text-right">Par <a href="{{url('profile/'.$otherListe->user->id)}}">{{$otherListe->user->name}}</a></p>
                                    @endif
                                    @endforeach
    @endforeach
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('jquery.fixedTop')
@endsection