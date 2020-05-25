@extends('layouts.backend')
@section('localite', 'active')
@section('content')
<div class="title">
    COVID19 - Localités
</div>
<!-- User Assist Block -->
<div class="row">
    <div class="col-md-5">
        <div class="block">
            <div class="block-title">
                <h2><strong>Nouvelle localité</strong></h2>
            </div>

            <!-- Normal Form Content -->
            <form action="{{ route('localites.store') }}" method="post" class="form-horizontal form-bordered">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="code">Code</label>
                        <input type="text" id="code" name="code" class="form-control" placeholder="Code" value="{{ old('code') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label for="long">Longitude</label>
                        <input type="text" name="long" class="form-control input-sm" placeholder="Long" value="{{ old('long') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="lat">Latitude</label>
                        <input type="text" id="lat" name="lat" class="form-control input-sm" placeholder="Lat">
                    </div>
                </div>

                <div class="form-group form-actions">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-sm btn-success">Enregistrer</button>
                        <a href="{{ route('localites.index') }}" class="btn btn-sm btn-default">Annuler</a>
                    </div>
                </div>
            </form>
            <!-- END Normal Form Content -->
        </div>
    </div>
</div>

<!-- END User Assist Block -->
@endsection
