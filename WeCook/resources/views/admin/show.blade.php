@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <div class="col-sm-12">
                                {{$recette->title}}
                                <div class="clearfix"></div>
                            <iframe width="100%" style="min-height:270px"   src="{!! $recette->iframe !!}" frameborder="0" allowfullscreen></iframe>
                                <div class="clearfix"></div>
                                {{$recette->grades}}
                                <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
