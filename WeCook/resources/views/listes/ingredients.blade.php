@extends('layouts.app')

@section('content')
    <?php
    $nbByDay = strlen((string) $liste->nbByDay);
    $nbTypes = strlen((string) $liste->type);
    $arrNbBD = array(0=>'Matin',1=>'Midi',2=>'Soir');
    $arrTps = array(0=>'Entrée',1=>'Plat',2=>'Dessert');
            $nb = $liste->usersListe->count();
    ?>
    <div class="container">
        <div class="row">
            <div class="contentShow">
                <div class="panel panel-default ">
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
                            <div class="col-xs-6">
                                <a href="{{url('profile/liste/'.$liste->id.'/userliste')}}" class="btn btn-primary center-block">Ajouter <span class="btn-display">participant</span></a>
                            </div>

                            <div class="col-xs-6">
                                <a href="{{url('profile/liste/'.$liste->id)}}" class="btn btn-primary center-block">Timeline</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <?php $arr = array(); ?>
                            @foreach($liste->listes as $liste)
                                <?php $recettes = $liste->recette ?>

                                @foreach($recettes as $recette)
                                    <?php $aliments = $recette->aliments ?>
                                    @if($aliments->count() > 0)

                                            @foreach($aliments as $a)
                                            <?php
                                                if($a->qtToShow == ''){
                                                    $qta = floatval(($a->qt/$recette->nbPers)*($nb+1));
                                                    }else{
                                                $qta = floatval($a->qtToShow/$recette->nbPers)*($nb+1);
                                                }

                                             $isIn = false; ?>
                                                    @foreach($arr as $key => $ar)
                                                         <?php
                                                        if($a->ingredient->name == $ar[0]['name']){
                                                             $isIn = true;

                                                            $arr[$key][0]['qt'] = $ar[0]['qt'] + $qta;
                                                        } ?>
                                                    @endforeach
                                                       <?php

                                                           if($isIn == false){
                                                               $arr[] = array(
                                                                       [
                                                                              'name' => "".$a->ingredient->name."",
                                                                              'qt' => $qta,
                                                                              'qtType' => "".$a->qtType."",
                                                                      ]
                                                    )
                                                               ;
                                                           }
                                                       ?>
                                            @endforeach
                                    @endif
                                @endforeach
                                <div class="clearfix"></div>
                            @endforeach
                                @foreach($arr as $key => $ar)
                                    <p class="text-left">{{ceil($ar[0]['qt'])}} {{$ar[0]['qtType']}} {{$ar[0]['name']}}</p>
                                    <div class="clearfix"></div>
                                @endforeach
                                    {!! Form::open(array(
      'action' => 'ListesController@mailListe' ,
      'method' => 'POST'
                 )) !!}
                                {{Form::hidden('arr',serialize($arr))}}
                                <button type="submit" class="btn btn-primary form-control">Recevoir la liste par mail >></button>
                            {{Form::close()}}
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('jquery.nbPers')
    @include('jquery.fixedTop')
@endsection