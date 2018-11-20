@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div id="monDiv">
            @if($recette->vid == 1)
                {{--Youtube--}}
                <iframe width="100%" height="100%"  src="https://www.youtube.com/embed/{{$recette->iframe}}?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            @elseif($recette->vid == 2)
                {{--Facebook--}}
                <iframe width="100%" src="https://www.youtube.com/embed/{{$recette->iframe}}?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            @endif        </div>
        <div class="clearfix"></div>
                            <h1 class="text-center titleShow">{{$recette->title}}</h1>
        <?php
        $aliments = $recette->aliments;
        $i = 0;
        $prix = 0;
        foreach ($aliments as $aliment){
        $prix += ($aliment->qt * $aliment->ingredient->prixGramme);
             }
            ?>
        <ul class="list-inline text-center">
            <li>Temps : {{$recette->time." min "}} <i class="fa fa-clock-o"></i></li>
            <li>Prix moyen : {{ceil($prix)}} <strong>€</strong></li>
        </ul>
                    <div class="contentShow">
                            <div class="col-md-12 list-inline" style="">
                                <li class="col-md-12 text-center center-block" style="width: 100%;">
                        <span>
                             <ul class="list-inline">
                            <?php
                                 for ($i = 1; $i <= 5; $i++) {
                                 ?>
                                 <li>
                                <img src="{{URL::asset('img/star.png')}}" alt="profile Pic" height="30" width="30">
                            </li>
                                 <?php
                                 }
                                 ?>
                            </ul>
                            <?php
                            if($favoriCount == 0){
                            ?>

                            {!! Form::open(
                                   array(
                                   'url' => array('/favoris/create'),
                                   'method' => 'PUT'
                                   )) !!}
                            {!! Form::hidden('recette_id',$recette->id)!!}
                            {!! Form::submit(   '+ Ajouter aux favoris',
                            ['class' => 'btn btn-success'])
                            !!}

                            {!! Form::close() !!}
                            <?php }elseif($favoriCount > 0){ ?>
                            {!! Form::open(
                                   array(
                                   'url' => array('/favoris/delete',$favori->id),
                                   'method' => 'DELETE'
                                   )) !!}
                            {!! Form::hidden('recette_id',$recette->id)!!}
                            {!! Form::submit(   '- Suprimmer des favoris',
                            ['class' => 'btn btn-danger'])
                            !!}
                            {!! Form::close() !!}
                            <?php }elseif($favoriCount == null){ ?>
                            <a href="{!! url('/login') !!}">
                            <input type="submit" class="btn btn-success" value="+ Ajouter aux favoris">
                            </a>
                            <?php   } ?>
                        </span>
                                </li>


                                <div class="clearfix"></div>
                                <div class="col-md-8 col-md-offset-2">
                                <div class="row">
                             <div class="col-md-6 text-center">
                                    <h3 class="text-center greyBack">Préparation</h3>
                                 <div class="col-md-12">
                                     <form name="chronoForm">
                                         <ul class="list-inline">
                                       <li style="display: inline-block;" ><input type="button" class="btn" name="startstop" value="start!" onClick="chronoStart()" /></li>
                                       <li style="display: inline-block;" ><span id="chronotime" class="h3">0:00:00:00</span></li>
                                       <li style="display: inline-block;" ><input type="button" class="btn" name="reset" value="reset!" onClick="chronoReset()" /></li>
                                         </ul>
                                     </form>
                                 </div>
                                    <p class="h3 text-left">{!! $recette->description !!}</p>
                             </div>
                                <div class="col-md-6 text-center">
                                    <h3 class="text-center greyBack">Ingrédients</h3>
                                    {!! Form::label('nbPers','Nombre de personnes',['class' => 'text-center']) !!}
                                    <ul class="list-inline">
                                        <li><button id="takeOff" class="btn" type="button">-</button></li>
                                        <li>
                                            {!! Form::text('nbPers',$recette->nbPers,['id'=>'nbPers','class'=>'form-control','type'=>'text','disabled']) !!}
                                        </li>
                                        <li><button id="add" class="btn" type="button">+</button></li>
                                    </ul>
                                    <ul class="list-group">
                                        <?php
                                        $aliments = $recette->aliments;
                                        $i = 0;
                                        foreach ($aliments as $aliment){
                                        $i++;
                                        if($aliment->qtToShow == ''){
                                            $qta = $aliment->qt;
                                        }else{
                                            $qta = $aliment->qtToShow;
                                        }
                                        ?>
                                        <li class="list-group-item">
                                            <p class="text-left">

                                                <input id="aliment" value="<?php echo $qta ?>" type="submit"  class="btn " style="background-color: transparent; color: black; font-weight: 600;" about="<?php echo floatval($qta/($recette->nbPers)) ?>" disabled/>
                                                {{$aliment->qtType}}
                                                {{$aliment->ingredient->name}}
                                            </p>
                                        </li>
                                        <?php
                                        };
                                        ?>

                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                        <div class="clearfix"></div>
                        <div class="height"></div>
                        <hr>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            @if(Auth::check())
                            <h3>Ajouter dans une liste</h3>
                                {!! Form::open(array(
                                 'action' => 'ListesController@selectList' ,
                                 'method' => 'POST'
                                )) !!}
                                {!! Form::hidden('recette_id', $recette->id) !!}
                                {{Form::select('nameList_id',$nameListes,null,array('class'=>'form-control'))}}
                                {!! Form::submit('valider',['class' => 'btn btn-primary form-control']) !!}
                                    @endif
                                {!! Form::close() !!}
                        </div>
                            </div>
                            </div>
                            <div class="clarfix"></div>
                        <div class="col-md-12">
                            @yield('searchBarShow')
                            @include('search.searchBarShow')
                        </div>
                        </div>
                    </div>
                    </div>
    <script>
        function adpaterALaTailleDeLaFenetre(){
            var largeur = document.documentElement.clientWidth,
                 hauteur = document.documentElement.clientHeight;

            var source = document.getElementById('monDiv'); // récupère l'id source
            if(largeur > 768){


            source.style.height = (hauteur/2)+'px'; // applique la hauteur de la page
            source.style.width = (largeur/2)+'px'; // la largeur
            source.style.margin = '0 auto'; // la largeur
                 }else{
                source.style.height = (hauteur/2.4)+'px'; // applique la hauteur de la page
                source.style.width = largeur+'px'; // la largeur
                source.style.margin = '0 auto'; // la largeur
            }
        }
        // Une fonction de compatibilité pour gérer les évènements
        function addEvent(element, type, listener){
            if(element.addEventListener){
                element.addEventListener(type, listener, false);
            }else if(element.attachEvent){
                element.attachEvent("on"+type, listener);
            }
        }
        // On exécute la fonction une première fois au chargement de la page
        addEvent(window, "load", adpaterALaTailleDeLaFenetre);
        // Puis à chaque fois que la fenêtre est redimensionnée
        addEvent(window, "resize", adpaterALaTailleDeLaFenetre);
    </script>
    @include('jquery.fixedTop')
    @include('jquery.nbPers')
@include('jquery.chrono')
@endsection


