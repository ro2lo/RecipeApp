@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="">
                    <div class="panel-heading"><h1 class="text-center" style="padding-top: 30px">Mes informations</h1></div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                    <div class="col-md-12 text-center">
                        <p><i class="fa fa-btn fa-user-circle"></i>  {{$user->name}}</p>
                        <p><i class="fa fa-btn fa-envelope"></i>  {{$user->email}}</p>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <h2 class="text-center">Interdits</h2>
                    <div class="col-sm-6">
                        {!! Form::open(array(
                        'action' => 'UserController@storeCAI',
                        'method' => 'POST'
                          )) !!}

                        {!! Form::label('cateForbiden_id', 'Catégorie d\'aliment') !!}
                        <div class="form-group">
                            {{ Form::select('cateAliment_id',$cateIngredientInterdit, old('content') , ['class' => 'form-control']) }}
                        </div>
                        {!! Form::submit('Ajouter',['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-12">
                        @foreach($user->CateIngredientsInterdits as $regimeSpe)
                            <div class="col-sm-12 " role="group">
                                {!! Form::model($regimeSpe ,array('action' => array('ForbidenController@destroy', $regimeSpe->id), 'method' => 'DELETE', 'class' => 'form-group')) !!}
                                <button type="submit" class="btn form-control btn-danger">
                                    <p><i class="fa fa-trash-o"></i> {{ $regimeSpe->cateAliment->name}}</p>
                                </button>
                                {!! Form::close() !!}
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <h2 class="text-center">Régime spéciale</h2>
                    <div class="col-sm-6">
                        {!! Form::open(array(
                        'action' => 'UserController@storeRSP',
                        'method' => 'POST'
                          )) !!}
                        <div class="form-group">
                            {{ Form::select('cateForbiden_id',$regimeSpecial, old('content') , ['class' => 'form-control']) }}
                        </div>
                        {!! Form::submit('Ajouter',['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}
                    </div>
                        @foreach($user->regimeSpecial as $regimeSpe)
                            <div class="col-sm-12 " role="group">
                                {!! Form::model($regimeSpe ,array('action' => array('ForbidenController@destroy', $regimeSpe->id), 'method' => 'DELETE', 'class' => 'form-group')) !!}
                                <button type="submit" class="btn form-control btn-success">
                                    <p><i class="fa fa-trash-o"></i> {{ $regimeSpe->cateForbiden->name}}</p>
                                </button>
                                {!! Form::close() !!}
                            </div>
                        @endforeach
                    <div class="clearfix"></div>
                    <hr>
                    <h2 class="text-center">Mieux manger</h2>
                    <div class="col-sm-6">
                        {!! Form::open(array(
                        'action' => 'UserController@storeMM',
                        'method' => 'POST'
                          )) !!}
                        <div class="form-group">
                            {{ Form::select('cateForbiden_id',$mieuxManger, old('content') , ['class' => 'form-control']) }}
                        </div>
                        {!! Form::submit('Ajouter',['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                    @if(count($user->mieuxManger) > 0)
                        @foreach($user->mieuxManger as $regimeSpe)
                            <div class="col-sm-12 " role="group">
                                {!! Form::model($regimeSpe ,array('action' => array('ForbidenController@destroy', $regimeSpe->id), 'method' => 'DELETE', 'class' => 'form-group')) !!}
                                <button type="submit" class="btn form-control btn-success">
                                    <p><i class="fa fa-trash-o"></i> {{ $regimeSpe->cateForbiden->name}}</p>
                                </button>
                                {!! Form::close() !!}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('jquery.fixedTop')
@endsection
