@extends('layouts.backend')
@section('categorie', 'active')
@section('content')
<div class="title">
    COVID19 - Catégories
</div>
<!-- User Assist Block -->
<div class="row">
    <div class="col-md-5">
        <div class="block">
            <div class="block-title">
                <h2><strong>Nouvelle catégorie</strong></h2>
            </div>

            <!-- Normal Form Content -->
            <form action="{{ route('categories.store') }}" method="post" class="form-bordered">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="code">Titre</label>
                    <input type="text" id="libelle" name="libelle" class="form-control" placeholder="Titre" value="{{ old('libelle') }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="9" class="form-control" placeholder="Description de la catégorie"></textarea>
                </div>
                <div class="form-group form-actions">
                    <button type="submit" class="btn btn-sm btn-success">Enregistrer</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-default">Annuler</a>
                </div>
            </form>
            <!-- END Normal Form Content -->
        </div>
    </div>
</div>

<!-- END User Assist Block -->
@endsection