@extends('layouts.app')
@section('content')
<?php
$nbByDay = strlen((string) $liste->nbByDay);
$nbTypes = strlen((string) $liste->type);
$arrNbBD = array(0=>'Matin',1=>'Midi',2=>'Soir');
$arrTps = array(0=>'Entrée',1=>'Plat',2=>'Dessert');
?>

    <div class="container">
        <div class="row">
            <div class="contentShow">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <a href="{{url('profile/'.Auth::user()->id.'/listes')}}" class="btn-sm btn-primary">Retour</a>
                        <h1 class="media-middle text-center">{{$liste->name}}</h1>
                        <p class="text-center">
                            {{$liste->usersListe->count()+1}} Personnes  -
                        @for($i = 0; $i < $nbByDay; $i++)
                                {{$arrNbBD[intval(strval($liste->nbByDay)[$i])-1]}}

                            @if($i != ($nbByDay - 1))
                                /
                                @endif
                        @endfor
                            -
                        @for($i = 0; $i < $nbTypes; $i++)
                                {{$arrTps[intval(strval($liste->type)[$i])-1]}}
                            @if($i != ($nbTypes - 1))
                                /
                            @endif
                        @endfor
                        </p>
                        <a href="{{url('profile/'.$liste->user->id)}}"class="pull-right col-md-1"> Par
                            <img src="/uploads/avatars/{{$liste->user->avatar}}" class="img-circle" style="
                                    width: 100%; top: 10px; left: 10px;
                                    " alt="">
                            {{$liste->user->name}}</a>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-xs-4">
                                <a href="{{url('profile/liste/'.$liste->id.'/userliste')}}" class="btn btn-primary center-block">Ajouter <span class="btn-display">participant</span></a>
                            </div>
                            <button class="btn btn-primary col-xs-4" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Générer <span class="btn-display">Automatiquement</span>
                            </button>
                            <div class="col-xs-4">
                                <a href="{{url('profile/listIngredients/'.$liste->id)}}" class="btn btn-primary center-block">Liste <span class="btn-display">des ingrédients</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    @if(Auth::check() && Auth::user()->status == 1)
                                    {!! Form::open(array(
                                    'url' => 'generateLists' ,
                                    'method' => 'POST'
                                    )) !!}
                                    {{-- Champs du formulaire --}}
                                    <div class="col-md-4">
                                        {!! Form::label('cateForbiden_id', 'Régime spéciale') !!}
                                        <div class="form-group">
                                            {{ Form::select("cateForbiden_id", $cateForbiden,  old('content')  , ['class' => 'form-control']) }}
                                        </div>
                                        </div>
                                    <div class="col-md-4">
                                    {!! Form::label('time', 'Temps moyen de préparation par recette') !!}
                                        <div class="form-group">
                                            {{ Form::select("time", ['1'=>'1'],  old('content')  , ['class' => 'form-control']) }}
                                        </div>
                                        </div>
                                    <div class="col-md-4">
                                    {!! Form::label('budget', 'Budget pour la semaine') !!}
                                        <div class="form-group">
                                            {{ Form::select("budget", ['1'=>'1'],  old('content')  , ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    {!! Form::label('country', 'Thème par pays ?') !!}
                                        <div class="form-group">
                                            {{ Form::select("country", $country,  old('content')  , ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    {{ Form::hidden('nameList_id',$liste->id) }}
                                    <div class="clearfix"></div>
                                    {!! Form::submit('Valider',['class' => 'btn btn-primary pull-right']) !!}
                                    {{-- --}}
                                    {!! Form::close() !!}
                                        @else
                                        <p class="text-danger">Service réservé exclusivement aux comptes abonnés.</p>
                                        @if(Auth::user()->freeTest == 0)
                                            <a class="btn btn-success center-block" href="">Commencez votre essaie gratuit dès maintenant - 15 jours</a>
                                            @else
                                            <a class="btn btn-success center-block" href="">Voir les avantages d'un compte abonné !</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                            <div class="col-md-10 col-md-offset-1 text-center">
                            <ul class="list-inline">
                                <?php
                                $jour_semaine = array(0=>"dimanche", 1=>"lundi", 2=>"mardi", 3=>"mercredi", 4=>"jeudi", 5=>"vendredi", 6=>"Samedi");
                                $repas = array(0=>"Matin", 1=>"Midi", 2=>"Soir"); $u=0;


                                ?>


                                    @for($i = 1;$i < 8;$i++)
                                    <li>
                                        <a class="btn btn-primary" href="#{{$jour_semaine[date('w', strtotime($liste->date . " +".$i." days"))]}}">{{$jour_semaine[date('w', strtotime($liste->date . " +".$i." days"))]}}</a>
                                    </li>
                                    @endfor
                            </ul>
                    </div>
                            <div class="clearfix"></div>
                        <ul class="cbp_tmtimeline">

                            @for($i = 1;$i < 8;$i++)
                                   <?php
                                   $o = 0;
                                   $h = 0;
                                   $format = "d-m-y";
                                   ?>

                                   <li>
                                    <time id="{{$jour_semaine[date('w', strtotime($liste->date . " +".$i." days"))]}}" class="cbp_tmtime" @if(DateTime::createFromFormat($format,date('d-m', strtotime($liste->date . " +".$i." days"))) < DateTime::createFromFormat($format,date('d-m'))) style="display: none" @endif datetime="2013-04-10 18:30"><span>{{date('d-m', strtotime($liste->date . " +".$i." days"))}}</span><span>{{$jour_semaine[date('w', strtotime($liste->date . " +".$i." days"))]}}</span></time>

                                           <div class="cbp_tmicon cbp_tmicon-phone"></div>
                                    <div class="cbp_tmlabel">
                                        @foreach($liste->listes as $list)
                                            @if($list->day == $i)
                                                <?php if($h == $nbTypes){$h = 0;} ?>
                                                @if($h == 0)
                                                        <hr>
                                            <h2 class="text-center">{{$repas[intval(strval($liste->nbByDay)[$o])-1]}}</h2>
                                                    <?php
                                                            $o++;
                                                        if($o == $nbByDay){$o = 0;}
                                                        ?>
                                                    @endif
                                                    - {{$arrTps[intval(strval($liste->type)[$h])-1]}} -
                                                    <?php $recettes = $list->recette;  ?>
                                                    <?php $h++; ?>
                                                    @foreach($recettes as $recette)
                                                        <div class="col-md-12">
                                                        <a style="color: white" href="{{ url('recettes/'.$recette->id) }}"> <h3>{{$recette->title}}</h3></a>
                                                        <div class="col-md-6">
                                                            <p>{{$recette->description}}</p>
                                                            <p>{{$list->nbPers}} personnes</p>
                                                            <p>{{$recette->time}} minutes de préparation</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?php $aliments = $recette->aliments ?>
                                                            @if(count($aliments)> 0)
                                                                @foreach($aliments as $aliment)
                                                                    <p>{{$aliment->qt.' '.$aliment->qtType.' '.$aliment->ingredient->name}}</p>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        </div>
                                                    @endforeach

                                                <div class="clearfix"></div>
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
@endsection