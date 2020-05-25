@extends('layouts.backend')
@section('groupe', 'active')
@section('content')
<div class="title">
    COVID19 - Groupes
</div>
<!-- User Assist Block -->
<div class="row">
    <div class="col-md-5">
        <div class="block">
            <div class="block-title">
                <h2><strong>Nouveau groupe</strong></h2>
            </div>

            <!-- Normal Form Content -->
            <form action="{{ route('groupes.store') }}" method="post" class="form-bordered">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" value="{{ old('nom') }}">
                </div>
                <div class="form-group form-actions">
                    <button type="submit" class="btn btn-sm btn-success">Enregistrer</button>
                    <a href="{{ route('groupes.index') }}" class="btn btn-sm btn-default">Annuler</a>
                </div>
            </form>
            <!-- END Normal Form Content -->
        </div>
    </div>
</div>

<!-- END User Assist Block -->
@endsection
