@extends('layouts.app')
@section('content')
    <?php $recettesSelected = [];
    $plat = array(0=>'Entrées',1=>'Plats',2=>'Desserts')
    ?>
    <div class="panel-heading" style="padding-top: 30px;">
        <h1 class="text-center">{{$nameList->name}}</h1>
    </div>
    <div class="">
        <div class="col-md-10 col-md-offset-1">
{!! Form::open(array(
                            'url' => 'returnRecettes' ,
                            'method' => 'POST'
                            )) !!}
        <?php
    for ($y = 0; $y < 3; $y++) {
    ?>
            <div class="clearfix"></div>
        <h2 class="text-center">{{$plat[$y]}}</h2>
            {{Form::submit('Voir d\'autres',['class' => 'btn btn-default form-control'])}}
            <hr>
    <div class="clearfix"></div>
        <?php
        foreach ($recettes as $recette ){
            $in = false;
            $recettesSelected[] .= "".$recette->id."";
            if ($recette->cateRecette_id == ($y+1)){
                foreach ($chekedRecettes as $a => $k){
                    if ($recette->id == $k){$in = true;}
                    }
            ?>
            <div class="col-sm-4 col-xs-12 @if($in == true) btn-success @endif" id="{{$recette->id}}" data-check="{{$recette->id}}">
                <img src="https://img.youtube.com/vi/{{ $recette->picture }}/hqdefault.jpg" class="img-responsive"  alt="">
                <input id="input{{$recette->id}}" name="selected[]" value="{{$recette->id}}" type="checkbox" hidden @if($in == true) checked @endif>
        <h3>{{$recette->title}}</h3>
            </div>
    <?php
            }
        }
    }
    ?>
            {{Form::hidden('mode','selection')}}
            {{Form::hidden('country',$country)}}
            {{Form::hidden('time',$time)}}
            {{Form::hidden('budget',$max)}}
            {{Form::hidden('qt',$qt)}}
            {{Form::hidden('nameList_id',$nameList->id)}}
            {{Form::close()}}
            {!! Form::open(array(
                            'url' => 'generateLists' ,
                            'method' => 'POST'
                            )) !!}
            {{Form::hidden('nameList_id',$nameList->id)}}
            {{Form::hidden('recettesSelected',serialize($recettesSelected))}}
            {{Form::submit('Valider',['class' => 'btn btn-primary form-control'])}}
            {{Form::close()}}
        </div>
    </div>
    @include('jquery/checkRecette')
    @include('jquery.fixedTop')
@endsection