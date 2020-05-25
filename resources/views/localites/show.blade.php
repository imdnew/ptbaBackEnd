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
                <h2><strong>Détails localité</strong></h2>
            </div>

            <div class="row">
                <div class="col-lg-12 pt-2 mt-1 infs-panel">

                    <!-- Code localite -->
                    <div class="form-group row">
                      <div class="col-sm-4">
                        <label>Code:</label>
                      </div>
                      <div class="col-sm-8 mb-3 mb-sm-0">
                        <label class="fb"> {{ $localite->code }} </label>
                      </div>
                    </div>

                    <!-- Nom localite -->
                    <div class="form-group row">
                      <div class="col-sm-4">
                        <label>Nom:</label>
                      </div>
                      <div class="col-sm-8 mb-3 mb-sm-0">
                        <label class="fb"> {{ $localite->nom }} </label>
                      </div>
                    </div>

                    <!-- Long localite -->
                    <div class="form-group row">
                      <div class="col-sm-4">
                        <label>Long:</label>
                      </div>
                      <div class="col-sm-8 mb-3 mb-sm-0">
                        <label class="fb"> {{ $localite->long }} </label>
                      </div>
                    </div>

                    <!-- Lat localite -->
                    <div class="form-group row">
                      <div class="col-sm-4">
                        <label>Lat:</label>
                      </div>
                      <div class="col-sm-8 mb-3 mb-sm-0">
                        <label class="fb"> {{ $localite->lat }} </label>
                      </div>
                    </div>

                    <div class="form-group form-actions">
                    <div class="col-md-12">
                        <a href="{{ route('localites.index') }}" class="btn btn-sm btn-danger">Fermer</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END User Assist Block -->
@endsection
