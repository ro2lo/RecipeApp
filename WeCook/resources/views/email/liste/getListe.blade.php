@extends('layouts.app')
@section('content')
    <?php $arr = unserialize($arr); ?>
    @foreach($arr as $key => $ar)
        {{dd($ar[$key]['name'].' '.$ar[$key]['qt'].' '.$ar[$key]['qtType'])}}
    @endforeach

@endsection