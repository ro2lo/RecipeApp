@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="contentShow">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h1 class="text-center">{{$user->name}}</h1>
                        @if(Auth::check() && Auth::user()->id == $user->id)
                        <a href="{{url('profile/'.$user->id.'/edit')}}" class="btn btn-primary center-block"><span>Mes informations</span></a>
                        @endif
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="col-md-3 col-md-offset-1">
                                <img src="/uploads/avatars/{{$user->avatar}}" class="img-responsive img-circle" style="padding: 5px 5px" alt="">
                            </div>
                            <div class="col-md-8">
                            </div>
                            @if(Auth::check() && Auth::user()->id == $user->id)
                            <form enctype="multipart/form-data" action="/profile" method="post">
                                <label class="text-center" for="avatar">Changer la photo de profil
                                <input class="center-block" type="file" name="avatar">
                                </label>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="pull-right btn btn-primary btn-sm">
                            </form>
                           @endif
                            @if(Auth::check() && Auth::user()->id != $user->id)
                            <div class="col-md-2">
                                <div class="users" id="users" >
                                    <div class="clearfix"></div>
                                    {!! Form::open(array(
                                    'url' => '/friends/store' ,
                                    'method' => 'POST'
                                             )) !!}
                                    {!! Form::hidden('friend_id',$user->id) !!}
                                    {!! Form::submit('Ajouter',['class' => 'btn btn-primary col-md-8 col-md-offset-2']) !!}

                                    {!! Form::close() !!}
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                        @if(Auth::check() && Auth::user()->id == $user->id)
                            <div class="col-md-12">
                        <div class="col-md-6">
                            <a href="{{url('friends/')}}" class="btn btn-default center-block">Cercle</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('profile/'.$user->id.'/listes')}}" class="btn btn-default center-block">Mes listes</a>
                        </div>
                        <div class="clearfix"></div>
                            </div>
                        @endif
                        @if(Auth::check() && Auth::user()->id != $user->id)
                            <h2 class="col-md-12 text-center">Favoris</h2>

                        <?php foreach ($favs as $arr){ ?>
                            <a href="{{url('recettes/'.$arr->id)}}">
                                <p>{{$arr->title}}</p>
                        <div class="col-md-6 table-bordered">
                            <iframe width="100%" style="min-height:270px"   src="{!! $arr->iframe !!}" frameborder="0" allowfullscreen></iframe>
                        </div>
                            </a>
                       <?php } ?>

                        @endif
                        @if(Auth::check() && Auth::user()->id == $user->id)
                        <div class="col-md-12" style="padding: 15px;">
                            <a href="<?php echo e(route('logout')); ?>"
                               class="btn btn-danger center-block"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Deconnexion
                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>
                            </form>
                        </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @include('jquery.fixedTop')

@endsection
