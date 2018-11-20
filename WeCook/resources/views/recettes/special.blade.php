@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1 class="text-center">Régime {{$CFName}}</h1></div>
                    <div class="panel-body">
                        <div class="row">
        @foreach($PL as $PLS)
              <div class="col-md-6">
                  <a href="{{url('/recettes/'.$PLS->recette->id)}}"> <h2>{!! $PLS->recette->title !!}</h2></a>
                  <iframe width="100%" style="min-height:270px"   src="{!! $PLS->recette->iframe !!}" frameborder="0" allowfullscreen></iframe>
              </div>
        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('jquery.fixedTop')

@endsection