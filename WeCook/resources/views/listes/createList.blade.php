@extends('layouts.app')
@section('content')
    <?php
    $nbByDay = strlen((string) $liste->nbByDay);
    $nbTypes = strlen((string) $liste->type);
    $arrNbBD = array(0=>'Matin',1=>'Midi',2=>'Soir');
    $arrTps = array(0=>'Entrée',1=>'Plat',2=>'Dessert');
    $jour_semaine = array('Dimanche',"Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
    $repas = array(0=>"Matin", 1=>"Midi", 2=>"Soir"); $u=0;
     $arr = array(
                                    1=>[
                                            0 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            1 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            2 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                    ],
                                    2=>[
                                            0 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            1 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            2 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                    ],
                                    3=>[
                                            0 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            1 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            2 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                    ],
                                    4=>[
                                            0 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            1 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            2 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                    ],
                                    5=>[
                                            0 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            1 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            2 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                    ],
                                    6=>[
                                            0 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            1 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            2 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                    ],
                                    7=>[
                                            0 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            1 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                            2 => [
                                                    0=>0,
                                                    1=>0,
                                                    2=>0,
                                            ],
                                    ]);

                               $h = 0;
                               $o = 0;
                               ?>
                               @for($i = 1;$i < ($liste->nbDay+1);$i++)
                                   @foreach($liste->listes as $list)
                                       @if($list->day == $i)
                                           @if($list->recette_id != null)
                                               <?php    $arr[$i][$o][$h]++;  ?>
                                           @endif
                                               <?php $h++; ?>
                                               <?php if($h == $nbTypes){$h = 0;} ?>
                                                @if($h == 0)
                                                    <?php
                                                      $o++;
                                                    if($o == $nbByDay){$o = 0;}
                                                    ?>
                                                @endif
                                       @endif
                                   @endforeach
                               @endfor

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
                                                <?php
                                                $anc = array(0=>'auto',1=>'firstPage', 2=>'secondPage',3=>'thirdPage',4=>'fourthPage',5=>'fivePage',6=>'sixPage',7=>'sevenPage');
                                                $i = 0;
                                                ?>

                                                @foreach($anc as $key)
                                                    <?php $i++; ?>
                                                    <li  class="active"><a href="#{{$key}}" data-menuanchor="{{$key}}">{{$jour_semaine[date('w', strtotime($liste->date . " +".($i-1)." days"))]}}</a></li>
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

                                    </div>
                                    @for($i = 1;$i < ($liste->nbDay+1);$i++)
                                        <div class="section @if($i == 1) active @endif">
                                            <h1 class="text-center day text-uppercase">{{$jour_semaine[date('w', strtotime($liste->date . " +".$i." days"))]}}</h1>

                                            @foreach($liste->listes as $list)
                                                @if($list->day == $i)
                                                    <?php if($h == $nbTypes){$h = 0;} ?>
                                                    @if($h == 0)
                                                        <div class="slide">
                                                            @endif
                                                            @if($h == 0)
                                                                <?php
                                                                $a = $arr[$i][$o][0] +
                                                                        $arr[$i][$o][1] +
                                                                        $arr[$i][$o][2];
                                                                ?>

                                                                @if( $a < $nbTypes )
                                                                    <h2 class="text-center">{{$repas[intval(strval($liste->nbByDay)[$o])-1]}}   <button class="btn btn-success " >{{$nbTypes - $a}} places</button></h2>

                                                                @else
                                                                    <h2 class="text-center">{{$repas[intval(strval($liste->nbByDay)[$o])-1]}}   <button class="btn btn-danger " >Complet</button></h2>

                                                                @endif
                                                                <?php
                                                                $o++;
                                                                if($o == $nbByDay){$o = 0;}
                                                                ?>
                                                            @endif
                                                            <div class="@if($nbTypes == 3) col-sm-4 @elseif($nbTypes == 2)col-sm-6 @else col-sm-12 @endif">

                                                                {!! Form::open(array(
                                                                     'action' => 'ListesController@switchList' ,
                                                                      'method' => 'POST'
                                                                      )) !!}
                                                                {!! Form::hidden('day',$i) !!}
                                                                {!! Form::hidden('nameList_id',$liste->id) !!}
                                                                {!! Form::hidden('listToSwitch',$list->id) !!}
                                                                {!! Form::hidden('recette_id',$recetteId) !!}
                                                                {!! Form::hidden('nbPers',$liste->usersListe->count() + 1) !!}

                                                                @if( $list->recette_id == null)
                                                                    <h4 class="col-md-12 text-center type">
                                                                        - <strong>{{$arrTps[intval(strval($liste->type)[$h])-1]}}</strong> - {!! Form::submit('Ajouter',['class' => 'btn btn-success']) !!}
                                                                    </h4>
                                                                @else
                                                                    <h4 class="col-md-12 text-center type">
                                                                        - <strong>{{$arrTps[intval(strval($liste->type)[$h])-1]}}</strong> - {!! Form::submit('Échanger',['class' => 'btn btn-warning']) !!}
                                                                    </h4>
                                                                @endif
                                                                <?php $h++; ?>
                                                                <div class="clearfix"></div>
                                                                {{-- --}}
                                                                {!! Form::close() !!}
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