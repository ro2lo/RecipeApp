@extends('layouts.app')
@section('content')
    <div class="col-md-12 " style="margin-top: 65px"    id="">
        <div class="">
            <div class="">
                <div class="panel panel-default">
                             {{--<div class="panel-heading"><h1 style="margin-top: 20px" class="text-center">Bon Appétit !!</h1></div>--}}
                    <div class="">
                        <div class="la-anim-1"></div>

                        <div id="la-buttons" class="column">
                            <button  data-anim="la-anim-1" hidden></button>
                        </div>
                        <div class="col-sm-12">
                                <!-- Nav tabs -->
                                <ul class="list-inline text-center col-md-10 col-md-offset-1" role="tablist">
                                    <li role="presentation" class="center-block text-center @if($active == 1 or $active == null)active  @endif"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Entrées ({{count($recettesStatus1count)}})</a></li>
                                    <li role="presentation" class="center-block text-center @if($active == 2 ) active @endif"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Plats ({{count($recettesStatus2count)}})</a></li>
                                    <li role="presentation" class="center-block text-center @if($active == 3 ) active  @endif"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Desserts ({{count($recettesStatus3count)}})</a></li>
                                    <li role="presentation" class="center-block text-center @if($active == 4 ) active  @endif"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Boissons ({{count($recettesStatus4count)}})</a></li>
                                    <li role="presentation" class="center-block text-center @if($active == 5 ) active  @endif"><a href="#patisseries" aria-controls="patisseries" role="tab" data-toggle="tab">Patisseries ({{count($recettesStatus5count)}})</a></li>
                                    @if($filter == true)
                                        <li role="presentation" class="center-block text-center"><a href="{!!e(url('/recettes'))!!}" class="unload-filter">Retirer les filtres</a></li>
                                    @endif
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane @if($active == 1 or $active == null) active @endif" id="home">
                                        <div class="">
                                            <div class="" role="tab" id="headingTwo">
                                                {!! Form::open(array(
                                                       'url' => '/recettes/filter1?recettesStatus3='.$recettesStatus3->currentPage().'&recettesStatus2='.$recettesStatus2->currentPage().'&recettesStatus4='.$recettesStatus4->currentPage().'&recettesStatus5='.$recettesStatus5->currentPage().'&recettesStatus1=1',
                                                       'method' => 'POST',
                                                       'name' => 'first'
                                                    )) !!}
                                                {{ Form::hidden('mode', '1') }}
                                                {{ Form::hidden('titleEntree', $titleEntree) }}
                                                {{ Form::hidden('lowCalEntree', $lowCalEntree) }}
                                                {{ Form::hidden('cateAlimentEntree', $cateAlimentEntree) }}
                                                {{ Form::hidden('countryEntree', $countryEntree) }}
                                                {{ Form::hidden('titlePlats', $titlePlats) }}
                                                {{ Form::hidden('lowCalPlats', $lowCalPlats) }}
                                                {{ Form::hidden('cateAlimentPlats', $cateAlimentPlats) }}
                                                {{ Form::hidden('countryPlats', $countryPlats) }}
                                                {{ Form::hidden('titleBoissons', $titleBoissons) }}
                                                {{ Form::hidden('lowCalBoissons', $lowCalBoissons) }}
                                                {{ Form::hidden('cateAlimentBoissons', $cateAlimentBoissons) }}
                                                {{ Form::hidden('countryBoissons', $countryBoissons) }}
                                                {{ Form::hidden('titleDesserts', $titleDesserts) }}
                                                {{ Form::hidden('lowCalDesserts', $lowCalDesserts) }}
                                                {{ Form::hidden('cateAlimentDesserts', $cateAlimentDesserts) }}
                                                {{ Form::hidden('countryDesserts', $countryDesserts) }}
                                                {{ Form::hidden('titlePatisseries', $titlePatisseries) }}
                                                {{ Form::hidden('lowCalPatisseries', $lowCalPatisseries) }}
                                                {{ Form::hidden('cateAlimentPatisseries', $cateAlimentPatisseries) }}
                                                {{ Form::hidden('countryPatisseries', $countryPatisseries) }}
                                                <div class="form-group col-md-10 col-md-offset-1">
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="input-group col-md-10 col-md-offset-1">
                                                    {{ Form::text('title', $titleEntree , ['class' => 'form-control ','id' => 'searchEntre','placeholder' => 'Recherchez une entrée']) }}
                                                    <span onclick="first.submit()" class="input-group-addon" id=""><i class="fa fa-search"></i></span>
                                                </div>
                                                <div class="clearfix"></div>

                                                <h4 class="panel-title">
                                                    <a class="collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        <p class="text-center">Plus de critères ></p>
                                                    </a>
                                                </h4>
                                                <div class="clearfix"></div>

                                            <div id="collapseOne" class="panel-collapse collapse col-md-10 col-md-offset-1" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="">
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                        {!! Form::label('LowCal', 'LowCal') !!}
                                                        <div class="form-group">
                                                            {{ Form::checkbox('LowCal',1,0, ['class' => 'form-control']) }}
                                                        </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                        {!! Form::label('Time', 'Time (Minutes)') !!}
                                                        <div class="form-group">
                                                            {!! Form::select('Time', array(
                                                          null =>'No limit',
                                                          '1'  =>'0/5',
                                                          '2' =>'5/10',
                                                          '3'=>'10/20',
                                                          '4'=>'20/30',
                                                          '5'=>'30/1h',
                                                          '6'  => '1h+'
                                                          ),null,['class' => 'form-control']) !!}
                                                        </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                        {!! Form::label('Country', 'Country') !!}
                                                            <div class="form-group">
                                                            {{ Form::select('country_id',$country, old('content') , ['class' => 'form-control']) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            {!! Form::label('cateAliment', 'cateAliment') !!}
                                                            <div class="form-group">
                                                                {{ Form::select("cateAliment", $cateAliments1,  old('content')  , ['class' => 'form-control']) }}
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                {!! Form::submit('Envoyer',['class' => 'btn btn-primary center-block']) !!}
                                            </div>
                                                <div class="clearfix"></div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="clearfix"></div>
                                            <h4 data-toggle="collapse" href="#sidebar1" class="filter panel-heading" aria-expanded="true" aria-controls="sidebar1">Filtres +</h4>
                                            <div class="left-bar col-sm-2">
                                            <div class="collapse in" id="sidebar1">
                                            <h4 class="text-center">Temps</h4>
                                            {!! Form::open(array(
                                                      'url' => '/recettes/filter1?recettesStatus3='.$recettesStatus3->currentPage().'&recettesStatus2='.$recettesStatus2->currentPage().'&recettesStatus4='.$recettesStatus4->currentPage().'&recettesStatus5='.$recettesStatus5->currentPage().'&recettesStatus1=1',
                                                      'method' => 'POST',
                                                      'id' => 'form1'
                                                   )) !!}
                                                {{ csrf_field() }}
                                            <input name='lowCalEntree' value=" {{$lowCalEntree}}" hidden>
                                            <input type="text" name="titleEntree" id="titleEntree" value="{{$titleEntree}}" hidden>
                                            <input name='cateAlimentEntree' value=" {{$cateAlimentEntree}}" hidden>
                                            <input name='countryEntree' value=" {{$countryEntree}}" hidden>
                                            <input name='timeEntree' value=" {{$timeEntree}}" hidden>
                                            <input name='prixEntree' value=" {{$prixEntree}}" hidden>
                                            <input name='ingredientEntree' value=" {{$ingredientEntree}}" hidden>
                                            <input name='titlePlats' value=" {{$titlePlats}}" hidden>
                                            <input name='lowCalPlats' value=" {{$lowCalPlats}}" hidden>
                                            <input name='cateAlimentPlats' value=" {{$cateAlimentPlats}}" hidden>
                                            <input name='countryPlats' value=" {{$countryPlats}}" hidden>
                                            <input name='timePlats' value=" {{$timePlat}}" hidden>
                                            <input name='prixPlats' value=" {{$prixPlat}}" hidden>
                                            <input name='ingredientPlats' value=" {{$ingredientPlat}}" hidden>
                                            <input name='titleBoissons' value=" {{$titleBoissons}}" hidden>
                                            <input name='lowCalBoissons' value=" {{$lowCalBoissons}}" hidden>
                                            <input name='cateAlimentBoissons' value=" {{$cateAlimentBoissons}}" hidden>
                                            <input name='countryBoissons' value=" {{$countryBoissons}}" hidden>
                                            <input name='timeBoissons' value=" {{$timeBoisson}}" hidden>
                                            <input name='prixBoissons' value=" {{$prixBoisson}}" hidden>
                                            <input name='ingredientBoissons' value=" {{$ingredientBoisson}}" hidden>
                                            <input name='titleDesserts' value=" {{$titleDesserts}}" hidden>
                                            <input name='lowCalDesserts' value=" {{$lowCalDesserts}}" hidden>
                                            <input name='cateAlimentDesserts' value=" {{$cateAlimentDesserts}}" hidden>
                                            <input name='countryDesserts' value=" {{$countryDesserts}}" hidden>
                                            <input name='timeDesserts' value=" {{$timeDessert}}" hidden>
                                            <input name='prixDesserts' value=" {{$prixDessert}}" hidden>
                                            <input name='ingredientDesserts' value=" {{$ingredientDessert}}" hidden>
                                            <input name='titlePatisseries' value=" {{$titlePatisseries}}" hidden>
                                            <input name='lowCalPatisseries' value=" {{$lowCalPatisseries}}" hidden>
                                            <input name='cateAlimentPatisseries' value=" {{$cateAlimentPatisseries}}" hidden>
                                            <input name='countryPatisseries' value=" {{$countryPatisseries}}" hidden>
                                            <input name='timePatisseries' value=" {{$timePatisserie}}" hidden>
                                            <input name='prixPatisseries' value=" {{$prixPatisserie}}" hidden>
                                            <input name='ingredientPatisseries' value=" {{$ingredientPatisserie}}" hidden>
                                            <input type="text" name="time" id="time" value="" hidden>
                                            <input type="text" name="ingredient" id="ingredient" value="" hidden>
                                            <input type="text" name="prix" id="prix" value="" hidden>
                                            <input type="text" name="mode" id="mode" value="" hidden>
                                            {{ Form::close() }}
                                            <button class="btn form-control center-block @if($timeEntree != null && $timeEntree == 1) btn-success @endif" onclick="time(this)" data-id="1" data-time="1">- de 20 min >></button>
                                            <button class="btn form-control center-block @if($timeEntree != null && $timeEntree == 2) btn-success @endif" onclick="time(this)" data-id="1" data-time="2">- de 60 min >></button>
                                            <button class="btn form-control center-block @if($timeEntree != null && $timeEntree == 3) btn-success @endif" onclick="time(this)" data-id="1" data-time="3">+ de 60 min >></button>
                                            <div class="clearfix"></div>
                                            <h4 class="text-center">Prix</h4>
                                            <button class="btn form-control center-block @if($prixEntree != null && $prixEntree == 5)btn-success @endif" onclick="prix(this)" data-id="1" data-prix="@if($prixEntree != null && $prixEntree == 5) 5000000000 @else 5 @endif ">Pas cher >></button>
                                            <h4 class="text-center">Ingrédients</h4>
                                            <?php $arr = array();
                                            ?>
                                            @foreach ($recettesStatus1count as $recette)
                                                <?php $aliments = $recette->aliments ?>
                                                @if(count($aliments)> 0)
                                                    @foreach($aliments as $a)
                                                    <?php $isIn = false; ?>
                                                        @foreach($arr as $key => $ar)
                                                            <?php
                                                            if($a->ingredient->name == $ar[0]['name']){
                                                                $isIn = true;
                                                                $arr[$key][0]['nb'] = $ar[0]['nb'] + 1;
                                                            } ?>
                                                        @endforeach
                                                        <?php
                                                        if($isIn == false){
                                                            $arr[] = array(
                                                                    [
                                                                            'name' => "".$a->ingredient->name."",
                                                                            'nb' => 1,
                                                                            'ingredient_id' => "".$a->ingredient->id.""
                                                                    ]
                                                            )
                                                            ;
                                                        }
                                                        ?>
                                                @endforeach
                                                    @endif
                                            @endforeach
                                            @foreach($arr as $key => $ar)
                                                <button class="btn form-control center-block  @if(isset($ingredientEntree) && $ar[0]['ingredient_id'] == $ingredientEntree) btn-success @endif" onclick="ingredient(this)" data-id="1" data-ingredient="@if( isset($ingredientEntree) && $ar[0]['ingredient_id'] == $ingredientEntree) 0 @else{{$ar[0]['ingredient_id']}}@endif">{{$ar[0]['name']}} ({{$ar[0]['nb']}})</button>
                                            @endforeach
                                        </div>
                                        </div>
                                        <div class="col-sm-8">
                                            @if(isset($titleEntree) && $titleEntree != null)
                                           <h3 class="text-center">{{count($recettesStatus1count)}} résultat<?php if(count($recettesStatus1count) > 1){echo's';} ?> pour : {{$titleEntree}}</h3>
                                            @endif
                                                @foreach ($recettesStatus1 as $recette)
                                            <div class="col-sm-12 col-xs-6" id="recette1" data-time="{{$recette->time}}">

                                                <a href="{{  e(url('/recettes/'.$recette->id)) }}" class="text-center"><h2>{{$recette->title}}</h2></a>
                                                    <div class="col-md-6">
                                                    <div role="tabpanel" class="tab-pane " id="home">
                                                        <div class="clearfix"></div>
                                                        <iframe width="100%" style="min-height:270px"   src="{!! $recette->iframe !!}" frameborder="0" allowfullscreen></iframe>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                           <p><i class="fa fa-clock-o"></i>  {{$recette->time}} minutes</p>
                                                           <p>{{$recette->description}}</p>
                                                        <p>{{$recette->toKnow}}</p>
                                                        <div class="clearfix"></div>
                                                        <p>{{$recette->grade}}</p>
                                                    </div>

                                                </div>
                                        @endforeach
                                        </div>
                                        </div>

                                        <div class="text-center center-block col-md-12">
                                        {{$recettesStatus1->appends([
                                        'recettesStatus3' => "".$recettesStatus3->currentPage()."",
                                        'recettesStatus2' => "".$recettesStatus2->currentPage()."",
                                        'recettesStatus4' => "".$recettesStatus4->currentPage()."",
                                        'recettesStatus5' => "".$recettesStatus5->currentPage()."",
                                        'active' => 1,
                                        'titleEntree' => "".$titleEntree."",
                                        'timeEntree' => "".$timeEntree."",
                                        'prixEntree' => "".$prixEntree."",
                                        'lowCalEntree' => "".$lowCalEntree."",
                                        'cateAlimentEntree' => "".$cateAlimentEntree."",
                                        'countryEntree' => "".$countryEntree."",
                                        'titlePlats' => "".$titlePlats."",
                                        'timePlats' => "".$timePlat."",
                                        'prixPlats' => "".$prixPlat."",
                                        'lowCalPlats' => "".$lowCalPlats."",
                                        'cateAlimentPlats' => "".$cateAlimentPlats."",
                                        'countryPlats' => "".$countryPlats."",
                                        'titleDesserts' => "".$titleDesserts."",
                                        'timeDesserts' => "".$timeDessert."",
                                        'prixDesserts' => "".$prixDessert."",
                                         'lowCalDesserts' => "".$lowCalDesserts."",
                                        'cateAlimentDesserts' => "".$cateAlimentDesserts."",
                                        'countryDesserts' => "".$countryDesserts."",
                                        'titleBoissons' => "".$titleBoissons."",
                                        'timeBoissons' => "".$timeBoisson."",
                                        'prixBoissons' => "".$prixBoisson."",
                                        'lowCalBoissons' => "".$lowCalBoissons."",
                                        'cateAlimentBoissons' => "".$cateAlimentBoissons."",
                                        'countryBoissons' => "".$countryBoissons."",
                                        'titlePatisseries' => "".$titlePatisseries."",
                                        'timePatisseries' => "".$timePatisserie."",
                                        'prixPatisseries' => "".$prixPatisserie."",
                                         'lowCalPatisseries' => "".$lowCalPatisseries."",
                                        'cateAlimentPatisseries' => "".$cateAlimentPatisseries."",
                                        'countryPatisseries' => "".$countryPatisseries.""
                                                                     ])->links()}}
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane @if($active == 2 ) active  @endif" id="profile">
                                        <div class="">
                                            <div class="" role="tab" id="headingTwo">
                                                    {!! Form::open(array(
                                                       'url' => '/recettes/filter2?recettesStatus3='.$recettesStatus3->currentPage().'&recettesStatus2=1&recettesStatus4='.$recettesStatus4->currentPage().'&recettesStatus1='.$recettesStatus1->currentPage().'&recettesStatus5='.$recettesStatus5->currentPage(),
                                                           'method' => 'POST',
                                                           'name' => 'second'
                                                        )) !!}
                                                {{ Form::hidden('mode', '2') }}
                                                {{ Form::hidden('titleEntree', $titleEntree) }}
                                                {{ Form::hidden('lowCalEntree', $lowCalEntree) }}
                                                {{ Form::hidden('cateAlimentEntree', $cateAlimentEntree) }}
                                                {{ Form::hidden('countryEntree', $countryEntree) }}
                                                {{ Form::hidden('titlePlats', $titlePlats) }}
                                                {{ Form::hidden('lowCalPlats', $lowCalPlats) }}
                                                {{ Form::hidden('cateAlimentPlats', $cateAlimentPlats) }}
                                                {{ Form::hidden('countryPlats', $countryPlats) }}
                                                {{ Form::hidden('titleBoissons', $titleBoissons) }}
                                                {{ Form::hidden('lowCalBoissons', $lowCalBoissons) }}
                                                {{ Form::hidden('cateAlimentBoissons', $cateAlimentBoissons) }}
                                                {{ Form::hidden('countryBoissons', $countryBoissons) }}
                                                {{ Form::hidden('titleDesserts', $titleDesserts) }}
                                                {{ Form::hidden('lowCalDesserts', $lowCalDesserts) }}
                                                {{ Form::hidden('cateAlimentDesserts', $cateAlimentDesserts) }}
                                                {{ Form::hidden('countryDesserts', $countryDesserts) }}
                                                {{ Form::hidden('titlePatisseries', $titlePatisseries) }}
                                                {{ Form::hidden('lowCalPatisseries', $lowCalPatisseries) }}
                                                {{ Form::hidden('cateAlimentPatisseries', $cateAlimentPatisseries) }}
                                                {{ Form::hidden('countryPatisseries', $countryPatisseries) }}
                                                <div class="clearfix"></div>
                                                <div class="input-group col-md-10 col-md-offset-1">
                                                        {!!  Form::text('title', $titlePlats , ['class' => 'form-control','id' => 'searchPlats','placeholder' => 'Search']) !!}
                                                    <span onclick="second.submit()" class="input-group-addon" id=""><i class="fa fa-search"></i></span>
                                                </div>
                                                <div class="clearfix"></div>
                                                    <h4 class="panel-title">
                                                        <a class="collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            <p class="text-center">Plus de critères ></p>
                                                        </a>
                                                    </h4>
                                                <div class="clearfix"></div>
                                            <div id="collapseTwo" class="panel-collapse collapse col-md-10 col-md-offset-1" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="">
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            {!! Form::label('LowCal', 'LowCal') !!}
                                                            <div class="form-group">
                                                                {{ Form::checkbox('LowCal',true ,false , ['class' => 'form-control']) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            {!! Form::label('Time', 'Time (Minutes)') !!}
                                                            <div class="form-group">
                                                                {!! Form::select('Time', array(
                                                              null =>'No limit'  ,
                                                              '1'  =>'0/5'  ,
                                                               '2' =>'5/10'  ,
                                                                '3'=>'10/15'  ,
                                                                '4'=>'15/30'  ,
                                                                '5'=>'30/1h'  ,
                                                                 '6'  => '1h+'
                                                              ),null,['class' => 'form-control']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            {!! Form::label('Country', 'Country') !!}
                                                            <div class="form-group">
                                                                {{ Form::select('country_id',$country, old('content') , ['class' => 'form-control']) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            {!! Form::label('cateAliment', 'cateAliment') !!}
                                                            <div class="form-group">
                                                                {{ Form::select("cateAliment", $cateAliments2,  old('content')  , ['class' => 'form-control']) }}
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                {!! Form::submit('Envoyer',['class' => 'btn btn-primary center-block']) !!}
                                            </div>
                                                <div class="clearfix"></div>
                                            {!! Form::close() !!}
                                        </div>
                                        </div>
                                        <div class="">
                                            <div class="clearfix"></div>
                                            <h4 data-toggle="collapse" href="#sidebar2" class="filter panel-heading" aria-expanded="true" aria-controls="sidebar2">Filtres +</h4>
                                            <div class="left-bar col-sm-2 col-xs-12">
                                                <div class="collapse in" id="sidebar2">
                                                    <h4 class="text-center">Temps</h4>
                                                    {!! Form::open(array(
                                                              'url' => '/recettes/filter2?recettesStatus3='.$recettesStatus3->currentPage().'&recettesStatus2=1&recettesStatus4='.$recettesStatus4->currentPage().'&recettesStatus1='.$recettesStatus1->currentPage().'&recettesStatus5='.$recettesStatus5->currentPage(),
                                                              'method' => 'POST',
                                                              'id' => 'form2'
                                                           )) !!}
                                                    <input name='lowCalEntree' value=" {{$lowCalEntree}}" hidden>
                                                    {{ csrf_field() }}
                                                    <input type="text" name="titleEntree" id="titleEntree" value="{{$titleEntree}}" hidden>
                                                    <input name='cateAlimentEntree' value=" {{$cateAlimentEntree}}" hidden>
                                                    <input name='countryEntree' value=" {{$countryEntree}}" hidden>
                                                    <input name='timeEntree' value=" {{$timeEntree}}" hidden>
                                                    <input name='prixEntree' value=" {{$prixEntree}}" hidden>
                                                    <input name='ingredientEntree' value=" {{$ingredientEntree}}" hidden>
                                                    <input name='titlePlats' value=" {{$titlePlats}}" hidden>
                                                    <input name='lowCalPlats' value=" {{$lowCalPlats}}" hidden>
                                                    <input name='cateAlimentPlats' value=" {{$cateAlimentPlats}}" hidden>
                                                    <input name='countryPlats' value=" {{$countryPlats}}" hidden>
                                                    <input name='timePlats' value=" {{$timePlat}}" hidden>
                                                    <input name='prixPlats' value=" {{$prixPlat}}" hidden>
                                                    <input name='ingredientPlats' value=" {{$ingredientPlat}}" hidden>
                                                    <input name='titleBoissons' value=" {{$titleBoissons}}" hidden>
                                                    <input name='lowCalBoissons' value=" {{$lowCalBoissons}}" hidden>
                                                    <input name='cateAlimentBoissons' value=" {{$cateAlimentBoissons}}" hidden>
                                                    <input name='countryBoissons' value=" {{$countryBoissons}}" hidden>
                                                    <input name='timeBoissons' value=" {{$timeBoisson}}" hidden>
                                                    <input name='prixBoissons' value=" {{$prixBoisson}}" hidden>
                                                    <input name='ingredientBoissons' value=" {{$ingredientBoisson}}" hidden>
                                                    <input name='titleDesserts' value=" {{$titleDesserts}}" hidden>
                                                    <input name='lowCalDesserts' value=" {{$lowCalDesserts}}" hidden>
                                                    <input name='cateAlimentDesserts' value=" {{$cateAlimentDesserts}}" hidden>
                                                    <input name='countryDesserts' value=" {{$countryDesserts}}" hidden>
                                                    <input name='timeDesserts' value=" {{$timeDessert}}" hidden>
                                                    <input name='prixDesserts' value=" {{$prixDessert}}" hidden>
                                                    <input name='ingredientDesserts' value=" {{$ingredientDessert}}" hidden>
                                                    <input name='titlePatisseries' value=" {{$titlePatisseries}}" hidden>
                                                    <input name='lowCalPatisseries' value=" {{$lowCalPatisseries}}" hidden>
                                                    <input name='cateAlimentPatisseries' value=" {{$cateAlimentPatisseries}}" hidden>
                                                    <input name='countryPatisseries' value=" {{$countryPatisseries}}" hidden>
                                                    <input name='timePatisseries' value=" {{$timePatisserie}}" hidden>
                                                    <input name='prixPatisseries' value=" {{$prixPatisserie}}" hidden>
                                                    <input name='ingredientPatisseries' value=" {{$ingredientPatisserie}}" hidden>
                                                    <input type="text" name="time" id="time" value="" hidden>
                                                    <input type="text" name="ingredient" id="ingredient" value="" hidden>
                                                    <input type="text" name="prix" id="prix" value="" hidden>
                                                    <input type="text" name="mode" id="mode" value="" hidden>
                                                    {{ Form::close() }}
                                                    <button class="btn form-control center-block @if($timePlat != null && $timePlat == 1) btn-success @endif" onclick="time(this)" data-id="2" data-time="1">- de 20 min >></button>
                                                    <button class="btn form-control center-block @if($timePlat != null && $timePlat == 2) btn-success @endif" onclick="time(this)" data-id="2" data-time="2">- de 60 min >></button>
                                                    <button class="btn form-control center-block @if($timePlat != null && $timePlat == 3) btn-success @endif" onclick="time(this)" data-id="2" data-time="3">+ de 60 min >></button>
                                                    <br>
                                                    <h4 class="text-center">Prix</h4>
                                                    <button class="btn form-control center-block @if($prixPlat != null && $prixPlat == 5)btn-success @endif" onclick="prix(this)" data-id="2" data-prix="@if($prixPlat != null && $prixPlat == 5) 5000000000 @else 5 @endif ">Pas cher >></button>
                                                    <h4 class="text-center">Ingrédients</h4>
                                                    <?php $arr = array();
                                                    ?>
                                                    @foreach ($recettesStatus2count as $recette)
                                                        <?php $aliments = $recette->aliments ?>
                                                        @if(count($aliments)> 0)
                                                            @foreach($aliments as $a)
                                                                <?php $isIn = false; ?>
                                                                @foreach($arr as $key => $ar)
                                                                    <?php
                                                                    if($a->ingredient->name == $ar[0]['name']){
                                                                        $isIn = true;
                                                                        $arr[$key][0]['nb'] = $ar[0]['nb'] + 1;
                                                                    } ?>
                                                                @endforeach
                                                                <?php
                                                                if($isIn == false){
                                                                    $arr[] = array(
                                                                            [
                                                                                    'name' => "".$a->ingredient->name."",
                                                                                    'nb' => 1,
                                                                                    'ingredient_id' => "".$a->ingredient->id.""
                                                                            ]
                                                                    )
                                                                    ;
                                                                }
                                                                ?>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    @foreach($arr as $key => $ar)
                                                        <button class="btn form-control center-block  @if(isset($ingredientPlat) && $ar[0]['ingredient_id'] == $ingredientPlat) btn-success @endif" onclick="ingredient(this)" data-id="2" data-ingredient="@if( isset($ingredientPlat) && $ar[0]['ingredient_id'] == $ingredientPlat) 0 @else{{$ar[0]['ingredient_id']}}@endif">{{$ar[0]['name']}} ({{$ar[0]['nb']}})</button>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                @if(isset($titlePlats) && $titlePlats != null)
                                                    <h3 class="text-center">{{count($recettesStatus2count)}} résultat<?php if(count($recettesStatus2count) > 1){echo's';} ?> pour : {{$titlePlats}}</h3>
                                                @endif
                                        @foreach ($recettesStatus2 as $recette)
                                            <div class="col-md-12">
                                                <a href="{{  e(url('/recettes/'.$recette->id)) }}" class="text-center"><h2>{{$recette->title}}</h2></a>
                                                <div class="col-md-6">
                                                    <div role="tabpanel" class="tab-pane " id="home">
                                                        <div class="clearfix"></div>

                                                        <iframe width="100%" style="min-height:270px"   src="{!! $recette->iframe !!}" frameborder="0" allowfullscreen></iframe>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><i class="fa fa-clock-o"></i> {{$recette->time}} minutes</p>

                                                        {{$recette->toKnow}}
                                                        <div class="clearfix"></div>
                                                        {{$recette->grade}}
                                                    </div>
                                            </div>
                                        @endforeach
                                                    </div>
                                                    </div>
                                        <div class="text-center center-block col-md-12">
                                        {{ $recettesStatus2->
                                        appends([
                                        'recettesStatus3' => $recettesStatus3->currentPage(),
                                        'recettesStatus1' => $recettesStatus1->currentPage(),
                                        'recettesStatus4' => $recettesStatus4->currentPage(),
                                        'recettesStatus5' => $recettesStatus5->currentPage(),
                                        'active' => 2,

                                        'titleEntree' => "".$titleEntree."",
                                                    'timeEntre' => "".$timeEntree."",
                                                    'ingredientEntree' => "".$ingredientEntree."",
                                                    'prixEntree' => "".$prixEntree."",
                                                    'lowCalEntree' => "".$lowCalEntree."",
                                                    'cateAlimentEntree' => "".$cateAlimentEntree."",
                                                    'countryEntree' => "".$countryEntree."",
                                                    'titlePlats' => "".$titlePlats."",
                                                    'timePlat' => "".$timePlat."",
                                                    'ingredientPlat' => "".$ingredientPlat."",
                                                    'prixPlat' => "".$prixPlat."",
                                                    'lowCalPlats' => "".$lowCalPlats."",
                                                    'cateAlimentPlats' => "".$cateAlimentPlats."",
                                                    'countryPlats' => "".$countryPlats."",
                                                    'titleDesserts' => "".$titleDesserts."",
                                                    'timeDessert' => "".$timeDessert."",
                                                    'ingredientDessert' => "".$ingredientDessert."",
                                                    'prixDessert' => "".$prixDessert."",
                                                    'lowCalDesserts' => "".$lowCalDesserts."",
                                                    'cateAlimentDesserts' => "".$cateAlimentDesserts."",
                                                    'countryDesserts' => "".$countryDesserts."",
                                                    'titleBoissons' => "".$titleBoissons."",
                                                    'timeBoisson' => "".$timeBoisson."",
                                                    'ingredientBoisson' => "".$ingredientBoisson."",
                                                    'prixBoisson' => "".$prixBoisson."",
                                                    'lowCalBoissons' => "".$lowCalBoissons."",
                                                    'cateAlimentBoissons' => "".$cateAlimentBoissons."",
                                                    'countryBoissons' => "".$countryBoissons."",
                                                    'titlePatisseries' => "".$titlePatisseries."",
                                                    'timePatisserie' => "".$timePatisserie."",
                                                    'ingredientPatisserie' => "".$ingredientPatisserie."",
                                                    'prixPatisserie' => "".$prixPatisserie."",
                                                    'lowCalPatisseries' => "".$lowCalPatisseries."",
                                                    'cateAlimentPatisseries' => "".$cateAlimentPatisseries."",
                                                    'countryPatisseries' => "".$countryPatisseries.""
                                       ])->
                                        links()}}
                                    </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane @if($active == 3 ) active @endif" id="messages">
                                        <div class="">
                                            <div class="" role="tab" id="headingTwo">
                                                {!! Form::open(array(
                                                   'url' => '/recettes/filter3?recettesStatus3=1&recettesStatus2='.$recettesStatus2->currentPage().'&recettesStatus4='.$recettesStatus4->currentPage().'&recettesStatus1='.$recettesStatus1->currentPage().'&recettesStatus5='.$recettesStatus5->currentPage(),
                                                       'method' => 'POST',
                                                       'name' => 'third'
                                                    )) !!}
                                                {{ Form::hidden('mode', '3') }}
                                                {{ Form::hidden('titleEntree', $titleEntree) }}
                                                {{ Form::hidden('lowCalEntree', $lowCalEntree) }}
                                                {{ Form::hidden('cateAlimentEntree', $cateAlimentEntree) }}
                                                {{ Form::hidden('countryEntree', $countryEntree) }}
                                                {{ Form::hidden('titlePlats', $titlePlats) }}
                                                {{ Form::hidden('lowCalPlats', $lowCalPlats) }}
                                                {{ Form::hidden('cateAlimentPlats', $cateAlimentPlats) }}
                                                {{ Form::hidden('countryPlats', $countryPlats) }}
                                                {{ Form::hidden('titleBoissons', $titleBoissons) }}
                                                {{ Form::hidden('lowCalBoissons', $lowCalBoissons) }}
                                                {{ Form::hidden('cateAlimentBoissons', $cateAlimentBoissons) }}
                                                {{ Form::hidden('countryBoissons', $countryBoissons) }}
                                                {{ Form::hidden('titleDesserts', $titleDesserts) }}
                                                {{ Form::hidden('lowCalDesserts', $lowCalDesserts) }}
                                                {{ Form::hidden('cateAlimentDesserts', $cateAlimentDesserts) }}
                                                {{ Form::hidden('countryDesserts', $countryDesserts) }}
                                                {{ Form::hidden('titlePatisseries', $titlePatisseries) }}
                                                {{ Form::hidden('lowCalPatisseries', $lowCalPatisseries) }}
                                                {{ Form::hidden('cateAlimentPatisseries', $cateAlimentPatisseries) }}
                                                {{ Form::hidden('countryPatisseries', $countryPatisseries) }}
                                                <div class="clearfix"></div>
                                                <div class="input-group col-md-10 col-md-offset-1">
                                                    {!!  Form::text('title', $titleDesserts , ['class' => 'form-control','id' => 'searchDesserts','placeholder' => 'Search']) !!}
                                                    <span onclick="third.submit()" class="input-group-addon" id=""><i class="fa fa-search"></i></span>
                                                </div>
                                                <div class="clearfix"></div>
                                                <h4 class="panel-title">
                                                    <a class="collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTree" aria-expanded="false" aria-controls="collapseTree">
                                                        <p class="text-center">Plus de critères ></p>
                                                    </a>
                                                </h4>
                                                <div class="clearfix"></div>
                                            <div id="collapseTree" class="panel-collapse collapse col-md-10 col-md-offset-1" role="tabpanel" aria-labelledby="headingTree">
                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            {!! Form::label('LowCal', 'LowCal') !!}
                                                            <div class="form-group">
                                                                {{ Form::checkbox('LowCal',true ,false , ['class' => 'form-control']) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            {!! Form::label('Time', 'Time (Minutes)') !!}
                                                            <div class="form-group">
                                                                {!! Form::select('Time', array(
                                                              null =>'No limit'  ,
                                                              '1'  =>'0/5'  ,
                                                               '2' =>'5/10'  ,
                                                                '3'=>'10/15'  ,
                                                                '4'=>'15/30'  ,
                                                                '5'=>'30/1h'  ,
                                                                 '6'  => '1h+'
                                                              ),null,['class' => 'form-control']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            {!! Form::label('Country', 'Country') !!}
                                                            <div class="form-group">
                                                                {{ Form::select('country_id',$country, old('content') , ['class' => 'form-control']) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            {!! Form::label('cateAliment', 'cateAliment') !!}
                                                            <div class="form-group">
                                                                {{ Form::select("cateAliment", $cateAliments3,  old('content')  , ['class' => 'form-control']) }}
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                {!! Form::submit('Envoyer',['class' => 'btn btn-primary center-block']) !!}
                                            </div>
                                           <div class="clearfix"></div>
                                            {!! Form::close() !!}
                                            </div>
                                            </div>
                                        <div class="">
                                            <div class="clearfix"></div>
                                            <h4 data-toggle="collapse" href="#sidebar3" class="filter panel-heading" aria-expanded="true" aria-controls="sidebar3">Filtres +</h4>
                                            <div class="left-bar col-sm-2 col-xs-12">
                                                <div class="collapse in" id="sidebar3">
                                                    <h4 class="text-center">Temps</h4>
                                                    {!! Form::open(array(
                                                              'url' => '/recettes/filter3?recettesStatus3=1&recettesStatus2='.$recettesStatus2->currentPage().'&recettesStatus4='.$recettesStatus4->currentPage().'&recettesStatus1='.$recettesStatus1->currentPage().'&recettesStatus5='.$recettesStatus5->currentPage(),
                                                              'method' => 'POST',
                                                              'id' => 'form3'
                                                           )) !!}
                                                    <input name='lowCalEntree' value=" {{$lowCalEntree}}" hidden>
                                                    {{ csrf_field() }}
                                                    <input type="text" name="titleEntree" id="titleEntree" value="{{$titleEntree}}" hidden>
                                                    <input name='cateAlimentEntree' value=" {{$cateAlimentEntree}}" hidden>
                                                    <input name='countryEntree' value=" {{$countryEntree}}" hidden>
                                                    <input name='timeEntree' value=" {{$timeEntree}}" hidden>
                                                    <input name='prixEntree' value=" {{$prixEntree}}" hidden>
                                                    <input name='ingredientEntree' value=" {{$ingredientEntree}}" hidden>
                                                    <input name='titlePlats' value=" {{$titlePlats}}" hidden>
                                                    <input name='lowCalPlats' value=" {{$lowCalPlats}}" hidden>
                                                    <input name='cateAlimentPlats' value=" {{$cateAlimentPlats}}" hidden>
                                                    <input name='countryPlats' value=" {{$countryPlats}}" hidden>
                                                    <input name='timePlats' value=" {{$timePlat}}" hidden>
                                                    <input name='prixPlats' value=" {{$prixPlat}}" hidden>
                                                    <input name='ingredientPlats' value=" {{$ingredientPlat}}" hidden>
                                                    <input name='titleBoissons' value=" {{$titleBoissons}}" hidden>
                                                    <input name='lowCalBoissons' value=" {{$lowCalBoissons}}" hidden>
                                                    <input name='cateAlimentBoissons' value=" {{$cateAlimentBoissons}}" hidden>
                                                    <input name='countryBoissons' value=" {{$countryBoissons}}" hidden>
                                                    <input name='timeBoissons' value=" {{$timeBoisson}}" hidden>
                                                    <input name='prixBoissons' value=" {{$prixBoisson}}" hidden>
                                                    <input name='ingredientBoissons' value=" {{$ingredientBoisson}}" hidden>
                                                    <input name='titleDesserts' value=" {{$titleDesserts}}" hidden>
                                                    <input name='lowCalDesserts' value=" {{$lowCalDesserts}}" hidden>
                                                    <input name='cateAlimentDesserts' value=" {{$cateAlimentDesserts}}" hidden>
                                                    <input name='countryDesserts' value=" {{$countryDesserts}}" hidden>
                                                    <input name='timeDesserts' value=" {{$timeDessert}}" hidden>
                                                    <input name='prixDesserts' value=" {{$prixDessert}}" hidden>
                                                    <input name='ingredientDesserts' value=" {{$ingredientDessert}}" hidden>
                                                    <input name='titlePatisseries' value=" {{$titlePatisseries}}" hidden>
                                                    <input name='lowCalPatisseries' value=" {{$lowCalPatisseries}}" hidden>
                                                    <input name='cateAlimentPatisseries' value=" {{$cateAlimentPatisseries}}" hidden>
                                                    <input name='countryPatisseries' value=" {{$countryPatisseries}}" hidden>
                                                    <input name='timePatisseries' value=" {{$timePatisserie}}" hidden>
                                                    <input name='prixPatisseries' value=" {{$prixPatisserie}}" hidden>
                                                    <input name='ingredientPatisseries' value=" {{$ingredientPatisserie}}" hidden>
                                                    <input type="text" name="time" id="time" value="" hidden>
                                                    <input type="text" name="ingredient" id="ingredient" value="" hidden>
                                                    <input type="text" name="prix" id="prix" value="" hidden>
                                                    <input type="text" name="mode" id="mode" value="" hidden>
                                                    {{ Form::close() }}
                                                    <button class="btn form-control center-block @if($timeDessert != null && $timeDessert == 1) btn-success @endif" onclick="time(this)" data-id="3" data-time="1">- de 20 min >></button>
                                                    <button class="btn form-control center-block @if($timeDessert != null && $timeDessert == 2) btn-success @endif" onclick="time(this)" data-id="3" data-time="2">- de 60 min >></button>
                                                    <button class="btn form-control center-block @if($timeDessert != null && $timeDessert == 3) btn-success @endif" onclick="time(this)" data-id="3" data-time="3">+ de 60 min >></button>
                                                    <br>
                                                    <h4 class="text-center">Prix</h4>
                                                    <button class="btn form-control center-block @if($prixDessert != null && $prixDessert == 5)btn-success @endif" onclick="prix(this)" data-id="3" data-prix="@if($prixDessert != null && $prixDessert == 5) 5000000000 @else 5 @endif ">Pas cher >></button>
                                                    <h4 class="text-center">Ingrédients</h4>
                                                    <?php $arr = array();
                                                    ?>
                                                    @foreach ($recettesStatus3count as $recette)
                                                        <?php $aliments = $recette->aliments ?>
                                                        @if(count($aliments)> 0)
                                                            @foreach($aliments as $a)
                                                                <?php $isIn = false; ?>
                                                                @foreach($arr as $key => $ar)
                                                                    <?php
                                                                    if($a->ingredient->name == $ar[0]['name']){
                                                                        $isIn = true;
                                                                        $arr[$key][0]['nb'] = $ar[0]['nb'] + 1;
                                                                    } ?>
                                                                @endforeach
                                                                <?php
                                                                if($isIn == false){
                                                                    $arr[] = array(
                                                                            [
                                                                                    'name' => "".$a->ingredient->name."",
                                                                                    'nb' => 1,
                                                                                    'ingredient_id' => "".$a->ingredient->id.""
                                                                            ]
                                                                    )
                                                                    ;
                                                                }
                                                                ?>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    @foreach($arr as $key => $ar)
                                                        <button class="btn form-control center-block  @if(isset($ingredientDessert) && $ar[0]['ingredient_id'] == $ingredientDessert) btn-success @endif" onclick="ingredient(this)" data-id="3" data-ingredient="@if( isset($ingredientDessert) && $ar[0]['ingredient_id'] == $ingredientDessert) 0 @else{{$ar[0]['ingredient_id']}}@endif">{{$ar[0]['name']}} ({{$ar[0]['nb']}})</button>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                @if(isset($titleDesserts) && $titleDesserts != null)
                                                    <h3 class="text-center">{{count($recettesStatus3count)}} résultat<?php if(count($recettesStatus3count) > 1){echo 's';}?> pour : {{$titleDesserts}}</h3>
                                                @endif
                                                @foreach ($recettesStatus3 as $recette)
                                            <div class="col-md-12">
                                                <a href="{{  e(url('/recettes/'.$recette->id)) }}" class="text-center"><h2>{{$recette->title}}</h2></a>
                                                <div class="col-md-6">
                                                    <div role="tabpanel" class="tab-pane " id="home">
                                                        <div class="clearfix"></div>
                                                        <iframe width="100%" style="min-height:270px"   src="{!! $recette->iframe !!}" frameborder="0" allowfullscreen></iframe>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{$recette->toKnow}}
                                                        <div class="clearfix"></div>
                                                        {{$recette->grade}}
                                                    </div>
                                            </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="text-center center-block col-md-12">

                                        {!!$recettesStatus3->appends([
                                                'recettesStatus2' => $recettesStatus2->currentPage(),
                                                'recettesStatus1' => $recettesStatus1->currentPage(),
                                                'recettesStatus4' => $recettesStatus4->currentPage(),
                                                'recettesStatus5' => $recettesStatus5->currentPage(),
                                                'active' => 3,
                                                'titleEntree' => "".$titleEntree."",
                                                    'timeEntre' => "".$timeEntree."",
                                                    'ingredientEntree' => "".$ingredientEntree."",
                                                    'prixEntree' => "".$prixEntree."",
                                                    'lowCalEntree' => "".$lowCalEntree."",
                                                    'cateAlimentEntree' => "".$cateAlimentEntree."",
                                                    'countryEntree' => "".$countryEntree."",
                                                    'titlePlats' => "".$titlePlats."",
                                                    'timePlat' => "".$timePlat."",
                                                    'ingredientPlat' => "".$ingredientPlat."",
                                                    'prixPlat' => "".$prixPlat."",
                                                    'lowCalPlats' => "".$lowCalPlats."",
                                                    'cateAlimentPlats' => "".$cateAlimentPlats."",
                                                    'countryPlats' => "".$countryPlats."",
                                                    'titleDesserts' => "".$titleDesserts."",
                                                    'timeDessert' => "".$timeDessert."",
                                                    'ingredientDessert' => "".$ingredientDessert."",
                                                    'prixDessert' => "".$prixDessert."",
                                                    'lowCalDesserts' => "".$lowCalDesserts."",
                                                    'cateAlimentDesserts' => "".$cateAlimentDesserts."",
                                                    'countryDesserts' => "".$countryDesserts."",
                                                    'titleBoissons' => "".$titleBoissons."",
                                                    'timeBoisson' => "".$timeBoisson."",
                                                    'ingredientBoisson' => "".$ingredientBoisson."",
                                                    'prixBoisson' => "".$prixBoisson."",
                                                    'lowCalBoissons' => "".$lowCalBoissons."",
                                                    'cateAlimentBoissons' => "".$cateAlimentBoissons."",
                                                    'countryBoissons' => "".$countryBoissons."",
                                                    'titlePatisseries' => "".$titlePatisseries."",
                                                    'timePatisserie' => "".$timePatisserie."",
                                                    'ingredientPatisserie' => "".$ingredientPatisserie."",
                                                    'prixPatisserie' => "".$prixPatisserie."",
                                                    'lowCalPatisseries' => "".$lowCalPatisseries."",
                                                    'cateAlimentPatisseries' => "".$cateAlimentPatisseries."",
                                                    'countryPatisseries' => "".$countryPatisseries.""

                                                ])->render()!!}
                                        </div>
                                        </div>
                                    <div role="tabpanel" class="tab-pane @if($active == 4) active @endif" id="settings">
                                        <div class="">
                                            <div class="" role="tab" id="headingTwo">
                                                {!! Form::open(array(
                                                   'url' => '/recettes/filter4?recettesStatus3='.$recettesStatus3->currentPage().'&recettesStatus2='.$recettesStatus2->currentPage().'&recettesStatus4=1&recettesStatus1='.$recettesStatus1->currentPage().'&recettesStatus5='.$recettesStatus5->currentPage() ,
                                                   'method' => 'POST',
                                                   'name' => 'fourth'
                                                               )) !!}
                                                {{ Form::hidden('mode', '4') }}
                                                {{ Form::hidden('titleEntree', $titleEntree) }}
                                                {{ Form::hidden('lowCalEntree', $lowCalEntree) }}
                                                {{ Form::hidden('cateAlimentEntree', $cateAlimentEntree) }}
                                                {{ Form::hidden('countryEntree', $countryEntree) }}
                                                {{ Form::hidden('titlePlats', $titlePlats) }}
                                                {{ Form::hidden('lowCalPlats', $lowCalPlats) }}
                                                {{ Form::hidden('cateAlimentPlats', $cateAlimentPlats) }}
                                                {{ Form::hidden('countryPlats', $countryPlats) }}
                                                {{ Form::hidden('titleBoissons', $titleBoissons) }}
                                                {{ Form::hidden('lowCalBoissons', $lowCalBoissons) }}
                                                {{ Form::hidden('cateAlimentBoissons', $cateAlimentBoissons) }}
                                                {{ Form::hidden('countryBoissons', $countryBoissons) }}
                                                {{ Form::hidden('titleDesserts', $titleDesserts) }}
                                                {{ Form::hidden('lowCalDesserts', $lowCalDesserts) }}
                                                {{ Form::hidden('cateAlimentDesserts', $cateAlimentDesserts) }}
                                                {{ Form::hidden('countryDesserts', $countryDesserts) }}
                                                {{ Form::hidden('titlePatisseries', $titlePatisseries) }}
                                                {{ Form::hidden('lowCalPatisseries', $lowCalPatisseries) }}
                                                {{ Form::hidden('cateAlimentPatisseries', $cateAlimentPatisseries) }}
                                                {{ Form::hidden('countryPatisseries', $countryPatisseries) }}
                                                <div class="clearfix"></div>
                                                <div class="input-group col-md-10 col-md-offset-1">
                                                    {!!  Form::text('title', $titleDesserts , ['class' => 'form-control','id' => 'searchDesserts','placeholder' => 'Search']) !!}
                                                    <span onclick="fourth.submit()" class="input-group-addon" id=""><i class="fa fa-search"></i></span>
                                                </div><div class="clearfix"></div>
                                                <h4 class="panel-title">
                                                    <a class="collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                        <p class="text-center">Plus de critères ></p>
                                                    </a>
                                                </h4>
                                                <div class="clearfix"></div>
                                            <div id="collapseFour" class="panel-collapse collapse col-md-10 col-md-offset-1" role="tabpanel" aria-labelledby="headingFour">
                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            {!! Form::label('LowCal', 'LowCal') !!}
                                                            <div class="form-group">
                                                                {{ Form::checkbox('LowCal',true ,false , ['class' => 'form-control']) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            {!! Form::label('Time', 'Time (Minutes)') !!}
                                                            <div class="form-group">
                                                                {{ Form::select('Time', array(
                                                              null =>'No limit'  ,
                                                              '1'  =>'0/5'  ,
                                                               '2' =>'5/10'  ,
                                                                '3'=>'10/15'  ,
                                                                '4'=>'15/30'  ,
                                                                '5'=>'30/1h'  ,
                                                                 '6'  => '1h+'
                                                              ),null,['class' => 'form-control']) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            {!! Form::label('Country', 'Country') !!}
                                                            <div class="form-group">
                                                                {{ Form::select('country_id',$country, old('content') , ['class' => 'form-control']) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            {!! Form::label('cateAliment', 'cateAliment') !!}
                                                            <div class="form-group">
                                                                {{ Form::select("cateAliment", $cateAliments4,  old('content')  , ['class' => 'form-control']) }}
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                {!! Form::submit('Envoyer',['class' => 'btn btn-primary center-block']) !!}
                                            </div>
                                            <div class="clearfix"></div>
                                            {!! Form::close() !!}
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="clearfix"></div>
                                            <h4 data-toggle="collapse" href="#sidebar4" class="filter panel-heading" aria-expanded="true" aria-controls="sidebar4">Filtres +</h4>
                                            <div class="left-bar col-sm-2 col-xs-12">
                                                <div class="collapse in" id="sidebar4">
                                                    <h4 class="text-center">Temps</h4>
                                                    {!! Form::open(array(
                                                              'url' => '/recettes/filter4?recettesStatus3='.$recettesStatus3->currentPage().'&recettesStatus2='.$recettesStatus2->currentPage().'&recettesStatus4=1&recettesStatus1='.$recettesStatus1->currentPage().'&recettesStatus5='.$recettesStatus5->currentPage() ,
                                                              'method' => 'POST',
                                                              'id' => 'form4'
                                                           )) !!}
                                                    <input name='lowCalEntree' value=" {{$lowCalEntree}}" hidden>
                                                    {{ csrf_field() }}
                                                    <input type="text" name="titleEntree" id="titleEntree" value="{{$titleEntree}}" hidden>
                                                    <input name='cateAlimentEntree' value=" {{$cateAlimentEntree}}" hidden>
                                                    <input name='countryEntree' value=" {{$countryEntree}}" hidden>
                                                    <input name='timeEntree' value=" {{$timeEntree}}" hidden>
                                                    <input name='prixEntree' value=" {{$prixEntree}}" hidden>
                                                    <input name='ingredientEntree' value=" {{$ingredientEntree}}" hidden>
                                                    <input name='titlePlats' value=" {{$titlePlats}}" hidden>
                                                    <input name='lowCalPlats' value=" {{$lowCalPlats}}" hidden>
                                                    <input name='cateAlimentPlats' value=" {{$cateAlimentPlats}}" hidden>
                                                    <input name='countryPlats' value=" {{$countryPlats}}" hidden>
                                                    <input name='timePlats' value=" {{$timePlat}}" hidden>
                                                    <input name='prixPlats' value=" {{$prixPlat}}" hidden>
                                                    <input name='ingredientPlats' value=" {{$ingredientPlat}}" hidden>
                                                    <input name='titleBoissons' value=" {{$titleBoissons}}" hidden>
                                                    <input name='lowCalBoissons' value=" {{$lowCalBoissons}}" hidden>
                                                    <input name='cateAlimentBoissons' value=" {{$cateAlimentBoissons}}" hidden>
                                                    <input name='countryBoissons' value=" {{$countryBoissons}}" hidden>
                                                    <input name='timeBoissons' value=" {{$timeBoisson}}" hidden>
                                                    <input name='prixBoissons' value=" {{$prixBoisson}}" hidden>
                                                    <input name='ingredientBoissons' value=" {{$ingredientBoisson}}" hidden>
                                                    <input name='titleDesserts' value=" {{$titleDesserts}}" hidden>
                                                    <input name='lowCalDesserts' value=" {{$lowCalDesserts}}" hidden>
                                                    <input name='cateAlimentDesserts' value=" {{$cateAlimentDesserts}}" hidden>
                                                    <input name='countryDesserts' value=" {{$countryDesserts}}" hidden>
                                                    <input name='timeDesserts' value=" {{$timeDessert}}" hidden>
                                                    <input name='prixDesserts' value=" {{$prixDessert}}" hidden>
                                                    <input name='ingredientDesserts' value=" {{$ingredientDessert}}" hidden>
                                                    <input name='titlePatisseries' value=" {{$titlePatisseries}}" hidden>
                                                    <input name='lowCalPatisseries' value=" {{$lowCalPatisseries}}" hidden>
                                                    <input name='cateAlimentPatisseries' value=" {{$cateAlimentPatisseries}}" hidden>
                                                    <input name='countryPatisseries' value=" {{$countryPatisseries}}" hidden>
                                                    <input name='timePatisseries' value=" {{$timePatisserie}}" hidden>
                                                    <input name='prixPatisseries' value=" {{$prixPatisserie}}" hidden>
                                                    <input name='ingredientPatisseries' value=" {{$ingredientPatisserie}}" hidden>
                                                    <input type="text" name="time" id="time" value="" hidden>
                                                    <input type="text" name="ingredient" id="ingredient" value="" hidden>
                                                    <input type="text" name="prix" id="prix" value="" hidden>
                                                    <input type="text" name="mode" id="mode" value="" hidden>
                                                    {{ Form::close() }}
                                                    <button class="btn form-control center-block @if($timeBoisson != null && $timeBoisson == 1) btn-success @endif" onclick="time(this)" data-id="2" data-time="1">- de 20 min >></button>
                                                    <button class="btn form-control center-block @if($timeBoisson != null && $timeBoisson == 2) btn-success @endif" onclick="time(this)" data-id="2" data-time="2">- de 60 min >></button>
                                                    <button class="btn form-control center-block @if($timeBoisson != null && $timeBoisson == 3) btn-success @endif" onclick="time(this)" data-id="2" data-time="3">+ de 60 min >></button>
                                                    <br>
                                                    <h4 class="text-center">Prix</h4>
                                                    <button class="btn form-control center-block @if($prixBoisson != null && $prixBoisson == 5)btn-success @endif" onclick="prix(this)" data-id="2" data-prix="@if($prixBoisson != null && $prixBoisson == 5) 5000000000 @else 5 @endif ">Pas cher >></button>
                                                    <h4 class="text-center">Ingrédients</h4>
                                                    <?php $arr = array();
                                                    ?>
                                                    @foreach ($recettesStatus4count as $recette)
                                                        <?php $aliments = $recette->aliments ?>
                                                        @if(count($aliments)> 0)
                                                            @foreach($aliments as $a)
                                                                <?php $isIn = false; ?>
                                                                @foreach($arr as $key => $ar)
                                                                    <?php
                                                                    if($a->ingredient->name == $ar[0]['name']){
                                                                        $isIn = true;
                                                                        $arr[$key][0]['nb'] = $ar[0]['nb'] + 1;
                                                                    } ?>
                                                                @endforeach
                                                                <?php
                                                                if($isIn == false){
                                                                    $arr[] = array(
                                                                            [
                                                                                    'name' => "".$a->ingredient->name."",
                                                                                    'nb' => 1,
                                                                                    'ingredient_id' => "".$a->ingredient->id.""
                                                                            ]
                                                                    )
                                                                    ;
                                                                }
                                                                ?>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    @foreach($arr as $key => $ar)
                                                        <button class="btn form-control center-block  @if(isset($ingredientBoisson) && $ar[0]['ingredient_id'] == $ingredientBoisson) btn-success @endif" onclick="ingredient(this)" data-id="2" data-ingredient="@if( isset($ingredientBoisson) && $ar[0]['ingredient_id'] == $ingredientBoisson) 0 @else{{$ar[0]['ingredient_id']}}@endif">{{$ar[0]['name']}} ({{$ar[0]['nb']}})</button>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                @if(isset($titleBoissons) && $titleBoissons != null)
                                                    <h3 class="text-center">{{count($recettesStatus4count)}} résultat<?php if(count($recettesStatus4count) > 1){echo's';} ?> pour : {{$titleBoissons}}</h3>
                                                @endif
                                        @foreach ($recettesStatus4 as $recette)
                                                <div class="col-md-12">
                                                    <a href="{{  e(url('/recettes/'.$recette->id)) }}" class="text-center"><h2>{{$recette->title}}</h2></a>
                                                    <div class="col-md-6">
                                                    <div role="tabpanel" class="tab-pane " id="home">
                                                        <div class="clearfix"></div>

                                                        <iframe width="100%" style="min-height:270px"   src="{!! $recette->iframe !!}" frameborder="0" allowfullscreen></iframe>
                                                    </div>
                                                    </div>
                                                        <div class="col-md-6">
                                                            <p><i class="fa fa-clock-o"></i> {{$recette->time}} minutes</p>
                                                            {{$recette->toKnow}}
                                                            <div class="clearfix"></div>
                                                            {{$recette->grade}}
                                                        </div>
                                                </div>
                                                    @endforeach
                                                    </div>
                                                    </div>
                                        <div class="text-center center-block col-md-12">
                                        {!!     $recettesStatus4->appends([
                                                    'recettesStatus3' => $recettesStatus3->currentPage(),
                                                    'recettesStatus2' => $recettesStatus2->currentPage(),
                                                    'recettesStatus5' => $recettesStatus5->currentPage(),
                                                    'recettesStatus1' => $recettesStatus1->currentPage(),
                                                    'active' => 4,
                                                    'titleEntree' => "".$titleEntree."",
                                                    'timeEntre' => "".$timeEntree."",
                                                    'ingredientEntree' => "".$ingredientEntree."",
                                                    'prixEntree' => "".$prixEntree."",
                                                    'lowCalEntree' => "".$lowCalEntree."",
                                                    'cateAlimentEntree' => "".$cateAlimentEntree."",
                                                    'countryEntree' => "".$countryEntree."",
                                                    'titlePlats' => "".$titlePlats."",
                                                    'timePlat' => "".$timePlat."",
                                                    'ingredientPlat' => "".$ingredientPlat."",
                                                    'prixPlat' => "".$prixPlat."",
                                                    'lowCalPlats' => "".$lowCalPlats."",
                                                    'cateAlimentPlats' => "".$cateAlimentPlats."",
                                                    'countryPlats' => "".$countryPlats."",
                                                    'titleDesserts' => "".$titleDesserts."",
                                                    'timeDessert' => "".$timeDessert."",
                                                    'ingredientDessert' => "".$ingredientDessert."",
                                                    'prixDessert' => "".$prixDessert."",
                                                    'lowCalDesserts' => "".$lowCalDesserts."",
                                                    'cateAlimentDesserts' => "".$cateAlimentDesserts."",
                                                    'countryDesserts' => "".$countryDesserts."",
                                                    'titleBoissons' => "".$titleBoissons."",
                                                    'timeBoisson' => "".$timeBoisson."",
                                                    'ingredientBoisson' => "".$ingredientBoisson."",
                                                    'prixBoisson' => "".$prixBoisson."",
                                                    'lowCalBoissons' => "".$lowCalBoissons."",
                                                    'cateAlimentBoissons' => "".$cateAlimentBoissons."",
                                                    'countryBoissons' => "".$countryBoissons."",
                                                    'titlePatisseries' => "".$titlePatisseries."",
                                                    'timePatisserie' => "".$timePatisserie."",
                                                    'ingredientPatisserie' => "".$ingredientPatisserie."",
                                                    'prixPatisserie' => "".$prixPatisserie."",
                                                    'lowCalPatisseries' => "".$lowCalPatisseries."",
                                                    'cateAlimentPatisseries' => "".$cateAlimentPatisseries."",
                                                    'countryPatisseries' => "".$countryPatisseries.""
                                             ])->render()
                                             !!}
                                        </div>
                                        </div>
                                    <div role="tabpanel" class="tab-pane @if($active == 5) active @endif" id="patisseries">
                                        <div class="">
                                            <div class="" role="tab" id="headingTwo">
                                                {!! Form::open(array(
                                                   'url' => '/recettes/filter5?recettesStatus3='.$recettesStatus3->currentPage().'&recettesStatus2='.$recettesStatus2->currentPage().'&recettesStatus5=1&recettesStatus4='.$recettesStatus4->currentPage().'&recettesStatus1='.$recettesStatus1->currentPage(),
                                                   'method' => 'POST',
                                                   'name' => 'fith'
                                                               )) !!}
                                                {{ Form::hidden('mode', '5') }}
                                                {{ Form::hidden('titleEntree', $titleEntree) }}
                                                {{ Form::hidden('lowCalEntree', $lowCalEntree) }}
                                                {{ Form::hidden('cateAlimentEntree', $cateAlimentEntree) }}
                                                {{ Form::hidden('countryEntree', $countryEntree) }}
                                                {{ Form::hidden('titlePlats', $titlePlats) }}
                                                {{ Form::hidden('lowCalPlats', $lowCalPlats) }}
                                                {{ Form::hidden('cateAlimentPlats', $cateAlimentPlats) }}
                                                {{ Form::hidden('countryPlats', $countryPlats) }}
                                                {{ Form::hidden('titleBoissons', $titleBoissons) }}
                                                {{ Form::hidden('lowCalBoissons', $lowCalBoissons) }}
                                                {{ Form::hidden('cateAlimentBoissons', $cateAlimentBoissons) }}
                                                {{ Form::hidden('countryBoissons', $countryBoissons) }}
                                                {{ Form::hidden('titleDesserts', $titleDesserts) }}
                                                {{ Form::hidden('lowCalDesserts', $lowCalDesserts) }}
                                                {{ Form::hidden('cateAlimentDesserts', $cateAlimentDesserts) }}
                                                {{ Form::hidden('countryDesserts', $countryDesserts) }}
                                                {{ Form::hidden('titlePatisseries', $titlePatisseries) }}
                                                {{ Form::hidden('lowCalPatisseries', $lowCalPatisseries) }}
                                                {{ Form::hidden('cateAlimentPatisseries', $cateAlimentPatisseries) }}
                                                {{ Form::hidden('countryPatisseries', $countryPatisseries) }}
                                                <div class="clearfix"></div>
                                                <div class="input-group col-md-10 col-md-offset-1">
                                                    {!!  Form::text('title', $titleBoissons , ['class' => 'form-control','id' => 'searchPatisseries','placeholder' => 'Search']) !!}
                                                    <span onclick="fith.submit()" class="input-group-addon" id=""><i class="fa fa-search"></i></span>
                                                </div>
                                                <div class="clearfix"></div>
                                                <h4 class="panel-title">
                                                    <a class="collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                        <p class="text-center">Plus de critères ></p>
                                                    </a>
                                                </h4>
                                                <div class="clearfix"></div>
                                                <div id="collapseFive" class="panel-collapse collapse col-md-10 col-md-offset-1" role="tabpanel" aria-labelledby="headingFive">
                                                    <div class="panel-body">
                                                        <div class="col-md-12">
                                                            <div class="col-md-4">
                                                                {!! Form::label('LowCal', 'LowCal') !!}
                                                                <div class="form-group">
                                                                    {{ Form::checkbox('LowCal',true ,false , ['class' => 'form-control']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                {!! Form::label('Time', 'Time (Minutes)') !!}
                                                                <div class="form-group">
                                                                    {{ Form::select('Time', array(
                                                                  null =>'No limit'  ,
                                                                  '1'  =>'0/5'  ,
                                                                   '2' =>'5/10'  ,
                                                                    '3'=>'10/15'  ,
                                                                    '4'=>'15/30'  ,
                                                                    '5'=>'30/1h'  ,
                                                                     '6'  => '1h+'
                                                                  ),null,['class' => 'form-control']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                {!! Form::label('Country', 'Country') !!}
                                                                <div class="form-group">
                                                                    {{ Form::select('country_id',$country, old('content') , ['class' => 'form-control']) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                {!! Form::label('cateAliment', 'cateAliment') !!}
                                                                <div class="form-group">
                                                                    {{ Form::select("cateAliment", $cateAliments5,  old('content')  , ['class' => 'form-control']) }}
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                    {!! Form::submit('Envoyer',['class' => 'btn btn-primary center-block']) !!}
                                                </div>
                                                <div class="clearfix"></div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="clearfix"></div>
                                            <h4 data-toggle="collapse" href="#sidebar5" class="filter panel-heading" aria-expanded="true" aria-controls="sidebar5">Filtres +</h4>
                                            <div class="left-bar col-sm-2 col-xs-12">
                                                <div class="collapse in" id="sidebar5">
                                                    <h4 class="text-center">Temps</h4>
                                                    {!! Form::open(array(
                                                              'url' => '/recettes/filter5?recettesStatus3='.$recettesStatus3->currentPage().'&recettesStatus2='.$recettesStatus2->currentPage().'&recettesStatus5=1&recettesStatus4='.$recettesStatus4->currentPage().'&recettesStatus1='.$recettesStatus1->currentPage(),
                                                              'method' => 'POST',
                                                              'id' => 'form5'
                                                           )) !!}
                                                    <input name='lowCalEntree' value=" {{$lowCalEntree}}" hidden>
                                                    {{ csrf_field() }}
                                                    <input type="text" name="titleEntree" id="titleEntree" value="{{$titleEntree}}" hidden>
                                                    <input name='cateAlimentEntree' value=" {{$cateAlimentEntree}}" hidden>
                                                    <input name='countryEntree' value=" {{$countryEntree}}" hidden>
                                                    <input name='timeEntree' value=" {{$timeEntree}}" hidden>
                                                    <input name='prixEntree' value=" {{$prixEntree}}" hidden>
                                                    <input name='ingredientEntree' value=" {{$ingredientEntree}}" hidden>
                                                    <input name='titlePlats' value=" {{$titlePlats}}" hidden>
                                                    <input name='lowCalPlats' value=" {{$lowCalPlats}}" hidden>
                                                    <input name='cateAlimentPlats' value=" {{$cateAlimentPlats}}" hidden>
                                                    <input name='countryPlats' value=" {{$countryPlats}}" hidden>
                                                    <input name='timePlats' value=" {{$timePlat}}" hidden>
                                                    <input name='prixPlats' value=" {{$prixPlat}}" hidden>
                                                    <input name='ingredientPlats' value=" {{$ingredientPlat}}" hidden>
                                                    <input name='titleBoissons' value=" {{$titleBoissons}}" hidden>
                                                    <input name='lowCalBoissons' value=" {{$lowCalBoissons}}" hidden>
                                                    <input name='cateAlimentBoissons' value=" {{$cateAlimentBoissons}}" hidden>
                                                    <input name='countryBoissons' value=" {{$countryBoissons}}" hidden>
                                                    <input name='timeBoissons' value=" {{$timeBoisson}}" hidden>
                                                    <input name='prixBoissons' value=" {{$prixBoisson}}" hidden>
                                                    <input name='ingredientBoissons' value=" {{$ingredientBoisson}}" hidden>
                                                    <input name='titleDesserts' value=" {{$titleDesserts}}" hidden>
                                                    <input name='lowCalDesserts' value=" {{$lowCalDesserts}}" hidden>
                                                    <input name='cateAlimentDesserts' value=" {{$cateAlimentDesserts}}" hidden>
                                                    <input name='countryDesserts' value=" {{$countryDesserts}}" hidden>
                                                    <input name='timeDesserts' value=" {{$timeDessert}}" hidden>
                                                    <input name='prixDesserts' value=" {{$prixDessert}}" hidden>
                                                    <input name='ingredientDesserts' value=" {{$ingredientDessert}}" hidden>
                                                    <input name='titlePatisseries' value=" {{$titlePatisseries}}" hidden>
                                                    <input name='lowCalPatisseries' value=" {{$lowCalPatisseries}}" hidden>
                                                    <input name='cateAlimentPatisseries' value=" {{$cateAlimentPatisseries}}" hidden>
                                                    <input name='countryPatisseries' value=" {{$countryPatisseries}}" hidden>
                                                    <input name='timePatisseries' value=" {{$timePatisserie}}" hidden>
                                                    <input name='prixPatisseries' value=" {{$prixPatisserie}}" hidden>
                                                    <input name='ingredientPatisseries' value=" {{$ingredientPatisserie}}" hidden>
                                                    <input type="text" name="time" id="time" value="" hidden>
                                                    <input type="text" name="ingredient" id="ingredient" value="" hidden>
                                                    <input type="text" name="prix" id="prix" value="" hidden>
                                                    <input type="text" name="mode" id="mode" value="" hidden>
                                                    {{ Form::close() }}
                                                    <button class="btn form-control center-block @if($timePatisserie != null && $timePatisserie == 1) btn-success @endif" onclick="time(this)" data-id="5" data-time="1">- de 20 min >></button>
                                                    <button class="btn form-control center-block @if($timePatisserie != null && $timePatisserie == 2) btn-success @endif" onclick="time(this)" data-id="5" data-time="2">- de 60 min >></button>
                                                    <button class="btn form-control center-block @if($timePatisserie != null && $timePatisserie == 3) btn-success @endif" onclick="time(this)" data-id="5" data-time="3">+ de 60 min >></button>
                                                    <br>
                                                    <h4 class="text-center">Prix</h4>
                                                    <button class="btn form-control center-block @if($prixPatisserie != null && $prixPatisserie == 5)btn-success @endif" onclick="prix(this)" data-id="5" data-prix="@if($prixPatisserie != null && $prixPatisserie == 5) 5000000000 @else 5 @endif ">Pas cher >></button>
                                                    <h4 class="text-center">Ingrédients</h4>
                                                    <?php $arr = array();
                                                    ?>
                                                    @foreach ($recettesStatus5count as $recette)
                                                        <?php $aliments = $recette->aliments ?>
                                                        @if(count($aliments)> 0)
                                                            @foreach($aliments as $a)
                                                                <?php $isIn = false; ?>
                                                                @foreach($arr as $key => $ar)
                                                                    <?php
                                                                    if($a->ingredient->name == $ar[0]['name']){
                                                                        $isIn = true;
                                                                        $arr[$key][0]['nb'] = $ar[0]['nb'] + 1;
                                                                    } ?>
                                                                @endforeach
                                                                <?php
                                                                if($isIn == false){
                                                                    $arr[] = array(
                                                                            [
                                                                                    'name' => "".$a->ingredient->name."",
                                                                                    'nb' => 1,
                                                                                    'ingredient_id' => "".$a->ingredient->id.""
                                                                            ]
                                                                    );
                                                                }

                                                                ?>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    @foreach($arr as $key => $ar)
                                                        <button class="btn form-control center-block  @if(isset($ingredientPatisserie) && $ar[0]['ingredient_id'] == $ingredientPatisserie) btn-success @endif" onclick="ingredient(this)" data-id="5" data-ingredient="@if( isset($ingredientPatisserie) && $ar[0]['ingredient_id'] == $ingredientPatisserie) 0 @else{{$ar[0]['ingredient_id']}}@endif">{{$ar[0]['name']}} ({{$ar[0]['nb']}})</button>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                @if(isset($titlePatisseries) && $titlePatisseries != null)
                                                    <h3 class="text-center">{{count($recettesStatus5count)}} résultat<?php if(count($recettesStatus5count) > 1){ echo 's'; } ?> pour : {{$titlePatisseries}}</h3>
                                                @endif
                                            @foreach ($recettesStatus5 as $recette)
                                                <div class="col-md-12">
                                                    <a href="{{  e(url('/recettes/'.$recette->id)) }}" class="text-center"><h2>{{$recette->title}}</h2></a>
                                                    <div class="col-md-6">
                                                        <div role="tabpanel" class="tab-pane " id="home">
                                                            <div class="clearfix"></div>
                                                            <iframe width="100%" style="min-height:270px"   src="{!! $recette->iframe !!}" frameborder="0" allowfullscreen></iframe>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><i class="fa fa-clock-o"></i> {{$recette->time}} minutes</p>
                                                            {{$recette->toKnow}}
                                                            <div class="clearfix"></div>
                                                            {{$recette->grade}}
                                                        </div>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                        <div class="text-center center-block col-md-12">
                                        {!!
                                     $recettesStatus5->appends([
                                     'recettesStatus4' => $recettesStatus4->currentPage(),
                                     'recettesStatus3' => $recettesStatus3->currentPage(),
                                     'recettesStatus2' => $recettesStatus2->currentPage(),
                                     'recettesStatus1' => $recettesStatus1->currentPage(),
                                     'active' => 5,
                                     'titleEntree' => "".$titleEntree."",
                                        'lowCalEntree' => "".$lowCalEntree."",
                                        'cateAlimentEntree' => "".$cateAlimentEntree."",
                                        'countryEntree' => "".$countryEntree."",
                                        'titlePlats' => "".$titlePlats."",
                                        'lowCalPlats' => "".$lowCalPlats."",
                                        'cateAlimentPlats' => "".$cateAlimentPlats."",
                                        'countryPlats' => "".$countryPlats."",
                                        'titleDesserts' => "".$titleDesserts."",
                                         'lowCalDesserts' => "".$lowCalDesserts."",
                                        'cateAlimentDesserts' => "".$cateAlimentDesserts."",
                                        'countryDesserts' => "".$countryDesserts."",
                                        'titleBoissons' => "".$titleBoissons."",
                                        'lowCalBoissons' => "".$lowCalBoissons."",
                                        'cateAlimentBoissons' => "".$cateAlimentBoissons."",
                                        'countryBoissons' => "".$countryBoissons."",
                                        'titlePatisseries' => "".$titlePatisseries."",
                                         'lowCalPatisseries' => "".$lowCalPatisseries."",
                                        'cateAlimentPatisseries' => "".$cateAlimentPatisseries."",
                                        'countryPatisseries' => "".$countryPatisseries.""
                                     ])->render()
                                     !!}
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>


    <script>
        function time($this) {
            var id = $this.getAttribute('data-id');
            var min = $this.getAttribute('data-time');
            var time = $('#form'+id+' #time');
            var mode = $('#form'+id+' #mode');
            time.val(min);
            mode.val(id);
//            console.log(time.val());
            var form =  $('#form'+id);
//            console.log(form);
            form.submit();
        }
        function prix($this) {
            var id = $this.getAttribute('data-id');
            var prix = $this.getAttribute('data-prix');
            var inprix = $('#form'+id+' #prix');
            var mode = $('#form'+id+' #mode');
            inprix.val(prix);
            mode.val(id);
//            console.log(time.val());
            var form =  $('#form'+id);
//            console.log(form);
            form.submit();
        }
        function ingredient($this) {
            var id = $this.getAttribute('data-id');
            var ingredient = $this.getAttribute('data-ingredient');
            var inpingredient = $('#form'+id+' #ingredient');
            var mode = $('#form'+id+' #mode');
            inpingredient.val(ingredient);
            mode.val(id);
            var form =  $('#form'+id);
            form.submit();
        }
    </script>
    @include('jquery.autocomplete')
    @include('jquery.infiniteScroll')
    @include('jquery.jsSlider')
    @include('jquery.youtubeLoading')
@endsection
