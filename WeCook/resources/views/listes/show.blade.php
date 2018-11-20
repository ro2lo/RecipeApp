@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="contentShow">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <a href="{{url('profile/'.Auth::user()->id.'/listes')}}" class="btn-sm btn-primary">Retour</a>
                            <h1 class="media-middle text-center">{{$liste->name}} - {{$liste->usersListe->count()+1}} Personnes  </h1>
                             <a href="{{url('profile/'.$liste->user->id)}}"class="pull-right col-xs-1"> Par
                                    <img src="/uploads/avatars/{{$liste->user->avatar}}" class="img-circle" style="
                                    width: 100%; top: 10px; left: 10px;
                                    " alt="">
                                    {{$liste->user->name}}</a>
                        <div class="clearfix"></div>
                        <div class="row">
                        <div class="col-sm-4">
                        <a href="{{url('profile/liste/'.$liste->id.'/userliste')}}" class="btn btn-primary center-block">Ajouter participant</a>
                    </div><div class="col-sm-4">
                        <a href="{{route('userTimeline', $liste->id)}}" class="btn btn-primary center-block">Timeline</a>
                        </div>
                            <div class="col-sm-4">
                        <a href="{{url('profile/listIngredients/'.$liste->id)}}" class="btn btn-primary center-block">Liste des ingrédients</a>
                        </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">

                            <?php $users =  $liste->usersListe; ?>
                            @foreach($users as $uses)
                                <?php $user  = $uses->user ?>
                                    @foreach($user as $use)
                                        <div class="col-xs-2">
                                    <div class="col-md-8">
                                    <a href="{{url('profile/'.$use->id)}}">
                                    <img src="/uploads/avatars/{{$use->avatar}}" class="img-circle" style="
                                    width: 100%; top: 10px; left: 10px;
                                    " alt="">
                                    <p class="text-center">{{$use->name}}</p>
                                    </a>
                                    </div>
                                            @if(Auth::check() && Auth::user()->id == $use->id || Auth::user()->id == $liste->user->id)
                                        <div class="col-md-4">
                                            {{ Form::open(['method'  => 'DELETE', 'url' => ['userListe/destroy/'.$uses->id]])   }}
                                            {{ Form::submit('X',['class'=>'btn btn-danger']) }}
                                            {{ Form::close()}}
                                        </div>
                                                @endif
                                        </div>
                            @endforeach
                            @endforeach
                        </div>
<div class="clearfix"></div>

                        <ul class="cbp_tmtimeline">
                            <?php
                            $jour_semaine = array(0=>"dimanche", 1=>"lundi", 2=>"mardi", 3=>"mercredi", 4=>"jeudi", 5=>"vendredi", 6=>"Samedi");
                            ?>
                            @for($i = 1;$i < 8;$i++)
                                <li>
                                    <time class="cbp_tmtime" datetime="2013-04-10 18:30"><span>{{date('d-m', strtotime($liste->date . " +".$i." days"))}}</span><span>{{$jour_semaine[date('w', strtotime($liste->date . " +".$i." days"))]}}</span></time>
                                    <div class="cbp_tmicon cbp_tmicon-phone"></div>
                                    <div class="cbp_tmlabel">
                                        @foreach($liste->listes as $list)
                                            @if($list->day == $i)
                                                <?php $recettes = $list->recette ?>

                                                @foreach($recettes as $recette)

                                                    <h2>{{$recette->title}}</h2>
                                                    <p>{{$recette->description}}
                                                        {!! Form::open(array(
                                                        'url' => 'ListUpdate/'.$list->id ,
                                                         'method' => 'POST'
                                                        )) !!}
                                                        {!! Form::label('nbPers','Nombre de personnes') !!}
                                                        <ul class="list-inline">
                                                            <li>
                                                                {!! Form::number('nbPers',$list->nbPers,['id'=>'nbPers','class'=>'form-control','type'=>'text']) !!}
                                                            </li>
                                                            <li>
                                                                {!! Form::submit('Valider',['class' => 'btn btn-default']) !!}
                                                            </li>
                                                        </ul>
                                                        {{-- --}}
                                                        {!! Form::close() !!}
                                                    </p>

                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('jquery.nbPers')
@endsection