@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="contentShow">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h2 class="media-middle text-center">Ajouter une liste</h2>
                    </div>
                    <div class="panel-body">
                        @if($errors->any())

                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <?php
                        $user = Auth::user();
                        ?>
{!! Form::open(array(
      'action' => 'ListesController@storeNameList' ,
      'method' => 'POST'
                 )) !!}
{{-- Champs du formulaire --}}
{!! Form::label('name', 'Nom de la liste') !!}
<div class="form-group">
    {{ Form::text('name',  $user->name.'-'.($user->nameListes->count()+1) , ['class' => 'form-control']) }}
</div>
{!! Form::label('date', 'Date de début (Par défaut : demain)') !!}
<div class="input-group">
    {{ Form::date('date' , date('Y-m-d'),['class' => 'form-control']) }}
    <span class="input-group-addon">
          <span class="fa fa-calendar-check-o"></span>
    </span>
</div>
{!! Form::label('nbDay', 'Nombre de jours (par défaut, 7 jours)') !!}
<div class="form-group">
     {{ Form::text('nbDay', 7  , ['class' => 'form-control']) }}
</div>
@if(count($user->regimeSpecial) == 0)
{!! Form::label('nbByDay', 'Nombre de repas par jour (Par défaut, un seul à midi)') !!}
<div class="form-group col-md-10 col-md-offset-1 text-center">
    <div class="col-xs-6">
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                {{ Form::checkbox('midi',1,0,['class' => 'form-check-input']) }}
                Midi
            </label>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                {{ Form::checkbox('soir',1,0,['class' => 'form-check-input']) }}
                Soir
            </label>
        </div>
    </div>
</div>
<div class="clearfix"></div>
{!! Form::label('nbByDay', 'Types de menu (plat par défaut)') !!}
<div class="form-group col-md-10 col-md-offset-1 text-center">
    <div class="col-sm-4">
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                {{ Form::checkbox('entree',1,0,['class' => 'form-check-input']) }}
                Entrée
            </label>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                {{ Form::checkbox('plat',1,0,['class' => 'form-check-input']) }}
                Plat
            </label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                {{ Form::checkbox('dessert',1,0,['class' => 'form-check-input']) }}
                Dessert
            </label>
        </div>
    </div>
</div>
       @else
    <label>Régime actuel
     @foreach($user->regimeSpecial as $regimeSpe)
           <div class="col-sm-12 " role="group">
                      <button class="btn form-control btn-success">
                          {{Form::hidden('regime','$regimeSpe->cateForbiden->name')}}
                            <p>{{ $regimeSpe->cateForbiden->name}}</p>
                      </button>
           </div>
     @endforeach
@endif
    </label>
                        <div class="clearfix"></div>
{!! Form::submit('Ajouter',['class' => 'btn btn-primary form-control']) !!}
{{-- --}}
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
    @include('jquery.fixedTop')
@endsection








