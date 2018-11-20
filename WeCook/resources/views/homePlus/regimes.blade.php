@extends('layouts.app')
@section('content')
<div class="col-md-12" style="background-color: white; margin-top: 40px;">
    <h1 class="text-center " style="color: black;">Régimes spéciaux</h1>
    <section id="grid" class="grid clearfix">
        @foreach($CF as $key => $arr)
            <figure class="effect-romeo">
                <img src="{!! asset('img/png')!!}" alt="img17"/>
                <figcaption>
                    <h2><span>{{$arr}}</span></h2>
                    <a href="#">{{url('special/'.$key)}}</a>
                </figcaption>
            </figure>
        @endforeach
    </section>
</div>
@include('jquery.fixedTop')
@endsection