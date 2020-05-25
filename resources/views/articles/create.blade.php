@extends('layouts.backend')
@section('article', 'active')
@section('content')
<div class="title">
    COVID19 - Actualités
</div>
<!-- User Assist Block -->

<div class="row">
    <div class="col-md-8">
        <div class="block">
            <div class="block-title">
                <h2><strong>Nouvel article</strong></h2>
            </div>

            <!-- Normal Form Content -->
            <form action="{{ route('articles.store') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                {{ csrf_field() }}


                <div class="form-group">
                    <div class="col-md-6">
                        <label for="titre">Titre</label>
                        <input type="text" id="titre" name="titre" class="form-control" placeholder="Titre" value="{{ old('titre') }}">
                        <div class="form-group">
                            <label for="categorie">Catégorie</label>
                            <select id="categorie" name="categorie" class="select-chosen" data-placeholder="Selectionner une catégorie">
                            <option></option>
                            @foreach($listes as $liste)
                                <option value="{{ $liste->id }}">{{ $liste->libelle }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
                                {!! $errors->first('image', '<p class="text-danger msg-error">:message</p>') !!}
                        <div class="img-bg">
                            <img id="blah" src="#" alt="APERCU IMAGE" style="height: 7.5rem;" />
                        </div>
                    </div>
                </div>

                <div class="form-group" style="padding-top: 0 !important;">
                    <div class="col-md-12">
                        <label for="nom">Description</label>
                        <textarea id="textarea-ckeditor" name="description" class="ckeditor"></textarea>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-sm btn-success">Enregistrer</button>
                        <a href="{{ route('articles.index') }}" class="btn btn-sm btn-default">Annuler</a>
                    </div>
                </div>
            </form>
            <!-- END Normal Form Content -->
        </div>
    </div>
</div>

<!-- END User Assist Block -->
@endsection