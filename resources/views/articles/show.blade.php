@extends('layouts.backend')

@section('article', 'active')
@section('content')
<div class="title">
    COVID19 - Actualités
    <div class="float-right">
        <a href="{{ route('articles.create') }}" class="btn btn-default btn-sm">Nouveau</a>
    </div>
</div>
<div class="block" style="padding-bottom: 2rem;">
    <div class="table-responsive">
        
        <h2>{{ $article->title }}</h2>

        <!-- Article Content -->
        <article>
            
            <img src="{{ asset(Storage::disk('local')->url($article->link_image)) }}" alt="image" class="img-responsive">
            <p>{!! $article->description !!}</p>
        </article>
        <!-- END Article Content -->
        
    </div>
</div>

@endsection