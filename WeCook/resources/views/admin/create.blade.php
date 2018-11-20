@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Ajouter une Recette</div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                    <div class="panel-body">
                        {!! Form::open(array(
                      'action' => 'AdminController@store' ,
                      'method' => 'POST'
                          )) !!}
                        {{-- Champs du formulaire --}}
                        {{ Form::hidden('mode', 'create') }}
                        {!! Form::label('title', 'Nom de la recette') !!}
                        <div class="form-group">
                            {!! Form::text('title', old('title') , ['class' => 'form-control', 'autofocus']) !!}
                        </div>
                        {!! Form::label('Description', 'Description...') !!}
                        <div class="form-group">
                            {!! Form::textarea('description', old('content') , ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::label('toknow', 'About this cook') !!}
                        <div class="form-group">
                            {!! Form::textarea('toknow', old('content') , ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::label('time', 'Time') !!}
                        <div class="form-group">
                            {!! Form::text('time', old('content') , ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::label('iframe', 'Iframe') !!}
                        <div class="form-group">
                            {!! Form::text('iframe', old('content') , ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::label('picture', 'Picture, youtube : https://img.youtube.com/vi/<insert-youtube-video-id-here>/hqdefault.jpg') !!}
                        <div class="form-group">
                            {!! Form::text('picture', old('content') , ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::label('vid', 'Vid') !!}
                        <div class="form-group">
                            {!! Form::text('vid', old('content') , ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::label('kcal', 'Calories') !!}
                        <div class="form-group">
                            {{ Form::checkbox('kcal', 1, null, ['class' => 'form-control']) }}
                        </div>
                        {!! Form::label('nbPers', 'Number of peoples') !!}
                        <div class="form-group">
                            {!! Form::text('nbPers', old('content') , ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::label('cateRecette_id', 'Catégorie') !!}
                        <div class="form-group">
                            {{ Form::select('cateRecette_id',$cateRecette, old('content') , ['class' => 'form-control']) }}
                        </div>
                        {!! Form::label('country_id', 'Pays') !!}
                        <div class="form-group">
                            {{ Form::select('country_id',$country, old('content') , ['class' => 'form-control']) }}
                        </div>
                        {!! Form::label('visible', 'Validée') !!}
                        <div class="form-group">
                            {{ Form::checkbox('visible', 1, null, ['class' => 'form-control']) }}
                        </div>
                        {!! Form::submit('Envoyer',['class' => 'btn btn-primary']) !!}
                        {{-- --}}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
