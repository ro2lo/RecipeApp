@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="" style="position: fixed; right: 0; max-width: 20px">
                        <?php $sidebarLettre = ''; ?>
                        @foreach($aliments as $key )
                            <?php
                            if (strtoupper($sidebarLettre) != strtoupper($key->name[0])){ ?>
                            <a href="#{{$sidebarLettre = strtoupper($key->name[0]) }}" class="btn btn-primary btn-xs" style="width: 100%;">{{$sidebarLettre = strtoupper($key->name[0]) }}</a>
                            <?php } ?>
                        @endforeach
                    </div>
                    <div class="panel-heading"><h1 style="margin-top: 20px" class="text-center">Ingrédients</h1></div>
                    <h2 class="text-center">Ici vous pouvez filtrer les recettes en ajoutant les ingrédients de votre choix ci-dessous !</h2>
                    <div class="">
                        {!! Form::open(array(
                                             'url' => '/ingredients' ,
                                             'method' => 'post'
                                             )) !!}
                        @if($filter == true)
                        <input type="hidden" name="al" value="{{serialize($al)}}">
                        @endif
                        <input type="text" name="name" class="form-control" id="searchIngredients" placeholder="Search" value="">
                        {!! Form::close() !!}

                      <p>
                          @if($filter == true)
                              <ul class="list-inline">
                          @foreach($al as $a)
                              <li>
                                  {!! Form::open(array(
                                             'url' => '/ingredients' ,
                                             'method' => 'post'
                                             )) !!}
                                  <input type="hidden" name="al" value="{{serialize($al)}}">
                                  <input type="hidden" name="name" value="{{$a}}">
                                  @if($recettes->count() > 0)
                                      <?php $class = "btn-success" ?>
                                      @else
                                      <?php $class = "btn-danger" ?>
                                      @endif
                        {{ Form::submit($a , ['class' => 'form-control btn '.$class]) }}
                        {!! Form::close() !!}
                              </li>
                          @endforeach
                          </ul>
                        @if(count($al) > 0)
                        <p>  {{' : '.$recettes->count()}} recettes !</p>
                            @if($recettes->count() > 0 )

                          {!! Form::open(array(
                          'url' => '/recettes/ingredients' ,
                          'method' => 'post'
                          )) !!}
                                <div class="form-group">
                                    {{ Form::select("cate", $cate ,  old('content')  , ['class' => 'form-control']) }}
                                </div>
                                {{Form::hidden('filtred',serialize($filtred))}}
                        {{ Form::submit('Go !' , ['class' => 'form-control btn-sm btn-primary']) }}
                        {!! Form::close() !!}

                        @endif
                        @endif
                        @endif



                        <div class="col-xs-10">
                        <div class="row">
                            <ul class="list-inline col-md-10 col-md-offset-1">
                                <?php $lettre = ''; ?>
                            @foreach($aliments as $key )
                                <?php
                                        if (strtoupper($lettre) != strtoupper($key->name[0])){ ?>
                                           <h3 id="{{$lettre = strtoupper($key->name[0]) }}">{{$lettre = strtoupper($key->name[0]) }}</h3>
                                    <hr>
                                            <div class="clearfix"></div>
                                   <?php     }  ?>
                                    <li>
                                <?php
                                    if($filter == true){
                                        $isIn = false;
                                        foreach ($al as $keyAl => $arr){
                                            if($key->name == $arr){
                                                ?>
                                <?php
                                    $isIn = true;
                                            }}
                                            if($isIn != true){
                                                ?>
                                    {!! Form::open(array(
                                            'url' => '/ingredients' ,
                                            'method' => 'post'
                                            )) !!}

                                        <input type="hidden" name="al" value="{{serialize($al)}}">
                                    <input type="hidden" name="name" value="{{$key->name}}">
                                    {{ Form::submit($key->name , ['class' => 'form-control btn btn-default btn-sm']) }}
                                    {!! Form::close() !!}
                                <?php
                                            }else{
                                                ?>
                                    {!! Form::open(array(
                                            'url' => '/ingredients' ,
                                            'method' => 'post'
                                            )) !!}
                                    <input type="hidden" name="al" value="{{serialize($al)}}">
                                    <input type="hidden" name="name" value="{{$key->name}}">
                                    {{ Form::submit($key->name , ['class' => 'form-control btn btn-primary']) }}
                                    {!! Form::close() !!}
                                <?php
                                    }
                                        }else{
                                       ?>
                                    {!! Form::open(array(
                                            'url' => '/ingredients' ,
                                            'method' => 'post'
                                            )) !!}
                                    @if($filter == true)
                                        <input type="hidden" name="al" value="{{serialize($al)}}">
                                    @endif
                                    <input type="hidden" name="name" value="{{$key->name}}">
                                    {{ Form::submit($key->name , ['class' => 'form-control btn btn-default']) }}
                                    {!! Form::close() !!}
                                <?php
                                    }
                                    ?>
                                    </li>
                            @endforeach
                            </ul>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('jquery.autocompleteIngredients')
    @include('jquery.fixedTop')
@endsection