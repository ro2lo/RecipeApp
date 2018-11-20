@extends('layouts.app')
@section('content')
    <div class="col-md-10 col-md-offset-1 panel active">
        <h1 class="text-center" style="padding: 50px">{{$TPname}}</h1>
        <?php $y = 0; ?>
       @foreach($recettes as $recette)
            <div class="col-md-12 <?php if($y > 5){  echo'dont';  }else{ echo'do'; }?>" id="recette1" data-time="{{$recette->time}}">
                <a href="{{  e(url('/recettes/'.$recette->id)) }}" class=""><h2>{{$recette->title}}</h2></a>
                <div class="col-md-6">
                    <div role="tabpanel" class="tab-pane " id="home">
                        <div class="clearfix"></div>
                        <iframe id="{{$recette->id}}" data-iframe="{{$recette->iframe}}" data-play="false" width="100%" style="min-height:270px"   src="<?php if($y <  6){  echo $recette->iframe;  } ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <p><i class="fa fa-clock-o"></i>  {{$recette->time}} minutes</p>
                    <p>{{$recette->description}}</p>
                    <p>{{$recette->toKnow}}</p>
                    <div class="clearfix"></div>
                    <p>{{$recette->grade}}</p>
                </div>
                <div class="clearfix"></div>
                <hr>
            </div>
            <?php $y++; ?>
           @endforeach
        <div class="text-center center-block">
        </div>
    </div>
    @include('jquery.fixedTop')
    @include('jquery.infiniteScroll')
@endsection