@extends('layouts.backend')
@section('covid', 'active')
@section('content')
<div class="title">
    COVID19 - Déclarations
</div>
<!-- User Assist Block -->
<div class="row">
    <div class="col-md-5">
        <div class="block">
            <div class="block-title">
                <h2><strong>Nouvelle déclaration</strong></h2>
            </div>
            <!-- Input Grid Content -->
            
            
            <form id="statForm" action="" method="post" class="form-horizontal form-bordered">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="example-nf-email">Date</label>
                        <input type="text" id="dated" name="dated" class="form-control input-sm" placeholder="{{ date('d/m/Y') }}" value="{{ old('dated') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="nombrecas">Nombre de cas</label>
                        <input type="text" id="nombrecas" name="nombrecas" class="form-control input-sm" placeholder="Ex: 05">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="radio">
                            <label class="radio-inline" for="statut1">
                            <input type="radio" id="statut1" name="statut" value="nouveau"> Nouveau
                            </label>
                        </div>
                        <div class="radio">
                            <label class="radio-inline" for="statut2">
                            <input type="radio" id="statut2" name="statut" value="guerison"> Guérison
                            </label>
                        </div>
                        <div class="radio">
                            <label class="radio-inline" for="statut3">
                            <input type="radio" id="statut3" name="statut" value="deces"> Décès
                            </label>
                        </div>
                        <div class="radio">
                        <label class="radio-inline" for="statut4">
                            <input type="radio" id="statut4" name="statut" value="confinement"> Confinemment
                            </label>
                        </div>
                        <div class="radio">
                            <label class="radio-inline" for="statut5">
                            <input type="radio" id="statut5" name="statut" value="suivis"> Suivis
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="localite">Ville</label>
                        <select id="localite" name="localite" class="select-chosen" data-placeholder="Selectionner une localite">
                            <option>Selectionnez une localite</option>
                            @foreach($listes as $liste)
                                <option value="{{ $liste->id }}">{{ $liste->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8">
                        <label class="radio-inline" for="sexe1">
                            <input type="radio" id="sexe1" name="sexe" value="homme"> Homme
                        </label>
                        <label class="radio-inline" for="sexe2">
                            <input type="radio" id="sexe2" name="sexe" value="femme"> Femme
                        </label>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-xs-12">
                        <button id="cssavebtn" type="submit" class="btn btn-sm btn-success">Enregistrer</button>
                        <a href="{{ route('covidstats.index') }}" class="btn btn-sm btn-default">Retour à la liste complète</a>
                    </div>
                </div>
                <div class="form-group">
                <div class="alert alert-success d-none" id="msg_div">
                    <span id="res_message"></span>
                </div>
                </div>
            </form>
            <!-- END Input Grid Content -->
        </div>
    </div>
    <div class="col-md-7">
        <div class="block">
            <div class="block-title">
                <h2><strong>Dernières Déclarations</strong></h2>
            </div>
        <div class="table-responsive">
            <table id="drenieresdeclarations" class="table table-vcenter table-condensed table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-left">Date # Id</th>
                        <th>Ville</th>
                        <th>Sexe</th>
                        <th>Statut</th>
                        <th class="text-center">Nombre</th>
                    </tr>
                </thead>
                <tbody id="cstbody">
                    @foreach($dernieresdeclarations as $liste)
                        <tr>
                        <td class="text-left">{{ date('d/m/Y',strtotime($liste->dated)) }} # {{ $liste->id }}</td>
                        <td><a href="javascript:void(0)">{{ $liste->nom }}</a></td>
                        <td>{{ $liste->sexe }}</td>
                        <td>{{ $liste->typeenregistrement }}</td>
                        <td class="text-center">{{ $liste->nombrecas }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
<!-- END User Assist Block -->
@endsection

