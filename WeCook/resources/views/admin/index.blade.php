@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard<a href="{{ e(url('/admin/create')) }}"><span class="btn btn-default">Ajouter +</span></a></div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="col-md-12">
                                <div class="col-md-6">

                                    {!! Form::open(array(
                                   'action' => 'AdminController@storeIndexCate' ,
                                   'method' => 'POST'
                                    )) !!}
                                    {!! Form::label('name', 'Ajout categorie') !!}
                                    <div class="form-group">
                                        {!! Form::text('name', old('content') , ['class' => 'form-control']) !!}
                                    </div>
                                    {!! Form::submit('Envoyer',['class' => 'btn btn-primary']) !!}
                                    {{-- --}}
                                    {!! Form::close() !!}

                                </div>
                                <div class="col-md-6">

                                {!! Form::open(array(
                                 'action' => 'AdminController@storeCountry' ,
                                 'method' => 'POST'
                                  )) !!}
                                    {!! Form::label('name', 'Ajout country') !!}
                                    <div class="form-group">
                                        {!! Form::text('name', old('content') , ['class' => 'form-control']) !!}
                                    </div>
                                {!! Form::submit('Envoyer',['class' => 'btn btn-primary']) !!}
                                {{-- --}}
                                {!! Form::close() !!}

                            </div>
                            </div>
                            @foreach ($recettes as $recette)
                                <a href="{{  e(url('/admin/'.$recette->id)).'/edit' }}">{{$recette->title}} </a>
                                <div class="clearfix"></div>
                                {{$recette->iframe}}
                                <div class="clearfix"></div>
                                {{$recette->grades}}
                                <div class="clearfix"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
