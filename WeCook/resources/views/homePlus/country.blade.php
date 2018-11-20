@extends('layouts.app')
@section('content')
<div class="col-md-12" style="background-color: white; margin-top: 40px;">
    <h1 class="text-center " style="color: black;">Recettes du monde</h1>
    <section id="grid" class="grid clearfix">
        @foreach($CF as $key => $arr)
           <div class="col-sm-3 " style="background-image: url('{{asset('img/country/'.$arr.'.png')}}'); background-size: 100%">
               <h2 class="text-center" style="color: white; padding: 50px">Recettes {{$arr}}</h2>
           </div>
        @endforeach
    </section>
</div>
@include('jquery.fixedTop')
@endsection