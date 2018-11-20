@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="contentShow">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1 style="margin-top: 20px" class="text-center">Favoris</h1></div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div>

                                <!-- Nav tabs -->
                                <ul class="list-inline text-center col-md-10 col-md-offset-1" role="tablist">
                                    <li role="presentation" class="center-block text-center @if($active == 1 or $active == null)active  @endif"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Entrées/Apéritif </a></li>
                                    <li role="presentation" class="center-block text-center @if($active == 2 ) active @endif"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Plats</a></li>
                                    <li role="presentation" class="center-block text-center @if($active == 3 ) active  @endif"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Desserts</a></li>
                                    <li role="presentation" class="center-block text-center @if($active == 4 ) active  @endif"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Boissons</a></li>
                                    <li role="presentation" class="center-block text-center @if($active == 5 ) active  @endif"><a href="#patisseries" aria-controls="patisseries" role="tab" data-toggle="tab">Patisseries/Petit dej</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane @if($active == 1 or $active == null) active @endif" id="home">
                                        @foreach ($recettesStatus1 as $recette)
                                            <div class="col-sm-3 col-xs-2">
                                                <div role="tabpanel" class="tab-pane" id="home">
                                                    <a href="{{  e(url('/recettes/'.$recette->id)) }}"><h2>{{$recette->title}}</h2></a>
                                                    <div class="clearfix"></div>
                                                    <img src="{{$recette->picture}}" alt="">  <div class="clearfix"></div>
                                                {{$recette->grades}}
                                                <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{$recettesStatus1->appends(['recettesStatus3' => $recettesStatus3->currentPage(),'recettesStatus2' => $recettesStatus2->currentPage(),'recettesStatus4' => $recettesStatus4->currentPage(),'active' => 1])->links()}}
                                    </div>
                                    <div role="tabpanel" class="tab-pane @if($active == 2) active @endif" id="profile">
                                        @foreach ($recettesStatus2 as $recette)
                                            <div class="col-sm-3 col-xs-2">
                                                <div role="tabpanel" class="tab-pane" id="home">
                                                    <a href="{{  e(url('/recettes/'.$recette->id)) }}"><h2>{{$recette->title}}</h2></a>
                                                    <div class="clearfix"></div>
                                                    <img src="{{$recette->picture}}" alt="">  <div class="clearfix"></div>
                                                {{$recette->grades}}
                                                <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{$recettesStatus2->appends(['recettesStatus3' => $recettesStatus3->currentPage(),'recettesStatus1' => $recettesStatus1->currentPage(),'recettesStatus4' => $recettesStatus4->currentPage(),'active' => 2])->links()}}
                                    </div>
                                    <div role="tabpanel" class="tab-pane @if($active == 3) active @endif" id="messages">
                                        @foreach ($recettesStatus3 as $recette)
                                            <div class="col-sm-6">
                                            <div role="tabpanel" class="tab-pane " id="home">
                                                <a href="{{  e(url('/recettes/'.$recette->id)) }}"><h2>{{$recette->title}}</h2></a>
                                                <div class="clearfix"></div>
                                                <img src="{{$recette->picture}}" class="img-responsive" alt="{{$recette->title}}">
                                                <div class="clearfix"></div>
                                                {{$recette->grades}}
                                                <div class="clearfix"></div>
                                                </div>
                                                @endforeach
                                                {{$recettesStatus3->appends(['recettesStatus2' => $recettesStatus2->currentPage(),'recettesStatus1' => $recettesStatus1->currentPage(),'recettesStatus4' => $recettesStatus4->currentPage(),'active' => 3])->links()}}
                                            </div>
                                            <div role="tabpanel" class="tab-pane @if($active == 4) active @endif" id="settings">

                                                @foreach ($recettesStatus4 as $recette)
                                                    <div class="col-sm-3 col-xs-2">
                                                    <div role="tabpanel" class="tab-pane" id="home">
                                                        <a href="{{  e(url('/recettes/'.$recette->id)) }}"><h2>{{$recette->title}}</h2></a>
                                                        <div class="clearfix"></div>
                                                        <img src="{{$recette->picture}}" alt="">                                                        <div class="clearfix"></div>
                                                        <div class="clearfix"></div>
                                                        {{$recette->grades}}
                                                        <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                {{$recettesStatus4->appends(['recettesStatus3' => $recettesStatus3->currentPage(),'recettesStatus2' => $recettesStatus2->currentPage(),'recettesStatus1' => $recettesStatus1->currentPage(),'active' => 4])->links()}}

                                            </div>
                                            <div role="tabpanel" class="tab-pane @if($active == 5) active @endif" id="patisseries">

                                                @foreach ($recettesStatus5 as $recette)
                                                    <div class="col-sm-3 col-xs-2">
                                                        <div role="tabpanel" class="tab-pane" id="home">
                                                            <a href="{{  e(url('/recettes/'.$recette->id)) }}"><h2>{{$recette->title}}</h2></a>
                                                            <div class="clearfix"></div>
                                                            <img src="{{$recette->picture}}" alt="">                                                        <div class="clearfix"></div>
                                                        {{$recette->grades}}
                                                        <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                {{$recettesStatus5->appends(['recettesStatus3' => $recettesStatus3->currentPage(),'recettesStatus2' => $recettesStatus2->currentPage(),'recettesStatus1' => $recettesStatus1->currentPage(),'active' => 5])->links()}}

                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @include('jquery.fixedTop')
@endsection
