@extends('layouts.frontend')
@section('content')
@section('active-actualites', 'active')

<div class="h2-top-close-to-menu-area">
    <div class="container">
        <div class="row justify-content-center">
           
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="h2-top-single-service wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="visible-lg-inline-block float-left mr-2" style="width:500px;height:300px;">
                        <img style="width:100%;height:100%;" src="{{ asset(Storage::disk('local')->url($article->link_image)) }}" alt="">
                    </div>    
                    <div class="content">
                        <h4 class="title">{{ $article->title }}
                            <em class="text-secondary publicationdate"><u>({{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }})</u></em>
                        </h4>
                        <p class="text text-justify">{!! $article->description !!} </p>
                    </div> 
                </div>
                </div>
            </div>
           
        </div>
    </div>
  </div>
  <!-- h2-top-service-area-end -->




@endsection