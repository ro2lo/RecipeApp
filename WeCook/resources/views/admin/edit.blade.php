@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Recette</div>
                    @if($errors->any())

                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                    <div class="panel-body">
                        <h2>Aliments</h2>
                        <div class="panel-body">
                            @foreach($recette->aliments as $aliment)
                                  <p>{{$aliment->ingredient->name }}, {{$aliment->qt}} {{$aliment->qtType}}</p>
                            @endforeach
                        </div>
                        <div class="row">
                        <div class="panel-body col-md-6">
                            <p>Ajout catégorie</p>
                            {!! Form::open(array(
                            'action' => 'AdminController@store' ,
                            'method' => 'POST'
                              )) !!}
                            {{-- Champs du formulaire --}}
                            {{ Form::hidden('mode', '3') }}
                            {{ Form::hidden('recette_id', $recette->id) }}
                            {!! Form::label('name', 'Name') !!}
                            <div class="form-group">
                                {!! Form::text('name', old('content') , ['class' => 'form-control']) !!}
                            </div>
                            {!! Form::submit('Envoyer',['class' => 'btn btn-primary']) !!}
                            {{-- --}}
                            {!! Form::close() !!}
                            <p>Ajout Ingrédient général</p>
                            {!! Form::open(array(
                            'action' => 'AdminController@store' ,
                            'method' => 'POST'
                              )) !!}
                            {{-- Champs du formulaire --}}
                            {{ Form::hidden('mode', '5') }}
                            {!! Form::label('name', 'Name') !!}
                            <div class="form-group">
                                {!! Form::text('name', old('content') , ['class' => 'form-control']) !!}
                            </div>
                            {!! Form::label('cateAliment_id', 'Catégorie Aliment') !!}
                            <div class="form-group">
                                {{ Form::select('cateAliment_id', $cateAliment ,null, ['class' => 'form-control']) }}
                            </div>
                            {!! Form::submit('Envoyer',['class' => 'btn btn-primary']) !!}
                            {{-- --}}
                            {!! Form::close() !!}
                        </div>
                        <div class="panel-body col-md-6">
                            <p>Ajout Ingrédient détaille recette</p>
                            {!! Form::open(array(
                            'action' => 'AdminController@store',
                            'method' => 'POST'
                              )) !!}
                            {{-- Champs du formulaire --}}
                            {{ Form::hidden('mode', '4') }}
                            {!! Form::label('ingredient_id', 'Ingrédient') !!}
                            <div class="form-group">
                                {{ Form::select('ingredient_id', $ingredients ,null, ['class' => 'form-control']) }}
                            </div>
                            {!! Form::label('qt', 'quantitée') !!}
                            <div class="form-group">
                                {!! Form::text('qt', old('content') , ['class' => 'form-control']) !!}
                            </div>
                            {!! Form::label('qtToShow', 'quantitée à afficher') !!}
                            <div class="form-group">
                                {!! Form::text('qtToShow', old('content') , ['class' => 'form-control']) !!}
                            </div>
                            {!! Form::label('qtType', 'Quantitée ordre de grandeur') !!}
                            <div class="form-group">
                                {!! Form::text('qtType', old('content') , ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {{ Form::hidden('recette_id',$recette->id) }}
                            </div>
                            {!! Form::submit('Envoyer',['class' => 'btn btn-primary']) !!}
                            {{-- --}}
                            {!! Form::close() !!}
                        </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <h2>Forbiden</h2>
                            <div class="panel-body">
                                @foreach($recette->player as $player)
                                    @foreach($allCateForbiden as $forbiden)
                                        @if($forbiden->id == $player->cateForbiden_id )
                                            <p>{{ $forbiden->name." ".$forbiden->status }}</p>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="panel-body col-md-6">
                                <h3>Ajout catégorie</h3>
                                {!! Form::open(array(
                                'action' => 'AdminController@store',
                                'method' => 'POST'
                                  )) !!}
                                {{-- Champs du formulaire --}}
                                {{ Form::hidden('mode', '1') }}
                                {{ Form::hidden('recette_id', $recette->id) }}
                                {!! Form::label('name', 'Name') !!}
                                <div class="form-group">
                                    {!! Form::text('name', old('content') , ['class' => 'form-control', 'autofocus']) !!}
                                </div>
                                {!! Form::label('status', 'Status') !!}
                                <div class="form-group">
                                    {!! Form::select('status',
                                     ['1' => 'Régime spécial','2' => 'Mieux manger'],
                                     null, ['class' => 'form-control']) !!}
                                </div>
                                {!! Form::submit('Envoyer',['class' => 'btn btn-primary']) !!}
                                {{-- --}}
                                {!! Form::close() !!}
                            </div>
                            <div class="panel-body col-md-6">
                                <h3>Ajout player</h3>
                                {!! Form::open(array(
                                'action' => 'AdminController@store' ,
                                'method' => 'POST'
                                  )) !!}
                                {{-- Champs du formulaire --}}
                                {{ Form::hidden('mode', '2') }}
                                {!! Form::label('cateForbiden_id', 'Catégorie') !!}
                                <div class="form-group">
                                    {{ Form::select('cateForbiden_id',$cateForbiden, old('content') , ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::hidden('recette_id',$recette->id) }}
                                </div>
                                {!! Form::submit('Envoyer',['class' => 'btn btn-primary']) !!}
                                {{-- --}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <h2>Type de plat</h2>
                            <div class="panel-body">
                                @foreach($recette->typePlat as $player)
                                            <p>{{ $player->typePlat->name}}</p>
                                @endforeach
                            </div>
                            <div class="panel-body col-md-6">
                                <h3>Ajout Type de plat</h3>
                                {!! Form::open(array(
                                'action' => 'AdminController@store',
                                'method' => 'POST'
                                  )) !!}
                                {{-- Champs du formulaire --}}
                                {{ Form::hidden('mode', '6') }}
                                {{ Form::hidden('recette_id', $recette->id) }}
                                {!! Form::label('name', 'Name') !!}
                                <div class="form-group">
                                    {!! Form::text('name', old('content') , ['class' => 'form-control', 'autofocus']) !!}
                                </div>
                                {!! Form::submit('Envoyer',['class' => 'btn btn-primary']) !!}
                                {{-- --}}
                                {!! Form::close() !!}
                            </div>
                            <div class="panel-body col-md-6">
                                <h3>Ajout type de plat sur recette</h3>
                                {!! Form::open(array(
                                'action' => 'AdminController@store' ,
                                'method' => 'POST'
                                  )) !!}
                                {{-- Champs du formulaire --}}
                                {{ Form::hidden('mode', '7') }}
                                {!! Form::label('typeplat_id', 'Type de plat') !!}
                                <div class="form-group">
                                    {{ Form::select('typeplat_id',$typesPlat, old('content') , ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::hidden('recette_id',$recette->id) }}
                                </div>
                                {!! Form::submit('Envoyer',['class' => 'btn btn-primary']) !!}
                                {{-- --}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">Modifier la recette</h1>
                        {!! Form::model($recette,array(
                        'route' => array('admin.update', $recette->id) ,
                        'method' => 'PUT'
                          )) !!}
                        {{-- Champs du formulaire --}}
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
