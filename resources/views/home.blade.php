@extends('layouts.backend')

@section('home','active')
@section('content')

<!-- Mini Top Stats Row -->
@php
$color_nouveau = "#de931b";
$color_deces = "#e74c3c";
$color_guerison = "#3d9611";
$color_autre = "#6b7278";
@endphp
<div class="row" style="margin-top: 2rem;">
<h1 style="color:{{$color_autre}}">STATISTIQUES GLOBALES</h1>
        @foreach($declares as $declare)
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                        @switch($declare->typeenregistrement)
                            @case('nouveau')
                                <div class="widget-icon pull-left animation-fadeIn" style="background-color: {{$color_nouveau}};">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <h3 class="widget-content text-right animation-pullDown">
                                <strong style="color: {{$color_nouveau}};">{{$declare->nombre}}</strong><br>
                                <small>{{strtoupper($declare->typeenregistrement)}}</small>
                                </h3>
                                
                                @break
                            @case('deces')
                                <div class="widget-icon pull-left animation-fadeIn" style="background-color: {{$color_deces}};">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <h3 class="widget-content text-right animation-pullDown">
                                    <strong style="color: {{$color_deces}};">{{$declare->nombre}}</strong><br>
                                <small>{{strtoupper($declare->typeenregistrement)}}</small>
                                </h3>
                                @break
                                
                            @case('guerison')
                                <div class="widget-icon pull-left animation-fadeIn" style="background-color: {{$color_guerison}};">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <h3 class="widget-content text-right animation-pullDown">
                                    <strong style="color: {{$color_guerison}};">{{$declare->nombre}}</strong><br>
                                    <small>{{strtoupper($declare->typeenregistrement)}}</small>
                                </h3>
                                @break 
                            @default
                                <div class="widget-icon pull-left animation-fadeIn" style="background-color: {{$color_autre}};">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <h3 class="widget-content text-right animation-pullDown">
                                    <strong style="color: {{$color_autre}};">{{$declare->nombre}}</strong><br>
                                    <small>{{strtoupper($declare->typeenregistrement)}}</small>
                                </h3>
                        @endswitch
                    
                </div>
            </a>
            <!-- END Widget -->
        </div>
        @endforeach

</div>


<hr class="separator">

<div class="row" style="margin-top: 2rem;">
    <h1 style="color:{{$color_nouveau}}">STATISTIQUES CAS CONFIRMES / LOCALITE</h1>
        @foreach($confrimes as $item)
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                        <div class="widget-icon pull-left animation-fadeIn" style="background-color: {{$color_nouveau}};">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <h3 class="widget-content text-right animation-pullDown">
                        <strong style="color: {{$color_nouveau}};">{{$item->casconfirmes}}</strong><br>
                        <small>{{strtoupper($item->nom)}}</small>
                        </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        @endforeach

</div>

<hr class="separator">

<div class="row" style="margin-top: 2rem;">
    <h1 style="color:{{$color_guerison}}">STATISTIQUES GUERISONS / LOCALITE</h1>
        @foreach($gueris as $item)
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                        <div class="widget-icon pull-left animation-fadeIn" style="background-color: {{$color_guerison}};">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <h3 class="widget-content text-right animation-pullDown">
                        <strong style="color: {{$color_guerison}};">{{$item->guerisons}}</strong><br>
                        <small>{{strtoupper($item->nom)}}</small>
                        </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        @endforeach

</div>


<hr class="separator">

<div class="row" style="margin-top: 2rem;">
    <h1 style="color:{{$color_deces}}">STATISTIQUES DECES / LOCALITE</h1>
        @foreach($deces as $item)
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                        <div class="widget-icon pull-left animation-fadeIn" style="background-color: {{$color_deces}};">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <h3 class="widget-content text-right animation-pullDown">
                        <strong style="color: {{$color_deces}};">{{$item->deces}}</strong><br>
                        <small>{{strtoupper($item->nom)}}</small>
                        </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        @endforeach

</div>

<!-- END Mini Top Stats Row -->

@endsection
