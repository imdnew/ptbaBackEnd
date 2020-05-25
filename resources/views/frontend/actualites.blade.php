@extends('layouts.frontend')
@section('content')
@section('active-actualites-link', 'active')





<div class="h2-top-close-to-menu-area">
    <div class="container">
        <div class="row justify-content-justify">
            @foreach($articles as $article)
            <div class="col-lg-4 col-md-6 col-sm-8 col-12">
                <div class="h3-single-blog">
                    <div class="img">
                        
                        <a href="{{ route('article.read', $article->alias) }}"><img src="{{ asset(Storage::disk('local')->url($article->link_image)) }}" alt=""></a>
                        
                    </div>
                    <div class="content">
                        <h4 class="title">
                            <a href="{{ route('article.read', $article->alias) }}">{{ $article->title }}</a>
                            <em class="text-secondary publicationdate"><u>({{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }})</u></em>
                        </h4>
                        
                    <p class="text text-justify">{{ \Illuminate\Support\Str::words(strip_tags($article->description),60, ' ...') }} <a href="{{ route('article.read', $article->alias) }}">Lire la suite  </a></p>
                        
                    </div>
                </div>
            </div>
            @endforeach
            
            </div>
           
        </div>
    </div>
  </div>
  <!-- h2-top-service-area-end -->




@endsection