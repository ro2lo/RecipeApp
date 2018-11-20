@extends('layouts.app')
@section('content')
<?php
$nbByDay = strlen((string) $liste->nbByDay);
$nbTypes = strlen((string) $liste->type);
$arrNbBD = array(0=>'Matin',1=>'Midi',2=>'Soir');
$arrTps = array(0=>'Entrée',1=>'Plat',2=>'Dessert');
$jour_semaine = array(0=>"Dimanche", 1=>"Lundi", 2=>"Mardi", 3=>"Mercredi", 4=>"Jeudi", 5=>"Vendredi", 6=>"Samedi");
$repas = array(0=>"Matin", 1=>"Midi", 2=>"Soir"); $u=0;
$anchors = array('auto','firstPage', 'secondPage','thirdPage','fourthPage','fivePage','sixPage','sevenPage');

?>


<div id="wrapper">
    <div class="overlay"></div>

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <p class="media-middle text-center">{{$liste->name}}</p>
            </li>
            <li class="clerfix"></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jours <span class="caret"></span></a>
                <ul class="dropdown-menu" id="myMenu" role="menu">
                    <li class="dropdown-header">Dropdown heading</li>
                    <?php $y=0; ?>
                @foreach($anchors as $key => $arr)
                        <?php if ($y < ($liste->nbDay+1) && $y > 0){ ?>
                        <li  class="active">
                            <a href="#{{$arr}}" data-menuanchor="{{$arr}}">{{$jour_semaine[date('w', strtotime($liste->date . " +".($key)." days"))]}}</a>
                        </li>
                        <?php
                        }
                            $y++;
                        ?>
                @endforeach
                </ul>
            </li>
            <li>
                <a href="#">
                    {{$liste->usersListe->count()+1}} Personnes
                </a>
            </li>
            <li>
                <a href="#">
                    @for($i = 0; $i < $nbByDay; $i++)
                        {{$arrNbBD[intval(strval($liste->nbByDay)[$i])-1]}}
                        @if($i != ($nbByDay - 1))
                            /
                        @endif
                    @endfor
                </a>
            </li>
            <li>
                <a href="#">
                @for($i = 0; $i < $nbTypes; $i++)
                    {{$arrTps[intval(strval($liste->type)[$i])-1]}}
                    @if($i != ($nbTypes - 1))
                        /
                    @endif
                @endfor
                </a>
            </li>
            <li>
                <a href="{{url('profile/liste/'.$liste->id.'/userliste')}}" class="">Ajouter <span class="">participant</span></a>
            </li>
            <li>
                <a class="btn " href="#generate"  type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Générer <span class="">Automatiquement</span>
                </a>
            </li>
            <li>
                <a href="{{url('profile/listIngredients/'.$liste->id)}}" class="">Liste <span class="">des ingrédients</span></a>
            </li>
            <li>
                <a href="/home">Retour au site</a>
            </li>
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>

                <div class="clearfix"></div>
            <?php
            $o = 0;
            $h = 0;
            $format = "d-m-y";
            ?>
            <div id="fullpage">

                <div id="generate"  class="fp-section"  >
                    <div class="card card-body col-md-10 col-md-offset-1">
                        <h4 class="text-center">Générer Automatiquement</h4>
                        <p class="text-center">Organiser votre semaine en un clic!</p>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        @if(Auth::check() && Auth::user()->status == 1)
                            <div class="col-md-12">
                                <p class="text-center"><strong>Pour organiser vos recettes en prenant en compte vos interdits alimentaire et vos régimes personnalisés, réglez ces informations directement sur
                                        <a href="{{url('profile/'.Auth::user()->id.'/edit')}}">votre profil</a>.</strong></p>
                            </div>
                            {!! Form::open(array(
                               'url' => 'returnRecettes' ,
                               'method' => 'POST'
                               )) !!}
                            <button class="btn btn-primary form-control" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Plus de critères +
                            </button>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                            {{-- Champs du formulaire --}}
                            <div class="col-md-12">
                                {!! Form::label('time', 'Temps maximum de préparation par recette (minutes)') !!}
                                <div class="form-group">
                                    {{ Form::number("time",   old('content')  , ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                {!! Form::label('budget', 'Budget pour la durée de la liste ('.$liste->nbDay.' jours)') !!}
                                <div class="form-group">
                                    {{ Form::number("budget",   '€'  , ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                {!! Form::label('country', 'Thème par pays ?') !!}
                                <div class="form-group">
                                    {{ Form::select("country", $country,  old('content')  , ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        {{ Form::checkbox('myIng',1,0,['class' => 'form-check-input']) }}
                                        Je souhaite choisir des ingrédients
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-radio form-radio-inline">
                                    <h5>Pour ma liste de course :</h5>
                                    <label class="form-radio-label col-sm-6 col-xs-12">
                                        {{ Form::radio('qt',1,['class' => 'form-check-input']) }}
                                        Je calcule les ingrédients en fonction des quantitées moyenne en magasin.
                                    </label>
                                    <label class="form-radio-label col-sm-6 col-xs-12">
                                        {{ Form::radio('qt',0,['class' => 'form-check-input']) }}
                                        Je calcule les ingrédients au gramme près.
                                    </label>
                                </div>
                            </div>
                            {{ Form::hidden('nameList_id',$liste->id) }}
                    </div>
                </div>
                            <div class="clearfix"></div>
                            {!! Form::submit('Générer Automatiquement !',['class' => 'btn btn-primary center-block form-control']) !!}
                            {{-- --}}
                            {!! Form::close() !!}
                            @elseif(Auth::check() && Auth::user()->freeTest == 0)
                                <a class="btn btn-success center-block" href="">Commencez votre essaie gratuit dès maintenant - 15 jours</a>
                            @else
                                <p class="text-danger">Service réservé exclusivement aux comptes abonnés.</p>
                                <a class="btn btn-success center-block" href="">Voir les avantages d'un compte abonné !</a>
                            @endif
                    </div>
                </div>

                @for($i = 1;$i < ($liste->nbDay+1);$i++)
                    <div class="section @if($i == 1) active @endif">
                        <h1 class="text-center day text-uppercase">{{$jour_semaine[date('w', strtotime($liste->date . " +".$i." days"))]}}</h1>

                        @foreach($liste->listes as $list)
                            @if($list->day == $i)
                                <?php if($h == $nbTypes){$h = 0;} ?>
                                @if($h == 0)
                                    <div class="slide">
                                        <h2 class="text-center">{{$repas[intval(strval($liste->nbByDay)[$o])-1]}}</h2>
                                        @endif
                                        @if($h == 0)
                                            <?php
                                            $o++;
                                            if($o == $nbByDay){$o = 0;}
                                            ?>
                                        @endif
                                        <div class="@if($nbTypes == 3) col-sm-4 @elseif($nbTypes == 2)col-sm-6 @else col-sm-12 @endif">
                                        <h4 class="col-md-12 text-center type">
                                        - <strong>{{$arrTps[intval(strval($liste->type)[$h])-1]}}</strong> -
                                        </h4>
                                            <div class="clearfix"></div>
                                    <?php $h++; ?>
                                        <?php $recettes = $list->recette;  ?>
                                        @foreach($recettes as $recette)
                                            <div class="col-md-10 col-md-offset-1 col-xs-12 text-center each">

                                                <div class="col-sm-12 col-xs-6">
                                                    <img src="https://img.youtube.com/vi/{{ $recette->picture }}/hqdefault.jpg" class="img-responsive"  alt="{{$recette->title}}">
                                                </div>
                                                <div class="col-sm-12 col-xs-6 top15">
                                                    <a style="color: white" class="text-center list-inline" href="{{ url('recettes/'.$recette->id) }}"> <h3 style="display: inline-block">{{$recette->title}}</h3>
                                                        <p class="visible-xs-inline-block"><i class="fa fa-hour"></i> - {{$recette->time}} minutes </p>
                                                    </a>
                                                    <p>{{$recette->description}}</p>
                                                    <p class="visible-sm-block"><i class="fa fa-hour"></i>{{$recette->time}} minutes </p>
                                                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal{{$recette->id}}">Ingrédients</button>
                                                </div>


                                                <div class="modal fade" id="modal{{$recette->id}}" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog col-md-6" role="document" @if($o == 0) style="float: right;" @elseif(($o == 1)) style="float: left;"  @endif>
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ingrédients</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php $aliments = $recette->aliments ?>
                                                                @if(count($aliments)> 0)
                                                                    @foreach($aliments as $aliment)
                                                                       <p>{{$aliment->qt.' '.$aliment->qtType.' '.$aliment->ingredient->name}}</p>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                <a type="button" href="{{url('recettes/'.$recette->id)}}" class="btn btn-primary">Voir recette</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                        @endforeach
                                            <div class="clearfix"></div>
                                        </div>
                                    @if($h == $nbTypes)
                                            <?php $h = 0 ?>
                                            @if($h == 0)
                                    </div>
                                @endif
                             @endif
                            @endif
                        @endforeach
                    </div>
                @endfor
            </div>
        </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->




@include('jquery/fullpageSlider')
@endsection