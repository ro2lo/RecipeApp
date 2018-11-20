@extends('layouts.app')
@section('content')
    <?php $ingredientsSelected = [];
    ?>
    <div class="panel-heading" style="padding-top: 30px;">
        <h1 class="text-center">{{$nameList->name}}</h1>
            <h3 class="text-center">Séléctionnez vos ingrédients</h3>
        <p class="text-center">Certains ingrédients risques de ne pas etre pris en compte selon les possibilités.</p>
    </div>
        <div class="col-md-10 col-md-offset-1">
{!! Form::open(array(
           'url' => 'returnRecettes' ,
           'method' => 'POST'
)) !!}

    <div class="clearfix"></div>
        <?php
        foreach ($ingredients as $ingredient){
            ?>
            <div class="col-sm-3 col-xs-6" id="{{$ingredient->id}}" data-check="{{$ingredient->id}}">
                <img src="{{$ingredient->picture}}" class="img-responsive" alt="{{$ingredient->name}}">
                <input id="input{{$ingredient->id}}" name="selected[]" value="{{$ingredient->id}}" type="checkbox" hidden>
                <h4 class="text-center">{{$ingredient->name}}</h4>
            </div>
        <?php
    }
    ?>
            {{Form::hidden('mode','ingredient')}}
            {{Form::hidden('country',$country)}}
            {{Form::hidden('time',$time)}}
            {{Form::hidden('budget',$max)}}
            {{Form::hidden('qt',$qt)}}
            {{Form::hidden('nameList_id',$nameList->id)}}
            {{Form::submit('Valider',['class' => 'btn btn-primary btn-lg col-md-10 col-md-offset-1'])}}
            {{Form::close()}}
        </div>
    @include('jquery/checkRecette')
    @include('jquery.fixedTop')
@endsection